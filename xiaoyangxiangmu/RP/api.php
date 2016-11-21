<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/24
 * Time: 上午8:37
 */
require_once "common.php";
$type = $_POST["type"];
if ($type == "delete"){
        $id = $_POST["dataid"];
        $sql = "DELETE FROM image WHERE id = {$id}";
        $result = mysql_query($sql);
       if (mysql_affected_rows()>0){
            echo '{"err":0,"msg":"删除成功"}';
        }
       else {
           echo '{"err":0,"msg":"删除失败"}';
        }
}