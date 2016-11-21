<?php
    #PHP数组分为两种:
    #关联数组:全部由key=>value组成
    #索引数组:全部由下角标进行索引
    #关联数组
    $arr = ["li"=>2,"he"=>true];
    var_dump($arr);

    $arr["he"] = "他";//如果有he这个key则修改,没有则添加
    echo "<br>";
    var_dump($arr);
    echo "<br>";
    $arr["name"] = "吴昊";
    var_dump($arr);
    //遍历
    echo "<hr>";
    foreach ($arr as $value){//拿出关联数组里每个value值
        echo $value;
    }
    echo "<hr>";
    foreach ($arr as $key=>$value){//拿出没对key,value值
        echo "<br>";
        echo "[key]:".$key."[value]:".$value;
    }
    //练习
    echo "<br>";
    $arr1 = ["a"=>1,"b"=>2];
    foreach ($arr1 as $value){
        echo $value;
        echo "<br>";
    }
    foreach ($arr1 as $key=>$value){
        echo "[key]:".$key."[value]:".$value;
        echo "<br>";
    }
?>
