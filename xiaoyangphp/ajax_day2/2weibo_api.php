<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/16
 * Time: 上午11:06
 */

//api:2weibo_api.php?type=xx&content=xx&id=xx
//请求方式:get
//参数:  type,类型(add,ding,cai)
//      content,添加数据的具体内容
//      id,顶或踩所在行的id
//返回值:{"err":0,"msg":"失败原因","time":14xxx}

require_once "common.php";
$type = $_GET["type"];

switch ($type){
    //添加内容
    case "add":
      $content = $_GET["content"];
      $time = time();

      $sql = "INSERT INTO xinlang (id,content,time,up,down) VALUES (NULL,'{$content}','{$time}',0,0)";
      $result = mysql_query($sql);
      if (mysql_insert_id()>0){
          $arr = array("id"=>mysql_insert_id(),"err"=>0,"msg"=>"成功","time"=>$time);
          //变成字符串输出去
          echo json_encode($arr);
      }
         break;
    case "up":
        $id = $_GET["id"];
        $sql = "SELECT * FROM xinlang WHERE  id={$id}";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $upCount = $row["up"];
        $upCount++;
        $sql = "UPDATE xinlang SET up = {$upCount} WHERE id ={$id}";
        mysql_query($sql);
        if (mysql_affected_rows() >0 ){
            $arr = ["err"=>0,"msg"=>"更新成功", "upCount"=> $upCount];
//            $arr = array("err"=>0,"msg"=>"更新成功", "upCount"=> $upCount);
            echo json_encode($arr);
        }else{
            echo '{"err":1,"msg":"更新失败"}';
        }

        break;
    case "down":
        $id = $_GET["id"];
        $sql = "SELECT * FROM xinlang WHERE  id={$id}";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        $downCount = $row["down"];
        $downCount++;
        $sql = "UPDATE xinlang SET down = {$downCount} WHERE id ={$id}";
        mysql_query($sql);
        if (mysql_affected_rows() >0 ){
            $arr = ["err"=>0,"msg"=>"更新成功", "downCount"=> $downCount];
            echo json_encode($arr);
        }else{
            echo '{"err":1,"msg":"更新失败"}';
        }
        break;
    case "delete":
        $id = $_GET["id"];
        $lastId = $_GET["lastId"];
        $sql = "DELETE FROM xinlang WHERE id= {$id}";
        mysql_query($sql);
        if (mysql_affected_rows()>0){
            $sql = "SELECT * FROM xinlang WHERE id<{$lastId}  ORDER BY id DESC LIMIT 1";
            $result = mysql_query($sql);
            $row = mysql_fetch_assoc($result);
            $arr =array("err"=>0,"msg"=>"删除成功","result"=>$row);
            echo json_encode($arr);
        }else{
            echo '{"err":1,"msg":"删除失败"}';
        }
        break;
    case "page":
        $page = $_GET["page"];
        $start = $page * 5;
        $sql = "SELECT * FROM xinlang  ORDER BY id DESC LIMIT {$start}, 5";
        $result = mysql_query($sql);
        $arr = array("err"=>0,"msg"=>"成功","result"=>[]);
        while ($row = mysql_fetch_assoc($result)){
            array_push($arr["result"],$row);
        }
        echo json_encode($arr);

        break;


}