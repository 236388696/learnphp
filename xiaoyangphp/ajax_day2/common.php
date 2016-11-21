<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/16
 * Time: 上午9:23
 */
date_default_timezone_set("PRC");
$mysql = mysql_connect("localhost","root","");
if (!$mysql){
    echo '{"err":1,"msg":"数据库连接失败"}';
    //程序直接退出
    exit();
}
$db = mysql_select_db("0503");
if (!$db){
    echo '{"err":1,"msg":"0503打开失败"}';
    exit();
}
mysql_query("set names utf8");