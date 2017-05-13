<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 19/02/17
 * Time: 8:12 AM
 */

$str = "aacecaaa";
echo shortest_palindrome($str). "\n";

function shortest_palindrome($str) {
    $total_char = strlen($str);
    $extra_str = '';$extra_str2='';
    if (is_palindrone($str)) {
        return $str;
    }
    for ($i=0; $i<$total_char; $i++) {
        // Put the extra sting in front of the original string.
        $extra_str .= $str[$i];
        $test_str = $str.strrev($extra_str);
        if (is_palindrone($test_str)) {
            return $test_str;
        }
        // Put the extra sting at the end of the original string.
        $extra_str2 .= $str[$total_char-$i-1];
        $test_str = $extra_str2.$str;
        //echo "$test_str \n";
        if (is_palindrone($test_str)) {
            return $test_str;
        }
    }
}

function is_palindrone($str) {
    $total_char = strlen($str);
    for ($i=0, $j=$total_char-1; $i<$j; $i++, $j--) {
        if ($str[$i] != $str[$j]) {
            return FALSE;
        }
    }
    return TRUE;
}