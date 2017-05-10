<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 5/10/17
 * Time: 10:46 AM
 */

print_r(show_all_words('dfghdfh'));

/**
 * Send nearest Words.
 * E.g. dc => cb, cc, cd, db, dc, dd, eb, ec, ed
 */
function show_all_words($str) {
  $str = str_split($str);
  $words = [''];
  foreach ($str as $val) {
    $near_by_letters = near_by_letter($val);
    $new_words = [];
    foreach ($words as $word) {
      foreach ($near_by_letters as $near_by_letter) {
        $new_words[] = $word.$near_by_letter;
      }
    }
    $words = $new_words;
  }
  return $words;
}

/**
 * Send nearest letter.
 * E.g. b => a, b, c
 */

function near_by_letter($val) {
  $n = ord($val);
  return array(chr($n-1), chr($n), chr($n+1));
}