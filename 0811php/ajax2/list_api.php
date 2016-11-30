<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/3
 * Time: 下午3:52
 */

//url:list.php
//method:post
//参数:id(int),type(string),value(string)
//返回值：｛"err":0, "msg":"修改成功"｝

if(isset($_POST["id"])&&isset($_POST["type"])&&isset($_POST["value"])){
    $id=$_POST["id"];
    $type=$_POST["type"];
    $value=$_POST["value"];

    //引入     include_once:如果有错，不会往下走
require_once "listDB_CONNECT.php";
    //返回的是行
    $count=$pdo->exec("UPDATE user SET {$type}='{$value}' WHERE id={$id}");
    if($count>0){
        echo '{"err":0,"msg":"修改成功"}';

    }else{
        echo '{"err":1,"msg":"修改失败"}';
    }

}
