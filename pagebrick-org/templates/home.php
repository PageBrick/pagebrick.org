<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 * @var PbGroup $site
 * Motion: elements with data-reveal fade in when they reach the screen (assets/site.js); --i staggers a group.
 * A word between *asterisks* in a title is shown in the title's colour of emphasis (pborg_em).
 */
$hero = $page->hero;
$owners = $page->services;
$spot = $page->spotlight;
$dev = $page->developers;
$promise = $page->promise;
$numbers = $page->numbers;
$install = $page->install;
$cta = $page->cta;
$parts = []; // the sections after the hero, printed at the end in the order chosen in the panel
$release = pborg_release();
$download = $site->project->download->url();
$code = ['pt-BR' => 'pt', 'es' => 'es'][pb_content_locale()] ?? 'en'; // the pictures with the panel on the laptop exist in three languages
$icons = ['shield', 'layout', 'clipboard', 'scan', 'folder'];
// The update simulator's texts (a demonstration, not content: it lives in the theme, translated by lang/). It names the newest release and the one before it.
$new = $release['version'] ?? '';
$old = $new !== '' ? pborg_previous_version($new) : '';
$simulator = [
    'steps' => [$new !== '' ? sprintf(__('Baixando a versão %s'), $new) : __('Baixando a nova versão'), __('Conferindo a assinatura'), __('Guardando um backup da versão atual'), __('Trocando o núcleo'), __('Abrindo todas as páginas do site')],
    'ok' => $new !== '' ? sprintf(__('Tudo certo: o site está na versão %s.'), $new) : __('Tudo certo: o site foi atualizado.'),
    'broken' => $old !== '' ? sprintf(__('Uma página deu erro, então a versão %s voltou sozinha. Os visitantes não viram nada.'), $old) : __('Uma página deu erro, então a versão anterior voltou sozinha. Os visitantes não viram nada.'),
    'failed' => __('A página "Sobre" deu erro'),
];
?>
<?php ob_start() ?>
<?php if ($hero->visible()): ?>
<section class="hero band-dark guides">
    <div class="wrap hero-top">
        <div class="hero-text">
            <?php if (!$page->hero_badge->isEmpty()): $badgeUrl = $page->hero_badge_link->url(); ?>
                <p class="badge intro" style="--i: 0">
                    <?php if ($badgeUrl !== ''): ?>
                        <a href="<?= e($badgeUrl) ?>"><i aria-hidden="true"></i><?= $page->hero_badge ?> <span class="arrow" aria-hidden="true">→</span></a>
                    <?php else: ?>
                        <span><i aria-hidden="true"></i><?= $page->hero_badge ?></span>
                    <?php endif ?>
                </p>
            <?php endif ?>
            <?php // The motto is a wink at a song about bricks: its title stays in English whatever the language of the site (only the phrase before it is translated). ?>
            <p class="motto intro" style="--i: 0"><span><?= e(__('Página por página.')) ?></span> <em lang="en">Another Brick in the Wall.</em></p>
            <h1 class="intro" style="--i: 0"><?= pborg_em($hero->title) ?></h1>
            <?php if (!$hero->text->isEmpty()): ?><p class="lead intro" style="--i: 1"><?= $hero->text ?></p><?php endif ?>
            <div class="hero-row">
                <div class="buttons intro" style="--i: 2">
                    <?php if (!$hero->button_label->isEmpty()): ?>
                        <?= pborg_slide_button($hero->button_link->url(), (string) $hero->button_label, 'button', (string) $page->hero_button_hover) ?>
                    <?php endif ?>
                    <?php if (!$page->hero_secondary_label->isEmpty()): ?>
                        <a class="command command-cta" href="<?= e($page->hero_secondary_link->url()) ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15H6.5A2.5 2.5 0 0 0 4 20.5zM4 20.5A2.5 2.5 0 0 0 6.5 23H20v-5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg> <span><?= $page->hero_secondary_label ?></span><?= pborg_shine() ?></a>
                    <?php endif ?>
                </div>
                <?php if (!$page->hero_note->isEmpty()): ?><p class="note facts intro" style="--i: 3"><?= implode('', array_map(fn($fact) => '<span>' . e(trim($fact)) . '</span>', explode('·', (string) $page->hero_note))) ?></p><?php endif ?>
            </div>
        </div>
    </div>
    <div class="hero-geo" aria-hidden="true"><svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="50"/><line x1="-100" y1="-100" x2="200" y2="200"/><line x1="200" y1="-100" x2="-100" y2="200"/></svg><i class="hline"></i></div>
    <div class="wrap">
        <div class="stage intro" style="--i: 2">
            <?= pborg_img("hero-$code", 1400, 1045, __('Um legionário romano usando o painel do PageBrick num notebook'), '(min-width: 1060px) 980px, 94vw', 'class="figure" fetchpriority="high" decoding="async"') ?>
            <p class="pop pop-a" aria-hidden="true"><strong><?= e(__('Cópia guardada antes de atualizar')) ?></strong><span><?= e(__('O site continua no ar')) ?></span></p>
            <p class="pop pop-b" aria-hidden="true"><strong><?= e(__('Todas as páginas conferidas')) ?></strong><span><?= e(__('Nenhuma deu erro')) ?></span></p>
        </div>
    </div>
