<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/26
 * Time: 上午10:22
 */
session_start();
$user = $_POST["user"];
$pass = $_POST["pass"];
mysql_connect("127.0.0.1","root","");
mysql_select_db("0503");
mysql_query("set names utf8");

$sql = "SELECT * FROM user WHERE username='{$user}' AND password='{$pass}'";
$result  = mysql_query($sql);
if (mysql_num_rows($result)>0){
    $_SESSION["user"]=$user;
    $_SESSION["pass"]=$pass;
    if ($user=="刘小阳"){
        $_SESSION["admin"]="1";
    }
}else{

}
header("Location:index.php");