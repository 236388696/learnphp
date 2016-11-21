<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/31
 * Time: 下午5:09
 */
header("Content-type:text/html;charset=utf8");
$type=$_POST["type"];
$username=$_POST["username"];
$password=$_POST["password"];

mysql_connect("localhost","root","");
mysql_selectdb("0811");
mysql_query("set names utf8");
switch ($type){
    case "登录":
        $sql = "SELECT * FROM user2 WHERE name='{$username}' AND password='{$password}'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)>0){
            echo "登录成功";
        }else{
            echo "登录失败";
        }
        break;
    case "注册":
        $sql="INSERT INTO user2(id,name,password) VALUE (NULL ,'{$username}','{$password}')";
        echo $sql;
        mysql_query($sql);
        if(mysql_insert_id()>0){
            echo "注册成功";
        }else{
            echo "注册失败";
        }
        break;
}
//关闭数据库
mysql_close();