<?php
    $gueNum = @$_POST["gNum"];
    //随机数
    session_start();
    function creatRand(){
        $num = rand(0,100);
        $_SESSION["theNum"] = $num;
        $arr = ["error"=>0,"result"=>"$num"];
    }
    if($_SESSION["theNum"]==null){
        creatRand();
    }
    //返回
    if($_SESSION["theNum"]>$gueNum){
        $arr["result"] = "小了";
    }else if($_SESSION["theNum"]<$gueNum){
        $arr["result"] = "大了";
    }else{
        $arr["result"] = "对了";
//        session_destroy();//清除字段里所有的字段和值
        unset($_SESSION["theNum"]);//清除对应字段里的值,字段还存在
        creatRand();
    }
    echo json_encode($arr);
?>
