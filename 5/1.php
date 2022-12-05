<?php

$data = explode(PHP_EOL, file_get_contents('data.txt'));

$stringCrates = array_splice($data, 0, 8);
$splitCrates = array_map(static fn(string $line) => str_split($line, 4), $stringCrates);
$parsedCrates = array_map(static fn(array $line) => array_map(static fn(string $crate) => trim($crate) === '' ? null : trim($crate, ' []'), $line), $splitCrates);
$transposedCrates = array_map(null, ...$parsedCrates);
$crates = array_map(static fn(array $column) => array_reverse(array_filter($column)), $transposedCrates);

array_splice($data, 0, 2);
array_splice($data, -1);

$processing = array_map(static function(string $instructions) {
    preg_match('/move (?<move>\d+) from (?<from>\d+) to (?<to>\d+)/', $instructions, $parsed);

    return [
        'move' => (int) $parsed['move'],
        'from' => (int) --$parsed['from'],
        'to' => (int) --$parsed['to'],
    ];
}, $data);

foreach ($processing as $step) {
    $removed = array_splice($crates[$step['from']], -$step['move']);
    array_push($crates[$step['to']], ...array_reverse($removed));
}

$result = array_reduce($crates, static fn(string $acc, $current) => $acc . end($current), '');

var_dump($result);
