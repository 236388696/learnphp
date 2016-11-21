<?php

    $str = "hello, world, myGirl";
    $str2 = "goodBye myBoy";
    #1.strcmp($str,$str2),比较两个字符串ASCII码,当第一个字符串
    #一样时,向下比较第二个....一直到有不一样的
    echo strcmp($str,$str2);

    #2.*****  strlen($str)计算字符串长度
    //字母和标点占1个字节
    //中文占3个字节
    echo "<br>";
    echo strlen($str);

    #3.***  strpos($str,$str2)
    #在$str找到$str2出现的位置,如果找不到返回false
    echo "<br>";
    echo strpos("hello, world","llo");

    #4.***  大写转小写;小写转大写
    echo "<br>";
    echo strtolower("HELLO");
    echo strtoupper("hello");

    #5.str_split("hello,world",2)每两个字符拆分成一个数组元素
    echo "<br>";
    var_dump(str_split("hello,world",2));

    #6.***substr("nihao,hah",3,5)从第三个开始取五个字符
    echo "<br>";
    echo  substr("nihao,hah",3,5);
    #7.str_repeat("abc",10)重复次数
    echo "<br>";
    echo str_repeat("abc",10);
    #8.替换前面字符串
    echo "<br>";
    echo str_replace("abc","b","afc");
    #9.输出HTML标签
    echo "<br>";
    echo htmlspecialchars("<br>");
    #10.去掉字符串两边的空格
    //ltrim
    //rtrim
    echo "<br>";
    echo "/",trim("   abc   ")."/";
?>













