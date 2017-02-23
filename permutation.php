<?php
$str = "abc";
$str = str_split($str);
$result = permutation($str);

print_R($result);

function permutation($array) {
  if (count($array) == 1) {
    return $array;
  }
  $out = [];
  foreach ($array as $k => $a) {
    $temp = $array;
    unset($temp[$k]);
    $permutation = permutation($temp);
    foreach ($permutation as $p) {
      $out[] = $a . $p;
    }
  }
  return $out;
}
