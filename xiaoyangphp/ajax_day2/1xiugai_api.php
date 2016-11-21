<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/16
 * Time: 上午9:15
 */
//api:1xiugai_api.php?type=xx&value=xx
//参数:type表示要修改的字段名
//value,修改后的值
//id,被修改行的id
//返回值:{"err":0,"msg":"修改成功"}

//require_once "common.php";
$mysql = mysql_connect("localhost","root","");
if (!$mysql){
    echo '{"err":1,"msg":"数据库连接失败"}';
    //程序直接退出
    exit();
}
$db = mysql_select_db("0503");
if (!$db){
    echo '{"err":1,"msg":"0503打开失败"}';
    exit();
}
mysql_query("set names utf8");

//要修改的字段名
$type = $_GET["type"];
$value = $_GET["value"];
$id = $_GET["id"];

$sql = "UPDATE yonghu SET {$type}='{$value}' WHERE id={$id}";
mysql_query($sql);
if (mysql_affected_rows()>0){
    echo '{"err":0,"msg":"修改成功"}';
}else{
    echo '{"err":1,"msg":"修改失败"}';
}



