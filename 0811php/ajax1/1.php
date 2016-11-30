<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/2
 * Time: 上午10:31
 */

//写个保护
if(isset($_GET["username"])&&isset($_GET["password"])){
    $username=$_GET["username"];
    $password=$_GET["password"];
    if($username=="大耳朵图图"&&$password=="123"){
        echo "成功";
    }else{
        echo "失败";
    }
}
if(isset($_POST["username"])&&isset($_POST["password"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
    if($username=="大耳朵图图"&&$password=="123"){
        echo 1;
    }else{
        echo 0;
    }
}

//重定向
//header("Location:ajax3.html");