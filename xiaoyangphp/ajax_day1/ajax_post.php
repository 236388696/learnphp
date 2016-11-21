<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/15
 * Time: 上午10:56
 */


$user = $_POST["user"];
$pass = $_POST["pass"];
$type = $_POST["type"];

//echo "你的用户名是{$user}";

$mysql = mysql_connect("localhost","root","");
$db = mysql_select_db("0503");
mysql_query("set names utf8");

if ($type == "login"){
    $sql = "SELECT * FROM yonghu WHERE user='{$user}' AND pass='{$pass}'";
    $result =mysql_query($sql);

    if (mysql_num_rows($result) > 0){
        echo '{"error":0,"message":"登录成功"}';
    }else{
        echo '{"error":1,"message":"数据库中未找到"}';

    }
}
else if ($type =="reg"){
    $sql = "SELECT COUNT(id) FROM yonghu WHERE user='{$user}'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    if ($row[0]>0){
//        echo "用户名已存在";
        echo  '{"error":1,"message":"用户名存在"}';
    }else{
        $sql= "INSERT INTO yonghu (id,user,pass) VALUES (NULL ,'{$user}','{$pass}')";
        mysql_query($sql);
       if (mysql_insert_id()>0){
//           echo "注册成功";
           echo '{"error":0,"message":"注册成功"}';
       } else{
//           echo "注册失败";
           echo '{"error":1,"message":"注册失败"}';
       }
    }
}




