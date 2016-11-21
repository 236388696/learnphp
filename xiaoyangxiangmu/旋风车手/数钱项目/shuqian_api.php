<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/22
 * Time: 上午11:45
 */

//提交姓名和电话
//api:shuqian_api.php?type=submit&name=xx&tel=xx&openid=xx;
//返回值:{err:1,,msg:失败原因}

//保存分数
//shuqian_api.php?type=score&openid=xx&score=100
//返回值:{err:1,,msg:"网络错误",rank:10}
$type =$_GET["type"];

switch ($type){
    case "submit":
        $openid = $_GET["openid"];
        $name = $_GET["name"];
        $tel = $_GET["tel"];
        $sql = "UPDATE shuqian SET name='{$name}',tel='{$tel}' WHERE openid='{$openid}'";
        mysql_query($sql);
        if (mysql_affected_rows()>0){
            echo '{"err":0,"msg":"更新成功"}';
        }else{
            echo '{"err":1,"msg":"更新失败,请检查输入的内容"}';
        }

        break;
    case "score":
        $openid= $_GET["openid"];
        $score =$_GET["score"];
        $sql = "UPDATE shuqian SET score={$score} WHERE openid='{$openid}'";
        mysql_query($sql);
        if (mysql_affected_rows()>0){
            //保存分数 下一步查找分数排名
            $sql ="SELECT COUNT (id) FROM shuqian WHERE score>{$score}";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            $rank = $row[0];
            $arr = array("err"=>0,"msg"=>"成功","rank"=>$rank);
            echo json_encode($arr);


        }else{
            echo '{"err":1,"msg":"分数更新失败"}';
        }


        break;
}
