<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/10
 * Time: 下午3:35
 */
header("Content-type:text/html;charset=utf-8");
/*
$str ="dds4524fs2";
//三个参数
//1.正则表达式
//2.要匹配的字符串
//3.结果返回的数组
preg_match("/\d/",$str,$arr);
print_r($arr);

//all相当于js中的//g,全局
preg_match_all("/\d/",$str,$arr1);
print_r($arr1);

echo "<hr>";
//替换,三个参数:
//1.正则表达式
//2.要替换的内容
//3.要匹配的字符串
//返回新的结果
$arr2 = preg_replace("/\d/","哈",$str);
print_r($arr2);
echo "<hr>";

$arr3 = ["12354","dsdsfa","今天天气不错",",/."];
//从数组里筛选符合条件的元素返回新数组
$arr4 =preg_grep("/\d/",$arr3);
print_r($arr4);
*/

$content = file_get_contents("zcool.html");
preg_match_all("/<a.+index_main_title.+>(.+)<\/a>/",$content,$arr5);
//echo $content;
print_r($arr5);