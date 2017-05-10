<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 5/10/17
 * Time: 3:50 PM
 */

/**
 * The wild cards are * which will match any character 0 or more occurrence
 * and ? which will match one character
 * Input: pattern, string
 * Output: Boolean (True/False)
 */

var_dump(wildcard_match('c*w*ab', 'cauwwab'));

function wildcard_match($pattern, $string) {
  if ($pattern == '' || $string == '') {
    return FALSE;
  }
  $string = str_split($string);
  $pattern = str_split($pattern);

  foreach ($string as $k=>$str) {
    if (empty($pattern)) {
      return FALSE;
    }
    switch (reset($pattern)) {
      case '?':
        array_shift($pattern);
        break;

      case '*':
        // If we only have * then match all.
        if (empty($pattern[1])) {
          return TRUE;
        }
        else {
          // Recursion for all combination
          array_shift($pattern);
          for (; $k<count($string); $k++) {
            if (wildcard_match(implode('', $pattern), implode('', array_slice($string, $k+1)))) {
              return TRUE;
            }
          }
          return FALSE;
        }
        break;
      default:
        if ($str !== $pattern[0]) {
          return FALSE;
        }
        array_shift($pattern);
        break;
    }
  }

  // If pattern left other than * then fail.

  if (empty($pattern)) {
    return TRUE;
  }
  else {
    foreach ($pattern as $p) {
      if ($p != '*') {
        return FALSE;
      }
    }
    return TRUE;
  }
}