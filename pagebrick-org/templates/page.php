<?php
/**
 * A simple page: its own content and, from PageBrick 1.3, the sections the client added around it (theme.php: 'blocks').
 * @var PbGroup $page
 * @var PbValue $title
 */
$content = fn() => pb_include(__DIR__ . '/parts/page-content.php', ['page' => $page, 'title' => $title]);
?>
<article class="page">
    <?= function_exists('pb_sections') ? pb_sections($page, ['content'], $content) : $content() ?>
</article>
