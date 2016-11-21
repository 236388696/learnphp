<?php
    //注意,最好是关联数组
    $arr = ["name"=>"li","age"=>18];
    //把数组转换成JSON字符串
    $jsonStr = json_encode($arr);
    echo $jsonStr;
    //如何定义一个JSON字符串
    $myJSONStr = '{"name":"霍明辉","hobby":"女","age":65}';
    $arr2 = json_decode($myJSONStr);
    echo "<br>";
    print_r($arr2);
?>
