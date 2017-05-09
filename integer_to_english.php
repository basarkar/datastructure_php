<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 5/9/17
 * Time: 12:17 PM
 */

$number = 234234;

echo $number . ' = ' . integer_to_english($number) . "\n";

function integer_to_english($number) {
  $number_str = (string)$number;
  $english = array(
    0 => 'Zero',
    1 => 'One',
    2 => 'Two',
    3 => 'Three',
    4 => 'Four',
    5 => 'Five',
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten',
    11 => 'Eleven',
    12 => 'Twelve',
    13 => 'Thirteen',
    14 => 'Fourteen',
    15 => 'Fifteen',
    16 => 'Sixteen',
    17 => 'Seventeen',
    18 => 'Eighteen',
    19 => 'Nineteen',
    20 => 'Twenty',
    30 => 'Thirty',
    40 => 'Forty',
    50 => 'Fifty',
    60 => 'Sixty',
    70 => 'Seventy',
    80 => 'Eighty',
    90 => 'Ninety',
  );

  $str = '';

  // Billion
  if (strlen($number_str) >= 10) {
    $num2 = substr($number_str, 0, strlen($number_str) - 9);
    $str .= integer_to_english($num2) . ' Billion ' . integer_to_english(substr($number_str, -9));
  }
  elseif (strlen($number_str) >= 7) {
    $num2 = substr($number_str, 0, strlen($number_str) - 6);
    $str .= integer_to_english($num2) . ' Million ' . integer_to_english(substr($number_str, -6));
  }
  elseif (strlen($number_str) >= 4) {
    $num2 = substr($number_str, 0, strlen($number_str) - 3);
    $str .= integer_to_english($num2) . ' Thousand ' . integer_to_english(substr($number_str, -3));
  }
  elseif (strlen($number_str) >= 3) {
    $num2 = substr($number_str, 0, strlen($number_str) - 2);
    $str .= integer_to_english($num2) . ' Hundred ' . integer_to_english(substr($number_str, -2));
  }
  elseif (strlen($number_str) >= 1) {
    if ($number_str > 20) {
      $num2 = substr($number_str, 0, strlen($number_str) - 1);
      $str .=  $english[$num2*10] . ' ' . integer_to_english(substr($number_str, -1));
    }
    else {
      $str .= $english[$number_str];
    }
  }
  return $str;
}