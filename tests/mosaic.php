<?php
// php -d zend.assertions=1 -d assert.exception=1 tests/mosaic.php
// Places pborg_mosaic's cards like CSS grid's sparse auto-placement on 4 columns and checks no cell is left empty.
function e(string $s): string { return $s; }
require dirname(__DIR__) . '/pagebrick-org/functions.php';
$span = ['' => [1, 1], 'wide' => [2, 1], 'full' => [4, 1], 'tall' => [1, 2], 'big' => [2, 2]];
for ($n = 1; $n <= 14; $n++) {
    $grid = [];
    $r = $c = 0;
    foreach (pborg_mosaic($n) as $size) {
        [$w, $h] = $span[$size];
        for (;; $c++) {
            if ($c + $w > 4) { $r++; $c = 0; }
            $free = true;
            for ($y = 0; $y < $h; $y++) for ($x = 0; $x < $w; $x++) if (isset($grid[$r + $y][$c + $x])) $free = false;
            if ($free) break;
        }
        for ($y = 0; $y < $h; $y++) for ($x = 0; $x < $w; $x++) $grid[$r + $y][$c + $x] = true;
        $c += $w;
    }
    $rows = count($grid);
    $cells = array_sum(array_map('count', $grid));
    assert($cells === $rows * 4, "$n cards leave holes");
    echo "$n cards: $rows rows, closed\n";
}
