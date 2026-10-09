<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 * Motion: elements with data-reveal fade in when they reach the screen (assets/site.js); --i staggers a group.
 */
$hero = $page->hero;
$owners = $page->services;
$dev = $page->developers;
$promise = $page->promise;
$install = $page->install;
$cta = $page->cta;
// The update simulator's texts (it is a demonstration, not content: it lives in the theme, translated by lang/).
$simulator = [
    'steps' => [__('Baixando a versão 1.1.0'), __('Conferindo a assinatura'), __('Guardando um backup da versão atual'), __('Trocando o núcleo'), __('Abrindo todas as páginas do site')],
    'ok' => __('Tudo certo: o site está na versão 1.1.0.'),
    'broken' => __('Uma página deu erro, então a versão 1.0.0 voltou sozinha. Os visitantes não viram nada.'),
    'failed' => __('A página "Sobre" deu erro'),
];
?>
<?php if ($hero->visible()): ?>
<section class="hero">
    <div class="wrap hero-grid">
        <div class="hero-text">
            <h1 class="intro" style="--i: 0"><?= $hero->title ?></h1>
            <?php if (!$hero->text->isEmpty()): ?><p class="lead intro" style="--i: 1"><?= $hero->text ?></p><?php endif ?>
            <div class="buttons intro" style="--i: 2">
                <?php if (!$hero->button_label->isEmpty()): ?>
                    <?= pborg_slide_button($hero->button_link->url(), (string) $hero->button_label, 'button', (string) $page->hero_button_hover) ?>
                <?php endif ?>
                <?php if (!$page->hero_secondary_label->isEmpty()): ?>
                    <a class="command command-cta" href="<?= e($page->hero_secondary_link->url()) ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15H6.5A2.5 2.5 0 0 0 4 20.5zM4 20.5A2.5 2.5 0 0 0 6.5 23H20v-5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg> <span><?= $page->hero_secondary_label ?></span><?= pborg_shine() ?></a>
                <?php endif ?>
            </div>
            <?php if (!$page->hero_note->isEmpty()): ?><p class="note intro" style="--i: 3"><?= implode(' · ', array_map(fn($fact) => '<span>' . e(trim($fact)) . '</span>', explode('·', (string) $page->hero_note))) ?></p><?php endif ?>
        </div>
        <?php if (!$hero->image->isEmpty()): ?>
            <figure class="hero-shot intro" style="--i: 2" data-tilt>
                <div class="window-bar" aria-hidden="true"><i></i><i></i><i></i></div>
                <picture>
                    <?php if (!$page->hero_image_phone->isEmpty()): ?><source media="(max-width: 560px)" srcset="<?= e($page->hero_image_phone->url()) ?>"><?php endif ?>
                    <?= $hero->image->img('', 'full', false) ?>
                </picture>
            </figure>
        <?php endif ?>
    </div>
</section>
<?php endif ?>

<?php if ($owners->visible()): ?>
<section class="section" id="owners">
    <div class="wrap">
        <header class="section-head" data-reveal>
            <h2><?= $owners->title ?></h2>
            <?php if (!$owners->intro->isEmpty()): ?><p><?= $owners->intro ?></p><?php endif ?>
        </header>
        <div class="cards">
            <?php foreach ($owners->items as $n => $item): ?>
                <article class="card" data-reveal style="--i: <?= $n ?>">
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
        <div data-reveal>
            <h2><?= $dev->title ?></h2>
            <div class="prose"><?= $dev->text ?></div>
            <?php if (!$dev->link_label->isEmpty()): ?>
                <p><a class="text-link" href="<?= e($dev->link->url()) ?>"><?= $dev->link_label ?> <span aria-hidden="true">→</span></a></p>
            <?php endif ?>
        </div>
        <?php if (!$dev->code->isEmpty()): ?>
            <div class="terminal" data-reveal style="--i: 1">
                <div class="window-bar"><i></i><i></i><i></i>
                    <button type="button" class="copy command command-dark" data-copy data-copied="<?= e(__('Copiado')) ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="8" y="8" width="12" height="12" rx="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2" fill="none" stroke="currentColor" stroke-width="1.6"/></svg><span data-copy-label><?= e(__('Copiar')) ?></span><?= pborg_shine() ?></button>
                </div>
                <pre><code data-type><?= e($dev->code->raw()) ?></code></pre>
            </div>
        <?php endif ?>
    </div>
</section>
<?php endif ?>

<?php if ($promise->visible()): ?>
<section class="section" id="promise">
    <div class="wrap">
        <header class="section-head" data-reveal>
            <h2><?= $promise->title ?></h2>
            <?php if (!$promise->intro->isEmpty()): ?><p><?= $promise->intro ?></p><?php endif ?>
        </header>
        <ol class="numbered">
            <?php foreach ($promise->items as $n => $item): ?>
                <li data-reveal style="--i: <?= $n ?>">
                    <span class="number"><?= sprintf('%02d', $n + 1) ?></span>
                    <h3><?= $item->title ?></h3>
                    <p><?= $item->text ?></p>
                </li>
            <?php endforeach ?>
        </ol>
        <div class="simulator" data-reveal data-simulator="<?= e(json_encode($simulator, JSON_UNESCAPED_UNICODE)) ?>">
            <div class="simulator-head">
                <p class="label"><?= e(__('Experimente')) ?></p>
                <div class="simulator-buttons">
                    <button type="button" class="button slide" data-run="ok"><?= pborg_slide_text(e(__('Atualizar')), e(__('Veja acontecer'))) ?></button>
                    <button type="button" class="command command-cta" data-run="broken"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 2 21h20zM12 10v5M12 18v.5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" stroke-linecap="round"/></svg><span><?= e(__('Atualizar com uma página quebrada')) ?></span><?= pborg_shine() ?></button>
                </div>
            </div>
            <ol class="simulator-log" aria-live="polite"><li class="muted"><?= e(__('Escolha um dos botões para ver o que acontece numa atualização.')) ?></li></ol>
        </div>
    </div>
</section>
<?php endif ?>

<?php if ($install->visible()): ?>
<section class="section" id="install">
    <div class="wrap">
        <header class="section-head" data-reveal>
            <h2><?= $install->title ?></h2>
            <?php if (!$install->intro->isEmpty()): ?><p><?= $install->intro ?></p><?php endif ?>
        </header>
        <ol class="steps">
            <?php foreach ($install->steps as $n => $step): ?>
                <li data-reveal style="--i: <?= $n ?>">
                    <span class="label"><?= e(sprintf(__('Passo %d'), $n + 1)) ?></span>
                    <h3><?= $step->title ?></h3>
                    <p><?= $step->text ?></p>
                </li>
            <?php endforeach ?>
        </ol>
        <?php if (!$install->button_label->isEmpty()): ?>
            <p data-reveal><?= pborg_slide_button($install->button_link->url(), (string) $install->button_label, 'button', (string) $install->button_hover) ?></p>
        <?php endif ?>
    </div>
</section>
<?php endif ?>

<?= pb_slot('home') ?>

<?php if ($cta->visible()): ?>
<section class="closing">
    <div class="wrap closing-row" data-reveal>
        <div>
            <h2><?= $cta->title ?></h2>
            <?php if (!$cta->text->isEmpty()): ?><p><?= $cta->text ?></p><?php endif ?>
        </div>
        <?php if (!$cta->button_label->isEmpty()): ?>
            <?= pborg_slide_button($cta->button_link->url(), (string) $cta->button_label, 'button button-light', (string) $page->cta_button_hover) ?>
        <?php endif ?>
    </div>
</section>
<?php endif ?>
