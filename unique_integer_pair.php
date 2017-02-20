<?php
/**
 * You are given an array of n integers and a target sum T.
 * The goal is to find all pairs x,y in the array with x+y=T.
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 19/02/17
 * Time: 11:08 PM
 */

$array = [3,4,2,1,7,9];
$T = 4;
$n = count($array);
$hash = [];
// Populate the hash table.
for ($i=0; $i<$n; $i++) {
    $hash[$array[$i]] = $i;
}
echo "The given array: ". implode(', ', $hash) . "\n";
for ($i=0; $i<$n; $i++) {
    $v = $T-$array[$i];
    if (isset($hash[$v]) && $hash[$v] != $i) {
        echo "The pair that makes $T is= ($array[$i], $v)\n";
    }
}
