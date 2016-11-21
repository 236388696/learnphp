<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/27
 * Time: 上午11:14
 */

function max3($a,$b,$c){
    return $a>$b?($a>$c?$a:$c):($b>$c?$b:$c);
}
echo max(50,70,2);


//全局变量
$a=50;
function xx(){
    //在php中，全局变量在函数中不能直接使用，使用的话，需要在函数内部用global声明
    global $a;
    echo $a;
}
xx();


//匿名函数
$a=function (){

};
$a();
echo "<br>";
//函数作为参数
$nArr=array_map(function ($value){
    return $value+10;
},[1,2,3]);
print_r($nArr);

echo "<br>";


//求一个数的阶乘
function cheng($num){
    if($num==1){
        return 1;
    }else{
        return $num*cheng($num-1);
    }
}
cheng(120);


static $x=20;
$x+=10;
echo "<br>";



function test(){
    //静态变量，只初始一次，接下来会在原来的基础上修改
    static $a=10;
    return ++$a;
}
echo test();
echo test();
echo test();
echo "<br>";


//默认参数，声明时给参数赋值，调用时不传参则为默认值，传参使用传入的值
function add($a,$b=10){
    return $a+$b;
}
echo add(5,3);

