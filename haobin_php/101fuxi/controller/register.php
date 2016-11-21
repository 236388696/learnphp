<?php
    require_once "initSQL.php";
    $name = @$_POST["user"];
    $pass = @$_POST["pass"];
    $geren = @$_POST["geren"];
    $token = sha1($name);
    $result = insertSQLQuery("101baidufuxi(id,name,pass,token,intro) VALUES(null,'{$name}','{$pass}','{$token}','{$geren}')");
    if($result){//如果注册成功
        //后台负责解说前端传递来的值,并去数据库拿值返回给前端
        $arr = array("error"=>"0","msg"=>"注册成功","token"=>$token);
        echo  json_encode($arr);
    }else{
        $arr = array("error"=>"1","msg"=>"注册失败");
        echo  json_encode($arr);
    }
?>
