<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 19/02/17
 * Time: 8:34 PM
 */

$from = "bappa";
$to = "sarkar";
/**
  0 a b c d e f
0 0 1 2 3 4 5 6
a 1 0 1 2 3 4 5
z 2 1 1 2 3 4 5
c 3 2 2 1 2 3 4
e 4 3 3 2 2 2 3
d 5 4 4 3 2 3 3
**/
$table = [];
$col = strlen($from);
$row = strlen($to);
for ($i=0; $i<=$row; $i++) {
    $table[$i][0] = $i;
}
for ($i=0; $i<=$col; $i++) {
    $table[0][$i] = $i;
}

for ($i=0; $i<$row; $i++) {
    for ($j=0; $j<$col; $j++) {
        // Diagonal.
        if ($to[$i] == $from[$j]) {
            $table[$i+1][$j+1] = $table[$i][$j];
        }
        // 1 + min(left, top, diagonal)
        else {
            $num1 = $table[$i+1][$j];
            $num2 = $table[$i][$j];
            $num3 = $table[$i][$j+1];

            if ($num1 < $num2 && $num1 < $num3) {
                $min = $num1;
            }
            elseif ($num2 < $num3) {
                $min = $num2;
            }
            else {
                $min = $num3;
            }
            $table[$i+1][$j+1] = $min + 1;
        }
    }
}
echo "Minimum edit distance from '$from' to '$to'= ". $table[$row][$col] . "\n";


