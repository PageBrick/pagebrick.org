<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 */
$hero = $page->hero;
$owners = $page->services;
$dev = $page->developers;
$promise = $page->promise;
$install = $page->install;
$cta = $page->cta;
?>
<?php if ($hero->visible()): ?>
<section class="hero">
    <div class="wrap hero-grid">
        <div class="hero-text">
            <h1><?= $hero->title ?></h1>
            <?php if (!$hero->text->isEmpty()): ?><p class="lead"><?= $hero->text ?></p><?php endif ?>
            <div class="buttons">
                <?php if (!$hero->button_label->isEmpty()): ?>
                    <a class="button" href="<?= e($hero->button_link->url()) ?>"><?= $hero->button_label ?> <span aria-hidden="true">→</span></a>
                <?php endif ?>
                <?php if (!$page->hero_secondary_label->isEmpty()): ?>
                    <a class="text-link" href="<?= e($page->hero_secondary_link->url()) ?>"><?= $page->hero_secondary_label ?></a>
                <?php endif ?>
            </div>
            <?php if (!$page->hero_note->isEmpty()): ?><p class="note"><?= $page->hero_note ?></p><?php endif ?>
        </div>
        <?php if (!$hero->image->isEmpty()): ?>
            <figure class="hero-shot">
                <div class="window-bar" aria-hidden="true"><i></i><i></i><i></i></div>
                <?= $hero->image->img('', 'full', false) ?>
            </figure>
        <?php endif ?>
    </div>
</section>
<?php endif ?>

<?php if ($owners->visible()): ?>
<section class="section" id="owners">
    <div class="wrap">
        <header class="section-head">
            <h2><?= $owners->title ?></h2>
            <?php if (!$owners->intro->isEmpty()): ?><p><?= $owners->intro ?></p><?php endif ?>
        </header>
        <div class="cards">
            <?php foreach ($owners->items as $item): ?>
                <article class="card">
                    <h3><?= $item->title ?></h3>
                    <p><?= $item->text ?></p>
                </article>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif ?>

<?php if ($dev->visible()): ?>
<section class="section" id="developers">
    <div class="wrap split">
        <div>
            <h2><?= $dev->title ?></h2>
            <div class="prose"><?= $dev->text ?></div>
            <?php if (!$dev->link_label->isEmpty()): ?>
                <p><a class="text-link" href="<?= e($dev->link->url()) ?>"><?= $dev->link_label ?> <span aria-hidden="true">→</span></a></p>
            <?php endif ?>
        </div>
        <?php if (!$dev->code->isEmpty()): ?>
            <div class="terminal">
                <div class="window-bar" aria-hidden="true"><i></i><i></i><i></i></div>
                <pre><code><?= e($dev->code->raw()) ?></code></pre>
            </div>
        <?php endif ?>
    </div>
</section>
<?php endif ?>

<?php if ($promise->visible()): ?>
<section class="section" id="promise">
    <div class="wrap">
        <header class="section-head">
            <h2><?= $promise->title ?></h2>
            <?php if (!$promise->intro->isEmpty()): ?><p><?= $promise->intro ?></p><?php endif ?>
        </header>
        <ol class="numbered">
            <?php foreach ($promise->items as $n => $item): ?>
                <li>
                    <span class="number"><?= sprintf('%02d', $n + 1) ?></span>
                    <h3><?= $item->title ?></h3>
                    <p><?= $item->text ?></p>
                </li>
            <?php endforeach ?>
        </ol>
    </div>
</section>
<?php endif ?>

<?php if ($install->visible()): ?>
<section class="section" id="install">
    <div class="wrap">
        <header class="section-head">
            <h2><?= $install->title ?></h2>
            <?php if (!$install->intro->isEmpty()): ?><p><?= $install->intro ?></p><?php endif ?>
        </header>
        <ol class="steps">
            <?php foreach ($install->steps as $n => $step): ?>
                <li>
                    <span class="label"><?= e(sprintf(__('Passo %d'), $n + 1)) ?></span>
                    <h3><?= $step->title ?></h3>
                    <p><?= $step->text ?></p>
                </li>
            <?php endforeach ?>
        </ol>
        <?php if (!$install->button_label->isEmpty()): ?>
            <p><a class="button" href="<?= e($install->button_link->url()) ?>"><?= $install->button_label ?> <span aria-hidden="true">→</span></a></p>
        <?php endif ?>
    </div>
</section>
<?php endif ?>

<?= pb_slot('home') ?>

<?php if ($cta->visible()): ?>
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
