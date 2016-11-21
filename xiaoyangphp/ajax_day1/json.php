<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/15
 * Time: 下午4:15
 */
header("Content-type:text/html;charset=utf-8");
//$arr = array("name"=>"wenwen","sex"=>"男");
//把数组转成json字符串
//$str = json_encode($arr);
//echo $str;

//json字符串转对象,如果第二个参数为true转换为关联数组

$str ='{"name":"wenwen","sex":"男"}';
$obj = json_decode($str,true);
var_dump($obj);

