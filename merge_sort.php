<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 21/02/17
 * Time: 11:22 PM
 */

$array = [3,6,2,4,9,1,5,8,0,7];
echo "Original array: " . implode(', ', $array) . "\n";
$array = mergeSort($array);
echo "Merge sorted array: " . implode(', ', $array) . "\n";

function mergeSort($array) {
    // If the array has one or empty values then return it right away.
    if (count($array) <= 1) {
        return $array;
    }
    $start = 0; $end = count($array)-1;
    $mid = floor(($start + $end)/2);
    // Run recursion on left set.
    $a = mergeSort(array_slice($array, $start, $mid-$start+1));
    // Run recursion on right set.
    $b = mergeSort(array_slice($array, $mid+1, $end-$mid));
    return merge($a, $b);
}

function merge($a, $b) {
    $c = [];
    $i=0; $a_n = count($a);
    $j=0; $b_n = count($b);
    while ($i<$a_n && $j<$b_n) {
        if ($a[$i] > $b[$j]) {
            $c[] = $b[$j];
            $j++;
        }
        else {
            $c[] = $a[$i];
            $i++;
        }
    }
    while ($i<$a_n) {
        $c[] = $a[$i];
        $i++;
    }
    while ($j<$b_n) {
        $c[] = $b[$j];
        $j++;
    }
    return $c;
}