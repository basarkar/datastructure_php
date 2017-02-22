<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 20/02/17
 * Time: 11:38 PM
 * Ref: https://www.youtube.com/watch?v=SLauY6PpjW4&t=9s
 */
$array = [3,6,2,4,9,1,5,8,0,7];
echo "Original array: " . implode(', ', $array) . "\n";
quickSort($array, 0, count($array)-1);
echo "Quick sorted array: " . implode(', ', $array) . "\n";

function quickSort(&$array, $start, $end) {
    // Base condition.
    if ($start >= $end) {
        return;
    }
    // Get the pivot index (by shifting all less values left from pivot value
    // and greater values in the right of the pivot value) to partition.
    $pivot_index = partition($array, $start, $end);
    // Recursive Quick sort: Left set.
    quickSort($array, $start, $pivot_index-1);
    // Recursive Quick sort: Right set.
    quickSort($array, $pivot_index, $end);
}

function partition(&$array, $start, $end) {
    // Let say we set the pivot value from the middle of the array.
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
