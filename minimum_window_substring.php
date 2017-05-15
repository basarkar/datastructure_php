<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 14/05/17
 * Time: 8:04 PM
 */

$str = 'ADOBECODEBANC';
$pattern = 'ABC';
echo "String: $str\n";
echo "Pattern: $pattern\n";
echo "Match: " . min_window($str, $pattern) . "\n";


function min_window($str, $pattern) {
    $hash_pattern = [];
    $hash_str = [];
    $len_str = strlen($str);
    $len_pattern = strlen($pattern);
    if ($len_pattern>$len_str || $len_pattern == 0 || $len_str == 0) {
        return "No such window exists";
    }
    // frequency of character in pattern.
    for ($i = 0; $i<$len_pattern; $i++) {
        if (!isset($hash_pattern[$pattern[$i]])) {
            $hash_pattern[$pattern[$i]] = 1;
        }
        else $hash_pattern[$pattern[$i]]++;
    }
    $count = 0; $start = 0; $min_len = NULL; $start_index=0;
    // Traverse the string.
    for ($i = 0; $i<$len_str; $i++) {
        // count occurrence of characters of string
        if (!isset($hash_str[$str[$i]])) {
            $hash_str[$str[$i]] = 1;
        }
        else {
            $hash_str[$str[$i]]++;
        }

        // If string's char matches with pattern's char
        // then increment count
        if (isset($hash_pattern[$str[$i]]) && $hash_str[$str[$i]]<=$hash_pattern[$str[$i]]) {
            $count++;
        }

        // if all the characters are matched
        if ($count >= $len_pattern) {
            // Try to minimize the window i.e., check if
            // any character is occurring more no. of times
            // than its occurrence  in pattern, if yes
            // then remove it from starting and also remove
            // the useless characters.
            while (!isset($hash_pattern[$str[$start]])
            || $hash_str[$str[$start]] > $hash_pattern[$str[$start]]) {
                if (isset($hash_pattern[$str[$start]])
                    && $hash_str[$str[$start]] > $hash_pattern[$str[$start]]) {
                    $hash_str[$str[$start]]--;
                }
                $start++;
            }

            // Update the window size.
            $length = ($i - $start) +1;
            if ($min_len === NULL || $min_len > $length) {
                $min_len = $length;
                $start_index = $start;
            }
        }
    }

    return ($min_len !== NULL) ? substr($str, $start_index, $min_len) : "No such window exists";
}