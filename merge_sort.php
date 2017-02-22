<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 21/02/17
 * Time: 11:22 PM
 */

$array = [3,6,2,4,9,1,5,8,0,7];
mergeSort($array, 0, count($array)-1);

function mergeSort($array, $start, $end) {
    echo implode(', ', array_slice($array, $start, $end-$start+1)) . "\n";
    if ($start>=$end) {
        return $array;
    }
    $mid = floor(($start + $end)/2);
    $a = mergeSort($array, $start, $mid);
    $b = mergeSort($array, $mid+1, $end);

}
function merge($a, $b) {

}