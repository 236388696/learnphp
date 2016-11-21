<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/1
 * Time: 上午8:40
 */
header("Content-type:text/html;charset=utf8");
$type = $_POST["type"];
mysql_connect("localhost","root","");
mysql_select_db("0811");
mysql_query("set names utf8");
$username = $_POST["username"];
$password = $_POST["password"];
$useremail = $_POST["useremail"];
$userphone = $_POST["userphone"];


switch ($type){
    case "登录":
        $sql = "SELECT * FROM user2 WHERE name='{$username}' AND password = '{$password}' OR  useremail='{$useremail}' AND password = '{$password}'
 OR userphone='{$userphone}' AND password = '{$password}'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0){
            echo "登录成功";
        }else{
            echo "登录失败";
        }
        break;
    case "注册":
        $sql = "INSERT INTO user2 (id,name,password,useremail,userphone) VALUES (NULL,'{$username}','{$password}','{$useremail}','{$userphone}')";
        echo mysql_query($sql).mysql_error();
        if (mysql_insert_id() > 0){
            echo "注册成功";
        }else{
            echo "注册失败";
        }
        break;

}