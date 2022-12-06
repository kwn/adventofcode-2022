<?php

$data = str_split(file_get_contents('data.txt'));
const LENGTH = 14;

for ($i = 0; $i < count($data) - LENGTH; $i++) {
    $slice = array_slice($data, $i, LENGTH);

    if (count(array_unique($slice)) === LENGTH) {
        echo $i + LENGTH;
        break;
    }
}
