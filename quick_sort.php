<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 20/02/17
 * Time: 11:38 PM
 * Ref: https://www.youtube.com/watch?v=SLauY6PpjW4&t=9s
 */
$array = [3,6,2,4,9,1,5,8,0,7];
quickSort($array, 0, count($array)-1);
echo "Quick sorted array: " . implode(', ', $array) . "\n";

function quickSort(&$array, $start, $end) {
    if ($start >= $end) {
        return;
    }
    $pivot_index = partition($array, $start, $end);
    quickSort($array, $start, $pivot_index-1);
    quickSort($array, $pivot_index, $end);
}

function partition(&$array, $start, $end) {
    $pivot = $array[floor(($start+$end)/2)];
    while ($start < $end) {
        while ($array[$start] < $pivot) {
            $start++;
        }
        while ($array[$end] > $pivot) {
            $end--;
        }
        if ($start <= $end) {
            $temp = $array[$start];
            $array[$start] = $array[$end];
            $array[$end] = $temp;
            $start++; $end--;
        }
    }
    return $start;
}
