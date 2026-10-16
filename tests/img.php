<?php
// php -d zend.assertions=1 -d assert.exception=1 tests/img.php
// The big pictures of the theme come in smaller copies, and pborg_img() lets the phone take the one that fits.
$theme = dirname(__DIR__) . '/pagebrick-org';
function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES); }
function pb_theme(): array { return ['dir' => dirname(__DIR__) . '/pagebrick-org']; }
function pb_theme_url(string $path): string { return "/content/themes/pagebrick-org/$path?v=1"; }
require "$theme/functions.php";

// the hero: two smaller copies and the original, smallest first, each with the width it has
$hero = pborg_img('hero-en', 1400, 1045, 'A "legionary"', '(min-width: 1060px) 980px, 94vw', 'class="figure" fetchpriority="high"');
assert(str_starts_with($hero, '<img class="figure" fetchpriority="high" src="/content/themes/pagebrick-org/assets/hero-en.webp?v=1"'), 'the attributes come first, then the original as src');
assert(str_contains($hero, 'srcset="/content/themes/pagebrick-org/assets/hero-en-480.webp?v=1 480w, /content/themes/pagebrick-org/assets/hero-en-800.webp?v=1 800w, /content/themes/pagebrick-org/assets/hero-en.webp?v=1 1400w"'), 'the srcset');
assert(str_contains($hero, 'sizes="(min-width: 1060px) 980px, 94vw"') && str_contains($hero, 'width="1400" height="1045"'), 'sizes and the size of the original (no layout shift)');
assert(str_contains($hero, 'alt="A &quot;legionary&quot;"'), 'the text is escaped');

// the columns: one smaller copy
$columns = pborg_img('columns', 986, 1480, '', '240px', 'class="columns" loading="lazy"');
assert(str_contains($columns, 'columns-493.webp?v=1 493w, /content/themes/pagebrick-org/assets/columns.webp?v=1 986w'), 'a copy of 493 px, then the original');
assert(!str_contains($columns, '-480.webp') && !str_contains($columns, '-800.webp'), 'only the copies that exist');

// a picture with no smaller copies is just itself
$plain = pborg_img('mark-without-copies', 300, 200, 'x', '300px');
assert(str_contains($plain, 'srcset="/content/themes/pagebrick-org/assets/mark-without-copies.webp?v=1 300w"'), 'no copies: the original alone');

// every picture the templates ask for has its copies, in the three languages
foreach (['en', 'pt', 'es'] as $code) {
    foreach (['hero', 'closing'] as $name) {
        foreach ([480, 800] as $width) {
            assert(is_file("$theme/assets/$name-$code-$width.webp"), "$name-$code-$width.webp is missing: run tools/pictures.php");
        }
        $size = getimagesize("$theme/assets/$name-$code-800.webp");
        assert($size[0] === 800 && abs($size[1] - round(1045 * 800 / 1400)) <= 1, "$name-$code-800.webp has the proportions of the original");
    }
}
assert(is_file("$theme/assets/columns-493.webp"));

// the copies are smaller than the originals (or they would not be worth the trouble)
foreach (['hero-en', 'closing-en'] as $name) {
    assert(filesize("$theme/assets/$name-480.webp") < filesize("$theme/assets/$name-800.webp") && filesize("$theme/assets/$name-800.webp") < filesize("$theme/assets/$name.webp") / 2, $name);
}

// the fonts are asked for with the page: the layout preloads each at the address the style sheet uses (no ?v=, or the browser downloads it twice)
$layout = file_get_contents("$theme/layout.php");
assert(str_contains($layout, "rel=\"preload\"") && str_contains($layout, "as=\"font\"") && str_contains($layout, 'crossorigin') && str_contains($layout, "strtok("), 'the fonts are preloaded without the ?v=');
$css = file_get_contents("$theme/assets/style.css");
assert(str_contains($css, 'url(fonts/newsreader.woff2)') && str_contains($css, 'url(fonts/inter-tight.woff2)'), 'the style sheet asks for the same files');

// the picture that is the largest thing of the first screen is there from the first paint (no fade, no wait)
assert(preg_match('~\.js \.stage\.intro \{ animation: rise-up~', $css) && preg_match('~@keyframes rise-up \{ from \{ transform: translateY\(18px\); \} to \{ transform: none; \} \}~', $css), 'the stage only rises');
echo "img: ok\n";
