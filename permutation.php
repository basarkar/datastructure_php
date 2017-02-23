<?php
$str = "abcdefg";
$str = str_split($str);
permutation($str, count($str));

function permutation($array, $c) {
  $n = count($array);
  if ($n == 1) {
    return $array;
  }

  $out = [];
  foreach ($array as $k=>$a) {
    $temp = $array;
    unset($temp[$k]);
    $per = permutation($temp, $c);
    if (strlen($a.reset($per)) == $c) {
      foreach ($per as $p) {
        echo $a . $p . "\n";
      }
    }
    else {
      foreach ($per as $p) {
        $out[]=$a.$p;
      }
    }
  }
  return $out;
}
