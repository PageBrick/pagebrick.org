<?php
// Makes the smaller copies of the theme's big pictures (hero-en-480.webp, hero-en-800.webp, columns-493.webp…): the phone downloads the one that fits
// instead of the 1400 px original (pborg_img() in functions.php builds the srcset from them). Run again after changing a picture:
//   docker run --rm -v "<pasta pagebrick.org>:/site" -w /site pagebrick-app php tools/pictures.php
// Needs PHP with GD and WebP.

$dir = __DIR__ . '/../pagebrick-org/assets';
$jobs = [];
foreach (['en', 'pt', 'es'] as $code) {
    $jobs["hero-$code"] = [480, 800];
    $jobs["closing-$code"] = [480, 800];
}
$jobs['columns'] = [493];

foreach ($jobs as $name => $widths) {
    $source = imagecreatefromwebp("$dir/$name.webp") ?: throw new RuntimeException("Cannot read $name.webp");
    [$width, $height] = [imagesx($source), imagesy($source)];
    foreach ($widths as $to) {
        $copy = imagecreatetruecolor($to, (int) round($height * $to / $width));
        imagealphablending($copy, false);
        imagesavealpha($copy, true);
        imagecopyresampled($copy, $source, 0, 0, 0, 0, $to, imagesy($copy), $width, $height);
        imagewebp($copy, "$dir/$name-$to.webp", 80);
        printf("%s-%d.webp  %dx%d  %.1f KiB\n", $name, $to, $to, imagesy($copy), filesize("$dir/$name-$to.webp") / 1024);
    }
}
