<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/12
 * Time: 下午2:38
 */

//开启session
session_start();
//要在session中保存内容直接赋值
$_SESSION["name"] = "wenwen";
//从session中取值
echo $_SESSION["name"];
//print_r($_SESSION);
//删除session中的内容
//unset($_SESSION["name"]);

//删除所有
//session_destroy();







