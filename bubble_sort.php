<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 20/02/17
 * Time: 11:08 PM
 */
$array = [3,6,2,4,1,9,5,8,0,7];
$n = count($array);

for ($j=0; $j < $n-1; $j++) {
    for ($i = 0; $i < ($n-$j-1); $i++) {
        if ($array[$i] > $array[$i + 1]) {
            $array[$i] = $array[$i] + $array[$i + 1];
            $array[$i + 1] = $array[$i] - $array[$i + 1];
            $array[$i] = $array[$i] - $array[$i + 1];
        }
    }
}

echo "Bubble sort " . implode(', ', $array) . "\n";