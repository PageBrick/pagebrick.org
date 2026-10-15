<?php
/**
 * The page's own content: the dark band with the title and introduction, the photo and the text.
 * @var PbGroup $page
 * @var PbValue $title
 */
?>
<header class="page-top band-dark guides">
    <div class="wrap narrow">
        <h1><?= $title ?></h1>
        <?php if (!$page->intro->isEmpty()): ?><p class="lead"><?= $page->intro ?></p><?php endif ?>
    </div>
</header>
<?php if (!$page->image->isEmpty()): ?>
    <figure class="wrap narrow page-image page-body"><?= $page->image->img('', 'full', false) ?></figure>
<?php endif ?>
<?php if (!$page->body->isEmpty()): ?>
    <div class="wrap narrow prose page-body"><?= $page->body ?></div>
<?php endif ?>
