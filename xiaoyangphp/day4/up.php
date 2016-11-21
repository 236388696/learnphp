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
//$has = false;

//分别处理登录、注册
if ($type == "注册"){
    $mysql =  mysql_connect("localhost","root","");
    if ($mysql){
        $db = mysql_select_db("0503");
       if ($db){
            mysql_query("set names utf8");
           if ($sql = "SELECT * FROM user WHERE username = {$username}" ){
              echo "注册失败";
           }else{
               $sql = "INSERT INTO user (id,username,password,tel) VALUES (NULL,'$username','$password ','789789')";
               mysql_query($sql);

           }
       }


    }


}else{

}