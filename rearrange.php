<?php
/**
 * Created by PhpStorm.
 * User: bappasarkar
 * Date: 20/05/17
 * Time: 2:42 PM
 */


/*
 The number of valid combinations of a strings for given input array a[], where a=>1, z => 26, and 0 <= a[i] <= 9

{1,1,1} => {aaa, ak, ka} => 3
{1,1,0} => {aj} => 1

*/

print_r(rea([1,1,0]));
function rea($a) {
    if ($a == NULL) {
        return [];
    }
    elseif (count($a) == 1 && $a[0] != 0) {
        return $a;
    }
    elseif ($a[0] != 0) {
        $result = [];
        $data = rea(array_slice($a, 1));
        if ($data !== -1) {
            $result = prepare_data($a[0], $data);
        }

        $num = $a[0]*10+$a[1];
        if ($num <= 26) {
            $data = rea(array_slice($a, 2));
            $data = prepare_data($num, $data);
            foreach ($data as $d){
                $result[] = $d;
            }
        }
        if (empty($result)) {
            return -1;
        }
        return $result;
    }
    else {
        return -1;
    }
}

function prepare_data($num, $data) {
    $result = [];
    if (empty($data)) {
        return array($num);
    }
    if ($data === -1) {
        return [];
    }
    foreach ($data as $v) {
        $v = is_array($v) ? $v : array($v);
        $result[] = array_merge(array($num), $v);
    }
    return $result;
}