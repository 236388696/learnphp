<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/15
 * Time: 上午10:14
 */

$user = $_GET["user"];
$pass = $_GET["pass"];

if ($user == "wenwen" && $pass == "123"){
    echo "登录成功";
}else{
    echo "登录失败";
}











