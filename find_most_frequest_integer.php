<?php

$a = [3,4,2,4,3,4,4,2,2,2,2,2];
$result = [];
foreach ($a as $val) {
    $result[$val] = (!isset($result[$val])) ? 1: $result[$val] + 1; 
}

echo array_search(max($result), $result);
