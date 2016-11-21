<?php
    session_start();
    $yz = $_GET["yanzheng"];
    $type = $_GET["type"];
    echo $_SESSION["str1"];
    if($type=="登录"){
        if($yz==$_SESSION["str1"]){
            echo "验证成功";
        }else{
            echo "验证失败";
        }
    }else{
        echo "未知错误";
    }
?>
