<?php
/**
 * @var PbGroup $site      the site's settings (Contato, Aparência and this theme's groups)
 * @var PbValue $siteName
 * @var string  $content   the template's HTML
 */
$download = $site->project->download->url(); // the page with the download button; none, no button in the header
?>
<!doctype html>
<html lang="<?= e(pb_locale()) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#2b2b2d">
<?php foreach (['newsreader', 'inter-tight'] as $font): // the same address the style sheet asks for (no ?v=), or the browser would download each twice ?>
<link rel="preload" href="<?= e(strtok(pb_theme_url("assets/fonts/$font.woff2"), '?')) ?>" as="font" type="font/woff2" crossorigin>
<?php endforeach ?>
<link rel="stylesheet" href="<?= e(pb_theme_url('assets/style.css')) ?>">
<script>document.documentElement.classList.add('js')</script>
<?= pb_head(['image' => $site->identity->share_image->url()]) ?>
<link rel="icon" href="<?= e($site->identity->icon->isEmpty() ? pb_theme_url('assets/favicon.svg') : $site->identity->icon->url('thumb')) ?>">
</head>
<body>
<div class="scroll-line" aria-hidden="true"><i></i></div>
<a class="skip" href="#main"><?= e(__('Pular para o conteúdo')) ?></a>
<header class="site-header">
    <div class="wrap header-row">
        <a class="brand" href="<?= e(pb_url('/')) ?>">
            <img src="<?= e(pb_theme_url('assets/mark.svg')) ?>" alt="<?= e($siteName->raw()) ?>" width="31" height="40">
        </a>
        <nav class="site-nav" id="site-nav" aria-label="<?= e(__('Menu principal')) ?>">
            <?= pborg_menu_html('main', 'nav-list') ?>
            <?php if (count($languages = pb_language_links()) > 1):
                // Each language in its own words, then in the visitor's; the code goes in the little square.
                $native = ['pt-BR' => 'Português', 'en' => 'English', 'es' => 'Español'];
                $names = ['pt-BR' => __('Português'), 'en' => __('Inglês'), 'es' => __('Espanhol')];
                $code = fn(string $locale) => strtoupper(substr($locale, 0, 2));
                $current = array_values(array_filter($languages, fn($language) => $language['current']))[0] ?? $languages[0]; ?>
                <details class="language" data-language>
                    <summary class="language-trigger command">
                        <svg class="globe" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z"/></svg>
                        <span class="sr-only"><?= e(__('Idioma')) ?>: <span lang="<?= e($current['locale']) ?>"><?= e($native[$current['locale']] ?? $current['name']) ?></span></span>
                        <span class="language-code"><?= e($code($current['locale'])) ?></span>
                        <svg class="chevrons" viewBox="0 0 24 24" aria-hidden="true"><path d="m7 15 5 5 5-5M7 9l5-5 5 5"/></svg>
                        <?= pborg_shine() ?>
                    </summary>
                    <ul class="language-menu">
                        <?php foreach ($languages as $n => $language): ?>
                            <li style="--n: <?= $n ?>">
                                <a href="<?= e($language['url']) ?>" hreflang="<?= e($language['locale']) ?>"<?= $language['current'] ? ' aria-current="true"' : '' ?>>
                                    <span class="language-code" aria-hidden="true"><?= e($code($language['locale'])) ?></span>
                                    <span>
                                        <span class="language-native" lang="<?= e($language['locale']) ?>"><?= e($native[$language['locale']] ?? $language['name']) ?></span>
                                        <span class="language-name"><?= e($names[$language['locale']] ?? $language['name']) ?></span>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </details>
            <?php endif ?>
            <?php if ($download !== ''): ?>
                <?= pborg_slide_button($download, e(__('Baixar')), 'button button-small get-menu', e(__('Grátis')), '', '↓') ?>
            <?php endif ?>
        </nav>
        <?php if ($download !== ''): ?>
            <?= pborg_slide_button($download, e(__('Baixar')), 'button button-small get-header', e(__('Grátis')), '', '↓') ?>
        <?php endif ?>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav"><?= e(__('Menu')) ?></button>
    </div>
</header>
<main id="main"><?= pborg_docs_links($content) ?></main>
<footer class="site-footer band-dark guides">
    <i class="footer-line" aria-hidden="true"></i>
    <i class="footer-mid" aria-hidden="true"></i>
    <div class="wrap">
        <div class="footer-row">
            <div class="footer-about">
                <img src="<?= e(pb_theme_url('assets/logo-dark.svg')) ?>" alt="<?= e($siteName->raw()) ?>" width="162" height="34">
                <?php if (!$site->footer->text->isEmpty()): ?><p><?= $site->footer->text ?></p><?php endif ?>
            </div>
            <nav aria-label="<?= e(__('Menu do rodapé')) ?>"><?= pborg_menu_html('footer', 'footer-list') ?></nav>
        </div>
        <div class="footer-base">
            <span><span>© <?= date('Y') ?> <?= $siteName ?></span><?php if ($site->footer->credit->raw() !== 'hide'): ?><span><?= e(__('Feito com PageBrick')) ?></span><?php endif ?></span>
            <a class="maintainer" href="https://alcateia.digital/?utm_source=pagebrick.org" target="_blank" rel="noopener">
                <span><?= e(__('Mantido pela')) ?></span>
                <img src="<?= e(pb_theme_url('assets/alcateia-lobo.svg')) ?>" alt="Alcateia Digital" width="22" height="22">
                <span class="sr-only"><?= e(__('(abre em nova aba)')) ?></span>
            </a>
        </div>
    </div>
</footer>
<?= pb_footer() ?>
<script src="<?= e(pb_theme_url('assets/site.js')) ?>" defer></script>
</body>
</html>
