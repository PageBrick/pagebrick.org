<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 */
$cta = $page->cta;
$sizes = pborg_mosaic(count($page->items));
?>
<article class="page">
    <header class="wrap page-head">
        <h1><?= $title ?></h1>
        <?php if (!$page->intro->isEmpty()): ?><p class="lead"><?= $page->intro ?></p><?php endif ?>
    </header>
    <div class="wrap">
        <div class="mosaic">
            <?php foreach ($page->items as $n => $item): ?>
                <div class="flip <?= array_shift($sizes) ?>" tabindex="0" data-reveal style="--i: <?= $n % 4 ?>">
                    <div class="flip-inner">
                        <div class="flip-front" aria-hidden="true">
                            <div class="flip-caption">
                                <div>
                                    <h2><?= $item->title ?></h2>
                                    <?php if (!$item->summary->isEmpty()): ?><p><?= $item->summary ?></p><?php endif ?>
                                </div>
                                <svg class="flip-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 9 3-3 3 3"/><path d="M13 18H7a2 2 0 0 1-2-2V6"/><path d="m22 15-3 3-3-3"/><path d="M11 6h6a2 2 0 0 1 2 2v10"/></svg>
                            </div>
                        </div>
                        <div class="flip-back">
                            <h2><?= $item->title ?></h2>
                            <p><?= $item->text ?></p>
                        </div>
                    </div>
                </div>
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
            <?= pborg_slide_button($cta->button_link->url(), (string) $cta->button_label, 'button button-light', (string) $cta->button_hover) ?>
        <?php endif ?>
    </div>
</section>
<?php endif ?>
