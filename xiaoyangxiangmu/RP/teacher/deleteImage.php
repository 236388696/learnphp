<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/26
 * Time: 下午2:39
 */
mysql_connect("localhost","root","");
mysql_select_db("0503");
mysql_query("set names utf8");
$id = $_POST["id"];
$sql = "DELETE FROM image WHERE id={$id}";
$result = mysql_query($sql);
if (mysql_affected_rows()>0){
    echo '{"err":0,"msg":"删除成功"}';
}else{
    echo '{"err":1,"msg":"删除失败"}';
}