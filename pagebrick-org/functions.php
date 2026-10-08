<?php
// Helpers of the pagebrick.org theme (loaded once by theme.php).

/**
 * Star count of a GitHub repository, like "78k", or '' while unknown. The server asks GitHub at most every
 * six hours and keeps the answer, so visitors never talk to GitHub and a slow GitHub never slows the site.
 */
function pborg_github_stars(string $repositoryUrl): string
{
    if (!preg_match('~github\.com/([\w.-]+/[\w.-]+)~', $repositoryUrl, $m)) {
        return '';
    }
    $cache = json_decode((string) pb_option('pborg_github', ''), true);
    if (!is_array($cache) || ($cache['repo'] ?? '') !== $m[1] || ($cache['at'] ?? 0) < time() - 6 * 3600) {
        $context = stream_context_create(['http' => ['timeout' => 3, 'ignore_errors' => true,
            'header' => "User-Agent: pagebrick.org\r\nAccept: application/vnd.github+json\r\n"]]);
        $answer = json_decode((string) @file_get_contents("https://api.github.com/repos/{$m[1]}", false, $context), true);
        $stars = is_int($answer['stargazers_count'] ?? null) ? $answer['stargazers_count'] : ($cache['stars'] ?? null);
        $cache = ['repo' => $m[1], 'at' => time(), 'stars' => $stars];
        pb_set_option('pborg_github', json_encode($cache));
    }
    return is_int($cache['stars'] ?? null) ? pborg_short_number($cache['stars']) : '';
}

/** 950 → "950", 1234 → "1.2k", 78000 → "78k". */
function pborg_short_number(int $n): string
{
    return $n < 1000 ? (string) $n : rtrim(rtrim(number_format($n / 1000, 1, '.', ''), '0'), '.') . 'k';
}
