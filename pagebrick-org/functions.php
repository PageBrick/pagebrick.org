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
    return $docs === null ? $html : str_replace('/PageBrick/pagebrick/tree/main/docs/en', "/PageBrick/pagebrick/tree/main/docs/$docs", $html);
}

/**
 * Star count of a GitHub repository, like "78k", or '' while unknown or zero. The server asks GitHub at most every
 * six hours and keeps the answer, so visitors never talk to GitHub and a slow GitHub never slows the site.
 */
function pborg_github_stars(string $repositoryUrl): string
{
    if (!preg_match('~github\.com/([\w.-]+/[\w.-]+)~', $repositoryUrl, $m)) {
        return '';
    }
    $cache = json_decode((string) pb_option('pborg_github', ''), true);
    if (!is_array($cache) || ($cache['repo'] ?? '') !== $m[1] || ($cache['at'] ?? 0) < time() - 6 * 3600) {
        $context = stream_context_create(['http' => ['timeout' => 3, 'ignore_errors' => true,
            'header' => "User-Agent: pagebrick.org\r\nAccept: application/vnd.github+json\r\n"]]);
        $answer = json_decode((string) @file_get_contents("https://api.github.com/repos/{$m[1]}", false, $context), true);
        $stars = is_int($answer['stargazers_count'] ?? null) ? $answer['stargazers_count'] : ($cache['stars'] ?? null);
        $cache = ['repo' => $m[1], 'at' => time(), 'stars' => $stars];
        pb_set_option('pborg_github', json_encode($cache));
    }
    return is_int($cache['stars'] ?? null) && $cache['stars'] > 0 ? pborg_short_number($cache['stars']) : ''; // no "0" on a new repository
}

/** 950 → "950", 1234 → "1.2k", 78000 → "78k". */
function pborg_short_number(int $n): string
{
    return $n < 1000 ? (string) $n : rtrim(rtrim(number_format($n / 1000, 1, '.', ''), '0'), '.') . 'k';
}

/**
 * A main button whose label slides up on hover while $hover rises from below.
 * $label and $hover are safe HTML: escaped texts or fields printed with (string). No $hover repeats the label.
 */
function pborg_slide_button(string $href, string $label, string $class = 'button', string $hover = ''): string
{
    return '<a class="' . e($class) . ' slide" href="' . e($href) . '">' . pborg_slide_text($label, $hover) . '</a>';
}

/** The two stacked texts of a slide button; screen readers only hear the first. */
function pborg_slide_text(string $label, string $hover = ''): string
{
    $arrow = ' <span class="arrow" aria-hidden="true">→</span>';
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

/** The light sweep of a "command" control. */
function pborg_shine(): string
{
    return '<span class="shine" aria-hidden="true"></span>';
}
