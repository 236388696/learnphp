<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/27
 * Time: 上午10:50
 */
header("Content-type:text/html;charset=utf8");
//代码所在的行
echo __LINE__;
echo "<br>";
//代码文件的路径
echo __FILE__;
echo "<br>";
//代码文件所在的文件夹的路径
echo __DIR__;
echo "<br>";
function fn(){
    //当前所在的函数的函数名
    echo  __FUNCTION__;
}
fn();


class Person{

}
//当前所在的类的类名
echo __CLASS__;
echo "<br>";

//系统预置的变量
var_dump($_COOKIE);
echo "<br>";
//通过前段传过来的请求的参数
var_dump($_REQUEST);
echo "<br>";

//通过GET请求传递的参数
var_dump($_GET);
echo "<br>";

//通过POST请求传递的参数
var_dump($_POST);
echo "<br>";

//通过文件上传得到的上传的内容
var_dump($_FILES);
echo "<br>";

//服务器信息
var_dump($_SERVER);

//php信息
var_dump(phpinfo());





