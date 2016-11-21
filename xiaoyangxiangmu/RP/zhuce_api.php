<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/24
 * Time: 下午3:03
 */
header("Content-type:text/html;charset=utf-8");
require_once "common.php";
$username =$_POST["user"];
$password = $_POST["pass"];
$sql = "INSERT INTO user (id,username,password,tel) VALUES (NULL,'{$username}','{$password}','{$tel}')";
$result = mysql_query($sql);
if (mysql_insert_id()>0){
    header("Location:login.php");

}else{
    header("Location:login.php");
}