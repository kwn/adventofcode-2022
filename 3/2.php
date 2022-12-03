<?php

$data = array_filter(explode(PHP_EOL, file_get_contents('data.txt')), fn(string $item) => $item !== '');

$exploded = array_map(fn(string $item) => str_split($item), $data);
$chunked = array_chunk($exploded, 3);
$mapped = array_map(fn(array $items) => array_unique(array_intersect(...$items)), $chunked);

$scoring = array_merge(
    array_combine(range('a', 'z'), range(1, 26)),
    array_combine(range('A', 'Z'), range(27, 52)),
);

$total = array_reduce($mapped, fn(int $acc, array $current) => $acc + $scoring[array_pop($current)], 0);

var_dump($total);
