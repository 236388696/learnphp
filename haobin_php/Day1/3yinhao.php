<?php
    $a ="hello";
    $str = "$a";
    $str2 = '$a';
    echo $str;
    echo "<br>";
    echo $str2;
    //双引号:会认为$a是一个变量,替换变量对象的值
    #单引号:会认为$a是一个字符串,直接使用$a输出
    #js拼接字符串用+,PHP里+只是数值运算,拼接用.
    echo "<br>";
    echo "nihao"."woshi"."diquren";
    echo "<br>";
    echo "nihao{$a}diqiuren";
    //遇见字符串是,先看是不是数字开头,如果不是则不参与计算
    echo "30kg"+20+true+"4T"+"g20";
//    echo "<a href='http://www.baidu.com'>百度</a>";
    #定界符<<<EDT     EDT;
    echo <<<EDT
    <a href="www.baidu.com">百度</a>
EDT;
    #取址符
    echo "<br>";
    $b = 10;
    $c = &$b;
    echo $c;
    $b = 20;
    echo $c;
    //因为在内存中,每个变量都占一块地址,现在$b,$c共用一块地址
    #所以当改变$b的值,也就是改变哪块地址的值,于是$c就变了
?>