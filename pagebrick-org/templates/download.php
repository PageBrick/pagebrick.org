<?php
/**
 * The download page. The newest version comes from GitHub (pborg_release) and the button downloads that file right
 * there, so the visitor stays on this page: nobody is sent to a GitHub page to hunt for the right file.
 * @var PbGroup $page
 * @var PbValue $title
 * @var PbGroup $site
 */
$install = $page->install;
$update = $page->update;
$try = $page->try;
$facts = $page->facts;
$next = $page->next;
$release = pborg_release();
$github = rtrim($site->project->github->raw(), '/');
// Known: the release file itself. Unknown (GitHub didn't answer yet): the project's releases page, so the button still leads somewhere useful.
$href = $release['url'] ?? ($github !== '' ? "$github/releases/latest" : '');
$label = (string) $install->button_label . ($release ? ' ' . e($release['version']) : '');
$external = fn(string $url) => str_starts_with($url, 'http');
?>
<article class="get">
    <header class="wrap get-head">
        <h1 class="intro" style="--i: 0"><?= $title ?></h1>
        <?php if (!$page->intro->isEmpty()): ?><p class="lead intro" style="--i: 1"><?= $page->intro ?></p><?php endif ?>
    </header>

    <section class="get-main">
        <div class="wrap get-cols">
            <div class="get-col" data-reveal>
                <h2><?= $install->title ?></h2>
                <?php if (!$install->text->isEmpty()): ?><p><?= $install->text ?></p><?php endif ?>
                <div class="buttons">
                    <?php if ($href !== ''): ?>
                        <?= pborg_slide_button($href, $label, 'button get-download', '', $release ? 'data-download download="pagebrick-' . e($release['version']) . '.zip"' : '', '↓') ?>
                    <?php endif ?>
                    <?php if (!$install->guide_label->isEmpty()): ?>
                        <a class="command command-cta" href="<?= e($install->guide_link->url()) ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15H6.5A2.5 2.5 0 0 0 4 20.5zM4 20.5A2.5 2.5 0 0 0 6.5 23H20v-5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg> <span><?= $install->guide_label ?></span><?= pborg_shine() ?></a>
                    <?php endif ?>
                </div>
                <?php if (!$install->thanks->isEmpty()): ?><p class="get-thanks" role="status" data-thanks hidden><?= $install->thanks ?></p><?php endif ?>
                <?php if (!$install->requirements->isEmpty()): ?><p class="note facts"><?= implode('', array_map(fn($fact) => '<span>' . e(trim($fact)) . '</span>', explode('·', (string) $install->requirements))) ?></p><?php endif ?>
                <?php if (count($install->links)): ?>
                    <ul class="get-links">
                        <?php foreach ($install->links as $item): ?>
                            <li><a href="<?= e($item->link->url()) ?>"><?= $item->label ?></a></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </div>
            <?php if ($update->visible()): ?>
                <div class="get-col" data-reveal style="--i: 1">
                    <h2><?= $update->title ?></h2>
                    <?php if (!$update->text->isEmpty()): ?><p><?= $update->text ?></p><?php endif ?>
                    <?php if (!$update->link_label->isEmpty()): ?>
                        <p><a class="text-link" href="<?= e($update->link->url()) ?>"><?= $update->link_label ?> <span aria-hidden="true">→</span></a></p>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </div>
    </section>

    <?php if ($try->visible() && !$try->text->isEmpty()): ?>
        <p class="get-try" data-reveal><?= $try->text ?> <a class="text-link" href="<?= e($try->link->url()) ?>"><?= $try->link_label ?> <span aria-hidden="true">→</span></a></p>
    <?php endif ?>

    <?php if ($facts->visible() && $release): ?>
        <section class="get-facts">
            <div class="wrap get-facts-grid">
                <div data-reveal>
                    <p class="label"><?= $facts->label ?></p>
                    <p class="get-version"><?= str_replace('.', '<span class="dot">.</span>', e($release['version'])) ?></p>
                </div>
                <dl class="specs" data-reveal style="--i: 1">
                    <?php if (!$facts->license->isEmpty()): ?><div><dt><?= e(__('Licença')) ?></dt><dd><?= $facts->license ?></dd></div><?php endif ?>
                    <?php if (!$facts->includes->isEmpty()): ?><div><dt><?= e(__('No pacote')) ?></dt><dd><?= $facts->includes ?></dd></div><?php endif ?>
                    <div>
                        <dt><?= e(__('Soma de verificação (SHA-256)')) ?></dt>
                        <dd class="checksum">
                            <code><?= e($release['sha256']) ?></code>
                            <button type="button" class="copy copy-light command" data-copy-text="<?= e($release['sha256']) ?>" data-copied="<?= e(__('Copiado')) ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="8" y="8" width="12" height="12" rx="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2" fill="none" stroke="currentColor" stroke-width="1.6"/></svg><span data-copy-label><?= e(__('Copiar')) ?></span><?= pborg_shine() ?></button>
                        </dd>
                    </div>
                </dl>
            </div>
        </section>
    <?php endif ?>

    <?php if ($next->visible() && !$next->title->isEmpty()): ?>
        <section class="closing get-next">
            <div class="wrap get-next-grid" data-reveal>
                <div>
                    <h2><?= $next->title ?></h2>
                    <?php if (!$next->text->isEmpty()): ?><p><?= $next->text ?></p><?php endif ?>
                </div>
                <ul class="get-list">
                    <?php foreach ($next->items as $item): $url = $item->link->url(); ?>
                        <li><a href="<?= e($url) ?>"><span><?= $item->label ?></span> <span class="arrow" aria-hidden="true"><?= $external($url) ? '↗' : '→' ?></span></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </section>
    <?php endif ?>
</article>
