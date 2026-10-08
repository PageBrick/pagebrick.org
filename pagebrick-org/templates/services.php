<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 */
$cta = $page->cta;
?>
<article class="page">
    <header class="wrap page-head">
        <h1><?= $title ?></h1>
        <?php if (!$page->intro->isEmpty()): ?><p class="lead"><?= $page->intro ?></p><?php endif ?>
    </header>
    <div class="wrap">
        <div class="cards">
            <?php foreach ($page->items as $item): ?>
                <article class="card">
                    <?php if (!$item->image->isEmpty()): ?><?= $item->image->img('card-image') ?><?php endif ?>
                    <h2><?= $item->title ?></h2>
                    <p><?= $item->text ?></p>
                </article>
            <?php endforeach ?>
        </div>
    </div>
</article>
<?php if ($cta->visible() && !$cta->title->isEmpty()): ?>
<section class="closing">
    <div class="wrap closing-row">
        <div>
            <h2><?= $cta->title ?></h2>
            <?php if (!$cta->text->isEmpty()): ?><p><?= $cta->text ?></p><?php endif ?>
        </div>
        <?php if (!$cta->button_label->isEmpty()): ?>
            <a class="button button-light" href="<?= e($cta->button_link->url()) ?>"><?= $cta->button_label ?> <span aria-hidden="true">→</span></a>
        <?php endif ?>
    </div>
</section>
<?php endif ?>