</section>
<?php endif ?>
<?= pborg_section('hero', ob_get_clean()) ?>

<?php ob_start() ?>
<?php if ($owners->visible()): ?>
<section class="split-band band-orange" id="owners">
    <div class="split-image" aria-hidden="true">
        <?= pborg_img('columns', 986, 1480, '', '(max-width: 700px) 240px, 440px', 'class="columns" loading="lazy" decoding="async"') ?>
        <p class="float-card"><strong><?= e(__('Página publicada')) ?></strong><span><?= e(__('A página inicial já está no ar')) ?></span></p>
    </div>
    <div class="split-text" data-reveal>
        <h2><?= pborg_em($owners->title) ?></h2>
        <?php if (!$owners->intro->isEmpty()): ?><p class="panel-intro"><?= $owners->intro ?></p><?php endif ?>
        <ul class="checks">
            <?php foreach ($owners->items as $item): ?>
                <li><div><h3><?= $item->title ?></h3><p><?= $item->text ?></p></div></li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<?php endif ?>
<?php $parts['services'] = ob_get_clean() ?>

<?php ob_start() ?>
<?php if ($promise->visible()): ?>
<section class="section wall" id="promise">
    <div class="wrap">
        <header class="section-head" data-reveal>
            <h2><?= pborg_em($promise->title) ?></h2>
            <?php if (!$promise->intro->isEmpty()): ?><p><?= $promise->intro ?></p><?php endif ?>
        </header>
        <ol class="numbered">
            <?php foreach ($promise->items as $n => $item): ?>
                <li data-reveal style="--i: <?= $n ?>">
                    <span class="icon"><?= pborg_icon($icons[$n % count($icons)]) ?></span>
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
<?php $parts['promise'] = ob_get_clean() ?>

<?php ob_start() ?>
<?php if ($spot->visible() && !$spot->title->isEmpty()): ?>
<section class="section" id="spotlight">
    <div class="wrap">
        <header class="section-head center" data-reveal>
            <h2><?= pborg_em($spot->title) ?></h2>
            <?php if (!$spot->text->isEmpty()): ?><p><?= $spot->text ?></p><?php endif ?>
            <?php if (!$spot->link_label->isEmpty()): ?>
                <p><a class="text-link" href="<?= e($spot->link->url()) ?>"><?= $spot->link_label ?> <span aria-hidden="true">→</span></a></p>
            <?php endif ?>
        </header>
        <div class="bento">
            <?php if (!$spot->image->isEmpty()): ?>
                <figure class="bento-card bento-shot" data-reveal>
                    <figcaption class="bento-head"><?= e(__('Painel')) ?> <span><?= e(__('No ar')) ?></span></figcaption>
                    <div class="shot"><?= $spot->image->img('', 'full') ?></div>
                </figure>
            <?php endif ?>
            <?php if ($dev->visible()): ?>
                <div class="bento-card bento-dark" id="developers" data-reveal style="--i: 1">
                    <h3><?= pborg_em($dev->title) ?></h3>
                    <div class="prose-light"><?= $dev->text ?></div>
                    <?php $sample = $dev->code->isEmpty() ? pborg_code_sample() : (string) $dev->code->raw(); // the sample lives in the theme: see pborg_code_sample() ?>
                    <?php if ($sample !== ''): ?>
                        <div class="terminal">
                            <div class="window-bar"><i></i><i></i><i></i>
                                <button type="button" class="copy command command-dark" data-copy data-copied="<?= e(__('Copiado')) ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="8" y="8" width="12" height="12" rx="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2" fill="none" stroke="currentColor" stroke-width="1.6"/></svg><span data-copy-label><?= e(__('Copiar')) ?></span><?= pborg_shine() ?></button>
                            </div>
                            <pre tabindex="0"><code data-type><?= e($sample) ?></code></pre>
                        </div>
                    <?php endif ?>
                    <?php if (!$dev->link_label->isEmpty()): ?>
                        <p><a class="text-link" href="<?= e($dev->link->url()) ?>"><?= $dev->link_label ?> <span aria-hidden="true">→</span></a></p>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php if ($release && $download !== ''): ?>
                <div class="bento-card bento-version" data-reveal style="--i: 2">
                    <div><p class="label"><?= e(__('Última versão')) ?></p>
                    <p class="big-number"><?= e($release['version']) ?></p></div>
                    <p><?= e(__('Licença MIT, grátis e sem cadastro.')) ?></p>
                    <?= pborg_slide_button($download, e(__('Baixar')), 'button', e(__('Grátis')), '', '↓') ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>
