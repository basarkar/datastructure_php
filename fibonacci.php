<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 19/02/17
 * Time: 7:42 PM
 */

$n = 12;
$fib = [];
$x = 0; $y = 1;
for ($i=0; $i<$n; $i++) {
    $fib[] = $y;
    $temp = $y;
    $y += $x;
    $x = $temp;
}
echo "Fibonacci number till position $n is: " . implode(', ', $fib) . "\n";