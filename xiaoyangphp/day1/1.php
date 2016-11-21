<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/8
 * Time: 上午10:42
 */

//显示中文编码格式
header("Content-type:text/html;charset=utf-8");
//php中的注释
/**
 * 1.多行注释: /**+enter
 *
 */
//2.单行注释
#3.也是单行注释

//变量
//命名规范:以$开头,数字字母下划线,数字不能开头
$a = 10;
//$oneDay;
//$one_day;
//PHP也是弱类型语言,声明变量不许要强调变量类型
//整形
$a = 10;
//浮点型
$pai = 3.14;
//bool布尔
$yes = true;
$no = false;
//字符串
$str = "文文,特仑苏好喝吗";

//输出方式
echo $str;
echo $yes;
echo $no;
//输出变量详细信息
//换行
echo"<br>";
var_dump($no);
//变量的变量,可以用变量的内容作为变量名
$a = "hello";
$$a = "world";
$$$a = "nicai";
echo "<br>";
echo $hello;
echo $world;

//超全局变量,全部大写
//所有的全局变量
var_dump($GLOBALS);
//服务器信息
var_dump($_SERVER["SCRIPT_FILENAME"]);

//魔术变量
echo  "<hr>";
//行
echo __LINE__;
//文件路径
echo __FILE__;

echo  "<hr>";
//文件夹路径
echo __DIR__;
//方法
echo __METHOD__;

//$_GET;为由前端通过GET方法传过来的值
//$_POST;

//定义一个常量,常量不能被修改
define("PI",3.14159865358979323846);
echo PI;
//PI = 2;