<?php endif ?>
<?php $parts['spotlight'] = ob_get_clean() ?>

<?php ob_start() ?>
<?php if ($numbers->visible() && !$numbers->title->isEmpty() && count($numbers->items)): ?>
<section class="section stats wall" id="numbers">
    <div class="wrap stats-row" data-reveal>
        <h2><?= pborg_em($numbers->title) ?></h2>
        <dl class="stat-list">
            <?php foreach ($numbers->items as $item): ?>
                <div><dt><?= $item->value ?></dt><dd><?= $item->label ?></dd></div>
            <?php endforeach ?>
        </dl>
    </div>
</section>
<?php endif ?>
<?php $parts['numbers'] = ob_get_clean() ?>

<?php ob_start() ?>
<?php if ($install->visible()): ?>
<section class="section" id="install">
    <div class="wrap">
        <header class="section-head center" data-reveal>
            <h2><?= pborg_em($install->title) ?></h2>
            <?php if (!$install->intro->isEmpty()): ?><p><?= $install->intro ?></p><?php endif ?>
        </header>
        <?php $last = count($install->steps) - 1; ?>
        <ol class="plans">
            <?php foreach ($install->steps as $n => $step): ?>
                <li class="plan<?= $n === $last ? ' plan-dark' : '' ?>" data-reveal style="--i: <?= $n ?>">
                    <span class="plan-step"><?= e(sprintf(__('Passo %d'), $n + 1)) ?></span>
                    <h3><?= $step->title ?></h3>
                    <span class="plan-num" aria-hidden="true"><?= sprintf('%02d', $n + 1) ?></span>
                    <p><?= $step->text ?></p>
                </li>
            <?php endforeach ?>
        </ol>
        <?php if (!$install->button_label->isEmpty()): ?>
            <p data-reveal style="text-align: center"><?= pborg_slide_button($install->button_link->url(), (string) $install->button_label, 'button', (string) $install->button_hover) ?></p>
        <?php endif ?>
    </div>
</section>
<?php endif ?>
<?php $parts['install'] = ob_get_clean() ?>

<?php $parts['plugins'] = pb_slot('home') ?>

<?php ob_start() ?>
<?php if ($cta->visible()): ?>
<section class="closing has-stage">
    <div class="wrap closing-row">
        <div class="closing-text" data-reveal>
            <h2><?= pborg_em($cta->title) ?></h2>
            <?php if (!$cta->text->isEmpty()): ?><p><?= $cta->text ?></p><?php endif ?>
            <div class="buttons closing-actions">
                <?php if (!$cta->button_label->isEmpty()): ?>
                    <?= pborg_slide_button($cta->button_link->url(), (string) $cta->button_label, 'button button-light', (string) $page->cta_button_hover) ?>
                <?php endif ?>
                <?php if (!$page->cta_secondary_label->isEmpty()): ?>
                    <a class="command command-cta" href="<?= e($page->cta_secondary_link->url()) ?>"><span><?= $page->cta_secondary_label ?></span><?= pborg_shine() ?></a>
                <?php endif ?>
            </div>
        </div>
        <div class="closing-stage" aria-hidden="true" data-reveal>
            <?= pborg_img("closing-$code", 1400, 1045, '', '(min-width: 1060px) 980px, 94vw', 'class="figure" loading="lazy" decoding="async"') ?>
            <p class="pop pop-d"><strong><?= e(__('Licença MIT')) ?></strong><span><?= e(__('Use em qualquer site')) ?></span></p>
            <p class="pop pop-e"><strong><?= e(__('Sem cadastro')) ?></strong><span><?= e(__('Sem chave de licença')) ?></span></p>
        </div>
    </div>
</section>
<?php endif ?>
<?php $parts['cta'] = ob_get_clean() ?>

<?php foreach (pborg_order($page, ['services', 'promise', 'spotlight', 'numbers', 'install', 'plugins', 'cta']) as $name): ?>
<?= pborg_section($name, str_starts_with($name, 'block-') ? pborg_block($page, $name) : ($parts[$name] ?? '')) ?>
<?php endforeach ?>
