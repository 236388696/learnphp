<?php
    //1.全局变量
    $quan = 100;//不在任何方法体内声明的变量
    #2.局部变量
    function test(){
        $ju = 500;#在方法体内声明的变量
        #作用域在这个大括号内
    }
    #3.静态变量  static关键字修饰(只执行一次)
    function test2(){
        static $jing = 2;
        $jing++;
        echo $jing;
    }
    test2();
    test2();
    test2();
    #4.在方法体内是不能直接使用全局变量的
    #在全局变量前加global
    $d = 10;
    function test3(){
        global $d;
        echo $d;
    }
    test3();
?>
