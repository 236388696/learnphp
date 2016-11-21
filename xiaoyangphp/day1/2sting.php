<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/8
 * Time: 上午11:46
 */
header("Content-type:text/html;charset=utf-8");

$a = 50;
//在php中双引号中的变量可以被解析,单引号内不能解析
//双引号中要加大括号
$str = "哈哈哈{$a}傻";
$str2 = '$a这是一个新字符串';
echo $str;
echo  "<hr>";
echo  $str2;
echo  "<hr>";


//定界符
$str3 = <<<EOF
今天天气不错,
呵呵哒
EOF;
echo $str3;

//字符串拼接
echo "大水杯"."大书包";

echo  "<br>";
//php中的加号只能做运算,不能拼接,计算时如果有字符串,从前向后找数字
echo "20" + 20 + true + "12a";

//&取址符,表示变量b与变量a共用同一个地址,相当于一个地址,相当于别名
//所以修改任意一个变量的值,另一个也会相应改变
$a = "里约";
$b = &$a;
echo  $b;
$b = "北京";
echo $a;

echo "<hr>";
//字符串比较
echo strcmp("c","a");
//
echo "<hr>";
//字符串长度
echo strlen($b);
echo strlen("a");

echo "<hr>";
//字符在字符串中的位置
echo strpos("helloworld","o");
//如果字符串总不存在,返回false
echo "<hr>";
var_dump(strpos("helloworld","a"));
echo "<hr>";
//小写
echo strtolower("HELLO");

echo strtoupper("hello");

echo "<hr>";
//字符串分割为数组,第二个参数为每几个字符为一组
var_dump(str_split("helloworld",3));

echo "<hr>";
//字符串截取,三个参数:
//1.要截取的字符串
//2.开始位置
//3.截取个数,默认到结尾
echo substr("helloworld",3,2);

echo "<hr>";
//重复多少个字符
echo str_repeat("a",20);


echo "<hr>";
//字符串替换,三个参数
//1.要被替换的字符串
//2.替换为这个字符串
//3.string 原串
echo str_replace("o","a","helloworld");
//忽略大小写
echo str_ireplace("O","b","helloworld");

echo "<hr>";
//输出完整的html标签
echo  htmlspecialchars("<hr>");

//取出字符串中左右空格
echo "/".trim("   ddxxcd   ")."/";
//去掉左空格
echo "/".ltrim("   ddxxcd   ")."/";
//去掉右空格
echo "/".rtrim("   ddxxcd   ")."/";







