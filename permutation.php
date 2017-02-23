<?php
$str = "ABCD";
$str = str_split($str);
$result = permutation($str);

print_R($result);

function permutation($array) {
  // Return the string if it is one character long.
  if (count($array) == 1) {
    return $array;
  }
  $output = [];
  // Foreach character create the permutation.
  foreach ($array as $k => $a) {
    // fix the each value and get permutation of rest of the characters.
    $temp = $array;
    unset($temp[$k]);
    $permutation = permutation($temp);
    // Concat each permutation with the fixed character (placed in first place).
    foreach ($permutation as $p) {
      $output[] = $a . $p;
    }
  }
  return $output;
}
