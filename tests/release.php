<?php
// php -d zend.assertions=1 -d assert.exception=1 tests/release.php
// Only this project's own release file, with a real version and a SHA-256, becomes the download button.
function e(string $s): string { return $s; }
require dirname(__DIR__) . '/pagebrick-org/functions.php';

$sha = str_repeat('ab', 32);
$entry = fn(string $v = '1.2.3', ?string $url = null, string $hash = '') => ['version' => $v, 'url' => $url ?? "https://github.com/PageBrick/pagebrick/releases/download/v$v/pagebrick-$v.zip", 'sha256' => $hash ?: $sha];

assert(pborg_release_from($entry()) === ['version' => '1.2.3', 'url' => 'https://github.com/PageBrick/pagebrick/releases/download/v1.2.3/pagebrick-1.2.3.zip', 'sha256' => $sha], 'a good entry is kept');
assert(pborg_release_from(null) === null && pborg_release_from('x') === null && pborg_release_from([]) === null, 'nothing, or not an entry');
assert(pborg_release_from($entry('1.2')) === null && pborg_release_from($entry('v1.2.3')) === null && pborg_release_from($entry('1.2.3-beta')) === null, 'only x.y.z versions');
assert(pborg_release_from($entry('1.2.3', 'https://evil.example/pagebrick-1.2.3.zip')) === null, 'another site is refused');
assert(pborg_release_from($entry('1.2.3', 'https://github.com/PageBrick/pagebrick/releases/download/v1.2.4/pagebrick-1.2.4.zip')) === null, 'a file of another version is refused');
assert(pborg_release_from($entry('1.2.3', 'https://github.com/other/pagebrick/releases/download/v1.2.3/pagebrick-1.2.3.zip')) === null, 'another repository is refused');
assert(pborg_release_from($entry('1.2.3', null, 'xyz')) === null && pborg_release_from($entry('1.2.3', null, strtoupper($sha))) === null, 'a checksum is 64 lowercase hex digits');
assert(pborg_previous_version('1.2.0') === '1.1.0' && pborg_previous_version('1.1.2') === '1.1.1' && pborg_previous_version('2.0.0') === '1.0.0' && pborg_previous_version('1.0.0') === '1.0.0', 'the version before');
echo "release: ok\n";
