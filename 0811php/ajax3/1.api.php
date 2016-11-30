<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/4
 * Time: 上午11:01
 */
//接口：1.1.api.php
//method：post
//参数:{type:"submit",content:"asdaas",时间让后台做}
//返回值：{"err":0,"time":"2016-10-1 00:00"}
//type的值：submit是提交一条新的，praise是赞，down踩，remove是删

require_once "listDB_CONNECT.php";

if(isset($_POST["type"])){
    $type=$_POST["type"];
    switch ($type){
        case"submit":
            $content=$_POST["content"];
            //处理时间
            //获取时间戳
            $time=time();
            //不需要查找结果
            $count = $pdo->exec("INSERT INTO weibo(id,content,time,praise,down)VALUE(NULL,'{$content}','{$time}',0,0)");
            $time=date("Y-m-d H:i",$time);
            //最后一个插入的id：pdo的方法
            $id=$pdo->lastInsertId();
            if($count>0){
                //json_encode(array())==json_encode([]);
               echo json_encode(array("err"=>0,"time"=>$time,"id=>$id"));
            }else{
               echo'{"err":1,"msg":"插入失败，请检查sql语句"}';
            }
            break;
        case "praise":

            break;
        case "remove":
            $id=$_POST["id"];
            //根据id删除整行
            $count=$pdo->exec("DELETE FROM weibo WHERE id={$id}");
            if($count>0){
                echo '{"err":0,"msg":"删除成功"}';
            }else{
                echo '{"err":1,"msg":"删除失败"}';
            }
            break;
        default:
            die('{"err":1,"msg":"type参数错误"}');
            break;
    }
}

