<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/31
 * Time: 下午4:12
 */
header("Content-type:text/html;charset=utf8");

$mysql=mysql_connect("localhost","root","");
if($mysql){
    echo "数据库连接成功";
}else{
    die("连接失败");
}
//2.选择使用哪一个库
$db=mysql_select_db("0811");
if($db){
    echo "连接0811成功";
}else{
    die("失败");
}
mysql_query("set names utf8");