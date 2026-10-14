<?php
// Helpers of the pagebrick.org theme (loaded once by theme.php).

/**
 * A menu whose links to PageBrick's docs lead to the docs in the page's language: a menu link to another site is the
 * same in every language, and the docs live at docs/en, docs/pt-BR and docs/es.
 */
function pborg_menu_html(string $location, string $class): string
{
    $html = pb_menu_html($location, $class);
    $docs = ['pt-BR' => 'pt-BR', 'es' => 'es'][pb_content_locale()] ?? null;
    return pborg_docs_links($docs === null ? $html : str_replace('/PageBrick/pagebrick/tree/main/docs/en', "/PageBrick/pagebrick/tree/main/docs/$docs", $html));
}

/**
 * The links to PageBrick's docs on GitHub, in a piece of HTML, made to follow the newest release: "…/tree/main/docs/…" becomes "…/tree/v1.2.2/docs/…" (the tag of
 * the release the download button offers; the same cached answer), so a new release needs no edit of any menu or page. While the release is unknown they stay on
 * main. Also puts right the names of the pt-BR and es theme guides that older imported pages have as "themes.md" (the files are "temas.md").
 */
function pborg_docs_links(string $html): string
{
    return pborg_docs_for($html, pborg_release());
}

/** pborg_docs_links() for a known release (or none): the pure part. */
function pborg_docs_for(string $html, ?array $release): string
{
    $html = preg_replace('~(/PageBrick/pagebrick/(?:tree|blob)/[^/"\']+/docs/(?:pt-BR|es))/themes\.md~', '$1/temas.md', $html);
    return $release === null ? $html : str_replace('/PageBrick/pagebrick/tree/main/docs', '/PageBrick/pagebrick/tree/v' . $release['version'] . '/docs', $html);
}

/**
 * The newest PageBrick, read from the project's catalog on GitHub: ['version', 'url', 'sha256'], or null while unknown.
 * The server asks at most every 15 minutes and keeps the answer, so a visitor never waits for GitHub
 * and the browser only contacts it when the person chooses to download. The address must be this project's release
 * file, so a wrong catalog can't send anyone elsewhere.
 */
function pborg_release(): ?array
{
    $cache = json_decode((string) pb_option('pborg_release', ''), true);
    if (!is_array($cache) || ($cache['at'] ?? 0) < time() - 900) {
        $context = stream_context_create(['http' => ['timeout' => 3, 'ignore_errors' => true, 'header' => "User-Agent: pagebrick.org\r\n"]]);
        $release = pborg_release_from(json_decode((string) @file_get_contents('https://raw.githubusercontent.com/pagebrick/catalog/main/catalog.json', false, $context), true)['core'] ?? null);
        $cache = ['at' => $release ? time() : time() - 900 + 300, // a failed try is repeated in five minutes
            'release' => $release ?? ($cache['release'] ?? null)]; // and meanwhile the last answer stays
        pb_set_option('pborg_release', json_encode($cache));
    }
    return $cache['release'] ?? null;
}

/** The release a catalog's "core" entry describes, or null when it isn't this project's own release file. */
function pborg_release_from(mixed $core): ?array
{
    $version = is_array($core) ? (string) ($core['version'] ?? '') : '';
    $valid = preg_match('/^\d+\.\d+\.\d+$/', $version)
        && ($core['url'] ?? '') === "https://github.com/PageBrick/pagebrick/releases/download/v$version/pagebrick-$version.zip"
        && preg_match('/^[0-9a-f]{64}$/', (string) ($core['sha256'] ?? ''));
    return $valid ? ['version' => $version, 'url' => $core['url'], 'sha256' => $core['sha256']] : null;
}

/** The version before $version: 1.2.0 → 1.1.0, 1.1.2 → 1.1.1, 2.0.0 → 1.0.0 (a small, honest guess for the demonstration). */
function pborg_previous_version(string $version): string
{
    [$major, $minor, $patch] = array_map('intval', explode('.', $version) + [0, 0, 0]);
    return match (true) {
        $patch > 0 => "$major.$minor." . ($patch - 1),
        $minor > 0 => "$major." . ($minor - 1) . '.0',
        default => max(1, $major - 1) . '.0.0',
    };
}

