<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 5/5/17
 * Time: 10:47 AM
 */

/**
 * Suppose a=1, b=2, z=26
 * Now form all the strings from a given input like 31212121
 */
$input = '31212121';

$result = number_to_string($input);
print_R($result);

function number_to_string($input) {
  $input = (array)$input;
  $flag = TRUE;
  $new_input = [];
  while ($flag) {
    $flag = FALSE;
    foreach ($input as $data) {
      // Find the number in the string.
      preg_match('/(\d)+/', $data, $match);
      // If we have number remain in the string
      if (!empty($match[0])) {
        $flag = TRUE;
        $num = $match[0];
        // Get the characters in the string.
        $str = $data;
        $str = str_replace($num, '', $str);

        // Take one digit
        $d1 = $num[0];
        if ($d1 > 0) {
          $c1 = chr($d1 + 96);
          $new_input[] = $str . $c1 . substr($num, 1);
        }
        // If the number string is greater than or equal to 2 digit long.
        if (strlen($num) >= 2) {
          // Take two digit.
          $d2 = $num[0]. $num[1];
          // The 2 digit number should be less than or equal to 'z'
          if ($d2 <= 26) {
            $c2 = chr($d2 + 96);
            $new_input[] = $str . $c2 . substr($num, 2);
          }
        }
      }
      else {
        $new_input[] = $data;
      }
    }
    $input = $new_input;
    unset($new_input);
  }
  return $input;
}