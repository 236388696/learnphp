<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/10
 * Time: 上午9:14
 */
header("Content-type:text/html;charset=utf-8");
//所有通过form表单上传的内容都在$_POST数组里
$type = $_POST["type"];
$username = $_POST["username"];
$password = $_POST["password"];

//记录有没有在文件中查找用户
$has = false;

//分别处理登录、注册
if ($type == "登录"){
    $file = fopen("user.txt","r");
    while ($row = fgets($file)){
        //字符串根据一个标记转数组
        $arr = explode(",",$row);
        if ($arr[0] == $username && $arr[1] == $password."\n"){
            echo "登录成功";
            $has = true;
            break;
        }
    }
    if ($has == false){
        echo "登录失败";
    }
    fclose($file);
}else{
    $file = fopen("user.txt","a");
    if (fwrite($file,"{$username},{$password}\n")){
        echo "注册成功";
    }else{
        echo "注册失败";
    }
}