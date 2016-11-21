<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/12
 * Time: 下午5:46
 */
header("Content-type:text/html;charset=utf-8");

session_start();

$_code = $_POST["code"];
if (strtoupper($_code) == strtoupper($_SESSION["code"])){
    echo "验证成功";
}else{
    echo "验证失败";
}