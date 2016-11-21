<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/1
 * Time: 下午7:16
 */
header("Content-type:text/html;charset=utf8");
$str=file_get_contents("大连WEB前端开发招聘（求职） WEB前端开发招聘（求职）尽在智联招聘.html");
//正则
preg_match_all("//",$str,$arr);
preg_match_all("/<a.+par=\"ssidkey=y&amp;ss=201&amp;ff=03\".+>(.+)<\/a>/",$str,$arr);

print_r($arr);
echo "<br>";
