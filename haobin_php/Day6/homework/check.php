<?php
    $yanCode = $_POST["yan"];
    session_start();
    $sessionCode = $_SESSION["code"];
    if(strtoupper($yanCode)==strtoupper($sessionCode)){
        echo "验证成功";
    }else{
        echo "验证失败";
    }
?>