/**
 * A main button whose label slides up on hover while $hover rises from below.
 * $label and $hover are safe HTML: escaped texts or fields printed with (string). No $hover repeats the label.
 * $attributes are more safe HTML attributes for the link, $arrow the little sign after the text.
 */
function pborg_slide_button(string $href, string $label, string $class = 'button', string $hover = '', string $attributes = '', string $arrow = '→'): string
{
    return '<a class="' . e($class) . ' slide" href="' . e($href) . '"' . ($attributes !== '' ? " $attributes" : '') . '>' . pborg_slide_text($label, $hover, $arrow) . '</a>';
}

/** The two stacked texts of a slide button; screen readers only hear the first. */
function pborg_slide_text(string $label, string $hover = '', string $arrow = '→'): string
{
    $arrow = ' <span class="arrow" aria-hidden="true">' . e($arrow) . '</span>';
    return '<span class="slide-text"><span>' . $label . $arrow . '</span><span aria-hidden="true">' . ($hover !== '' ? $hover : $label) . $arrow . '</span></span>';
}

/**
 * Sizes of $count cards in a 4-column mosaic that always closes a rectangle, as CSS classes in order: blocks of two
 * rows with four cards (one big, one wide) or five (one tall, two wide), mirrored in turn, and 2 or 3 cards share a row.
 * The grid's normal placement packs each block whole; see .mosaic in style.css.
 */
function pborg_mosaic(int $count): array
{
    $blocks = [
        5 => [['tall', 'wide', '', '', 'wide'], ['wide', '', 'tall', '', 'wide']],
        4 => [['big', '', '', 'wide'], ['', '', 'big', 'wide']],
        3 => [['wide', '', '']],
        2 => [['wide', 'wide']],
        1 => [['full']],
    ];
    $sizes = [];
    for ($i = 0; $count > 0; $i++) {
        $take = in_array($count, [5, 7], true) ? 5 : min(4, $count); // 5 and 7 take five: no card is left alone
        $shapes = $blocks[$take];
        array_push($sizes, ...$shapes[$i % count($shapes)]);
        $count -= $take;
    }
    return $sizes;
}

/**
 * A title with its key words in the serif italic: what is written *between asterisks* in the panel becomes <em>.
 * Takes a field (already escaped when printed as a string) or a text; the asterisks are all that is added to it.
 */
function pborg_em(mixed $title): string
{
    return preg_replace('/\*([^*]+)\*/u', '<em>$1</em>', (string) $title);
}

/** A small line icon (24×24, drawn for this site) by name; an unknown name gives a plain brick. */
function pborg_icon(string $name): string
{
    $paths = [
        'shield' => '<path d="M12 3 4.5 6v5.5c0 4.4 3.1 8.1 7.5 9.5 4.4-1.4 7.5-5.1 7.5-9.5V6z"/><path d="m9 12 2 2 4-4"/>',
        'layout' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M9 20V9"/>',
        'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4h6v3H9zM9 14l2 2 4-4"/>',
        'scan' => '<path d="M3 8V5a2 2 0 0 1 2-2h3M16 3h3a2 2 0 0 1 2 2v3M21 16v3a2 2 0 0 1-2 2h-3M8 21H5a2 2 0 0 1-2-2v-3"/><circle cx="12" cy="12" r="3"/>',
        'folder' => '<path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="m9.5 13 2 2 3.5-3.5"/>',
        'brick' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 12h18M9 5v7M15 12v7"/>',
    ];
    return '<svg viewBox="0 0 24 24" aria-hidden="true">' . ($paths[$name] ?? $paths['brick']) . '</svg>';
}

/** The light sweep of a "command" control. */
function pborg_shine(): string
{
    return '<span class="shine" aria-hidden="true"></span>';
}
