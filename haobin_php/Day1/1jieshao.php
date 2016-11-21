<?php
    echo "你好,欢迎来到PHP";
    //1.PHPs声明方式
    /*
     * (1)<?php   代码?>
     * (2)<?代码?>
     * (3)<%  代码 %>  最不常用的一种
     * */
    //2.注释方式
        //单行注释
        #单行注释
        /*
         多行注释
         多行注释
         */
    //3.变量
        //不能以数字开头
        //由数字、字母、下划线组成
        //驼峰命名法、下划线链接法
        //例:myFriendPlay  my_friend_play
        //变量声明或使用,必须加$
        //PHP也是弱类型语言,不需要指定变量类型
    $a = 100;
    $fNum = 301415926;
    $boo = true;
    $str = "hello word";

    //4.打印方式
    //echo"HTML标签"会在浏览器里,把输出的标签认为是HTML代码执行
    echo $a;//普通打印输出
    echo "<br>";
    var_dump($boo);//输出详细信息,一般打印对象,数组类型的
    echo "<br>";
    print_r($str);//输出详细信息,一般打印对象,数组类型的

    //5.变量作为变量名(了解)
        //一般用于不确定变量名字的时候使用 不常用
    $b = "hello";
    $$b = "world";
    echo "5.";
    echo $hello;

    //6.超全局变量(了解)
        //一般在调试时使用
        //作用:返回一个系统和自己定义的变量的集合数组
    var_dump($GLOBALS);

    //7.服务器变量
    echo "<br>";
    echo "<hr>";
    var_dump($_SERVER);
    echo "<br>";
        //获取服务器变量内某一个key值
    echo $_SERVER[HTTP_USER_AGENT];

    //8.魔术变量
    echo "<br>";
    echo __LINE__;//代码所在行数
    echo "<br>";
    echo __FILE__;//获取文件在服务器上的路径
    function text(){
        echo "<br>";
        echo __FUNCTION__;//获取当前所在方法的名字
        echo "<br>";
        echo __METHOD__;//获取方法名
    }
    text();
    echo "<br>";
    echo __DIR__;//获取当前文件夹名字

    //9.常量
    define("PI",3.1515926);
    //常量 是不能被改变的
    //一般用于别人不希望修改它的值
    echo "<br>";
    echo PI;
?>