<?php
/**
 * @var PbGroup $page
 * @var PbValue $title
 * @var PbGroup $site
 */
$contact = $site->contact;
?>
<article class="page">
    <header class="page-top band-dark guides">
        <div class="wrap narrow">
            <h1><?= $title ?></h1>
            <?php if (!$page->intro->isEmpty()): ?><p class="lead"><?= $page->intro ?></p><?php endif ?>
        </div>
    </header>
    <div class="wrap split contact page-body">
        <div>
            <?php if (!$page->body->isEmpty()): ?><div class="prose"><?= $page->body ?></div><?php endif ?>
            <?php if (!$contact->email->isEmpty()): ?>
                <p class="note"><a href="<?= e($contact->email->url()) ?>"><?= $contact->email ?></a></p>
            <?php endif ?>
        </div>
        <div class="contact-form"><?= pb_slot('contact') ?></div>
    </div>
</article>
