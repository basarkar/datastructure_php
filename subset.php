<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 5/16/17
 * Time: 11:19 AM
 */

/**
 * Given a collection of integers that might contain duplicates, nums, return all possible subsets.

Note: The solution set must not contain duplicate subsets.

For example,
If nums = [1,2,2], a solution is:

[
  [2],
  [1],
  [1,2,2],
  [2,2],
  [1,2],
  []
]
 */

$arr = [1,2,2];
print_all_subset($arr);
function print_all_subset($arr) {
  $str = implode('', $arr);
  $n = count($arr);
  $len = 0;
  while ($len<$n) {
    for ($i=0; $i<$n-$len; $i++) {
      $sub = prepare_subset(substr($str,$i+1), $len);
      foreach ($sub as $s) {
        echo $arr[$i] . $s . "\n";
      }
    }
    $len++;
  }
}

function prepare_subset($str, $len) {
  if ($len <= 0) {
    return [''];
  }
  $arr = str_split($str);
  $n = count($arr);
  $result = [];
  for ($i=0, $j=$len; $j<=$n; $i++, $j++) {
    $result[] = substr($str, $i, $len);
  }
  return $result;
}