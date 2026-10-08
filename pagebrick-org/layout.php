<?php
/**
 * @var PbGroup $site      settings from "Aparência e contato"
 * @var PbValue $siteName
 * @var string  $content   the template's HTML
 */
$github = $site->project->github->raw();
$stars = $github !== '' ? pborg_github_stars($github) : '';
$logo = $site->identity->logo;
?>
<!doctype html>
<html lang="<?= e(pb_locale()) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= e(pb_theme_url('assets/style.css')) ?>">
<script>document.documentElement.classList.add('js')</script>
<?= pb_head(['image' => $site->identity->share_image->url()]) ?>
<link rel="icon" href="<?= e($site->identity->icon->isEmpty() ? pb_theme_url('assets/favicon.svg') : $site->identity->icon->url('thumb')) ?>">
</head>
<body>
<a class="skip" href="#main"><?= e(__('Pular para o conteúdo')) ?></a>
<header class="site-header">
    <div class="wrap header-row">
        <a class="brand" href="<?= e(pb_url('/')) ?>">
            <?php if ($logo->isEmpty()): ?>
                <img src="<?= e(pb_theme_url('assets/logo.svg')) ?>" alt="<?= e($siteName->raw()) ?>" width="148" height="32">
            <?php else: ?>
                <?= $logo->img('', 'full', false) ?>
            <?php endif ?>
        </a>
        <nav class="site-nav" id="site-nav" aria-label="<?= e(__('Menu principal')) ?>">
            <?= pb_menu_html('main', 'nav-list') ?>
            <?php if (count($languages = pb_language_links()) > 1): ?>
                <label class="language">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
                    <select data-language aria-label="<?= e(__('Idioma')) ?>">
                        <?php foreach ($languages as $language): ?>
                            <option value="<?= e($language['url']) ?>" lang="<?= e($language['locale']) ?>"<?= $language['current'] ? ' selected' : '' ?>><?= e(['pt-BR' => 'Português', 'en' => 'English', 'es' => 'Español'][$language['locale']] ?? $language['name']) ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
            <?php endif ?>
        </nav>
        <?php if ($github !== ''): ?>
            <a class="github" href="<?= e($github) ?>" target="_blank" rel="noopener"
               aria-label="<?= e($stars !== '' ? sprintf(__('PageBrick no GitHub, %s estrelas'), $stars) : __('PageBrick no GitHub')) ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12.02c0 4.42 2.87 8.17 6.84 9.5.5.09.68-.22.68-.48l-.01-1.7c-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.89 1.53 2.34 1.09 2.91.83.09-.65.35-1.09.64-1.34-2.22-.25-4.56-1.11-4.56-4.95 0-1.09.39-1.99 1.03-2.69-.1-.25-.45-1.27.1-2.65 0 0 .84-.27 2.75 1.03a9.56 9.56 0 0 1 5 0c1.91-1.3 2.75-1.03 2.75-1.03.55 1.38.2 2.4.1 2.65.64.7 1.03 1.6 1.03 2.69 0 3.85-2.34 4.7-4.57 4.94.36.31.68.92.68 1.86l-.01 2.75c0 .27.18.58.69.48A10.02 10.02 0 0 0 22 12.02C22 6.48 17.52 2 12 2z"/></svg>
                <?php if ($stars !== ''): ?><span><?= e($stars) ?></span><?php endif ?>
                <svg class="star" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="m12 2 2.76 6.36L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l7.24-.91z"/></svg>
            </a>
        <?php endif ?>
        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav"><?= e(__('Menu')) ?></button>
    </div>
</header>
<main id="main"><?= $content ?></main>
<footer class="site-footer">
    <div class="wrap footer-row">
        <div>
            <img src="<?= e(pb_theme_url('assets/logo.svg')) ?>" alt="" width="120" height="26">
            <?php if (!$site->footer->text->isEmpty()): ?><p><?= $site->footer->text ?></p><?php endif ?>
        </div>
        <nav aria-label="<?= e(__('Menu do rodapé')) ?>"><?= pb_menu_html('footer', 'footer-list') ?></nav>
    </div>
    <div class="wrap footer-base">
        <span>© <?= date('Y') ?> <?= $siteName ?></span>
        <?php if ($site->footer->credit->raw() !== 'hide'): ?><span><?= e(__('Feito com PageBrick')) ?></span><?php endif ?>
    </div>
</footer>
<?= pb_footer() ?>
<script src="<?= e(pb_theme_url('assets/site.js')) ?>" defer></script>
</body>
</html>
