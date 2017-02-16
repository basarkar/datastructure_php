<?php

$row = 3; $col = 3;
$matrix = generate_matrix($row, $col);
display_matrix($matrix);
$matrix = rotate_matrix($matrix);
display_matrix($matrix);
function rotate_matrix($matrix) {
  $row = count($matrix);
  $col = count($matrix[0]);
  $matrix2 = [];
  for ($i=0;$i<$row;$i++) {
    for ($j=0;$j<$col;$j++) {
      $matrix2[$j][$row-1-$i] = $matrix[$i][$j];
    }
  }
  return $matrix2;
}

function generate_matrix($row, $col) {
  $matrix = [];
  for ($i=0;$i<$row;$i++) {
    for ($j=0;$j<$col;$j++) {
      $matrix[$i][$j] = rand(0,9);
    }
  }
  return $matrix;
}

function display_matrix($matrix) {
  $row = count($matrix);
  echo "\nMatrix\n";
  for ($j=0;$j<$row;$j++) {
    ksort($matrix[$j]);
    echo implode(', ', $matrix[$j])."\n";
  }
  echo "\n\n";
}
