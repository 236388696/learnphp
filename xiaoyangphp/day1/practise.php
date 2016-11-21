<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/9
 * Time: 上午8:25
 */

header("Content-type:text/html;charset=utf-8");


function mao($arr1){
    for ($i = 0; $i < count($arr1); $i++){
        for ($j = 0; $j <count($arr1) - 1 - $i ; $j++){
            if ($arr1[$j] > $arr1[$j + 1]){
                $temp = $arr1[$j];
                $arr1[$j] = $arr1[$j+1];
                $arr1[$j+1] = $temp;

            }
        }
    }
    return $arr1;
}
$arr1 = [12,54,96,1,2,6,2,5];
var_dump(mao($arr1)) ;
