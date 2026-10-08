<?php
/**
 * The whole page visitors see while the site is under construction or in maintenance (see pb_render_closed).
 * @var string  $mode
 * @var string  $title
 * @var string  $message
 * @var PbGroup $site
 * @var string  $siteName
 */
$github = $site->project->github->raw();
?>
<!doctype html>
<html lang="<?= e(pb_locale()) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<title><?= e($siteName !== '' ? "$title · $siteName" : $title) ?></title>
<link rel="stylesheet" href="<?= e(pb_theme_url('assets/style.css')) ?>">
<link rel="icon" href="<?= e(pb_theme_url('assets/favicon.svg')) ?>">
</head>
<body class="closed">
<main class="wrap narrow">
    <img src="<?= e(pb_theme_url('assets/logo.svg')) ?>" alt="<?= e($siteName) ?>" width="148" height="32">
    <h1><?= e($title) ?></h1>
    <p class="lead"><?= nl2br(e($message)) ?></p>
    <?php if ($github !== ''): ?>
        <p><?= pborg_slide_button($github, e(__('Acompanhe no GitHub'))) ?></p>
    <?php endif ?>
</main>
</body>
</html>
