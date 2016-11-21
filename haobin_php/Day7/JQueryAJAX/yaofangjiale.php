<?php
    $name = $_POST["name"];
    $age = $_POST["age"];
    if($name=="陈福海"){
        $arr = ["error"=>"0","msg"=>"他要放假了"."{$age}"];
    }else{
        $arr = ["erroe"=>"250","msg"=>"你不是陈福海还想放假"];
    }
    echo json_encode($arr);
    //一定要保证后台和前端交互的文本格式是JSON
?>
