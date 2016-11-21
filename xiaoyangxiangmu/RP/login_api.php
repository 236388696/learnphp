<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/13
 * Time: 下午3:40
 */
session_start();
if (isset($_POST["user"]) && isset($_POST["pass"])){
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    mysql_connect("localhost","root","");
    mysql_select_db("0503");
    mysql_query("set names utf8");
    $sql = "SELECT * FROM user WHERE username='{$user}' AND password='{$pass}'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    if ($row[0] > 0){
        //存在
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;
        header("Location:login.php");
    }else{
        //用户名密码错误
        header("Location:login.php");
//        $sql = "INSERT INTO user (id,username,password,tel) VALUES (NULL ,'{$user}','{$pass}',0)";
    }
}else{
    setcookie(session_name(),session_id(),time()-10000,"/");
    header("Location:login.php");
}
