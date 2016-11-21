<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/11
 * Time: 上午11:22
 */
header("Content-type:text/html;charset=utf-8");
//文件外部引入
//include_once
require_once "initsql.php";

$type = $_POST["type"];
$username =$_POST["username"];
$password = $_POST["password"];

switch ($type){
    case "登录":
        $sql = "SELECT * FROM user WHERE username='{$username}' AND password='{$password}'";
        $result = mysql_query($sql);
        if ($result){
//            $row = mysql_fetch_assoc($result);
//            print_r($row);
//            if ($row["id"]>0){
//                echo "登录成功";
//            }
//
//      //查询结果的个数
          if (mysql_num_rows($result)>0){
              echo "登录成功";
          }  else{
              echo "登录失败";
          }

        }else{
            echo "账号不存在";
        }

        break;
    case "注册":
        $sql = "SELECT * FROM user WHERE username = '{$username}'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0){
            echo "用户已存在";
        }else {
            $tel = $_POST["tel"];

            $sql = "INSERT INTO user (id,username,password,tel) VALUES (NULL,'{$username}','{$password}','{$tel}')";
            mysql_query($sql);

            if (mysql_insert_id() > 0) {
                echo "注册成功";
            } else {
                echo "注册失败";
            }
        }


        break;
}