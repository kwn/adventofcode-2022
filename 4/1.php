<?php

$data = array_filter(explode(PHP_EOL, file_get_contents('data.txt')), fn(string $item) => $item !== '');
$ranges = [];

$ranges = array_map(static function (string $row) {
    preg_match('/(?<e1f>\d+)-(?<e1t>\d+),(?<e2f>\d+)-(?<e2t>\d+)/', $row, $matches);
    return [
        range((int) $matches['e1f'], (int) $matches['e1t']),
        range((int) $matches['e2f'], (int) $matches['e2t']),
    ];
}, $data);

$overlaps = array_reduce($ranges, static function (int $acc, array $pair) {
    [$e1, $e2] = $pair;

    if (count($e1) === count(array_intersect($e1, $e2)) || count($e2) === count(array_intersect($e1, $e2))) {
        return ++$acc;
    }

    return $acc;
}, 0);

var_dump($overlaps);
