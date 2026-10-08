<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 */
?>
<article class="page">
    <header class="wrap narrow page-head">
        <h1><?= $title ?></h1>
        <?php if (!$page->intro->isEmpty()): ?><p class="lead"><?= $page->intro ?></p><?php endif ?>
    </header>
    <?php if (!$page->image->isEmpty()): ?>
        <figure class="wrap narrow page-image"><?= $page->image->img('', 'full', false) ?></figure>
    <?php endif ?>
    <?php if (!$page->body->isEmpty()): ?>
        <div class="wrap narrow prose"><?= $page->body ?></div>
    <?php endif ?>
</article>
