<?php
    $arr= [0,"yhm","男",19];
    $arr2["id"] = $arr[0];
    $arr2["name"] = $arr[1];
    $arr2["sex"] = $arr[2];
    $arr2["age"] = $arr[3];
    //转化成JAON字符串返回给前端
//    echo json_encode($arr2);
    //嵌套的
    $arr3 = ["arr"=>["name"=>"lidongxu"], "arr2"=>["name"=>"王俊"]];
    echo json_encode($arr3);
?>
