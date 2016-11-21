<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/8
 * Time: 下午3:39
 */
header("Content-type:text/html;charset=utf-8");
if (1){
    echo "是";
}else{
    echo "否";
}

//switch (){
//   case :
//        break;
//}

//100,每天花一半,计算多少天花完
//1.用for循环实现
//2.用while循环实现
/*
$day = 0;
for ($i = 100; $i > 1; $i=($i / 2)){
    $day++;
}
echo $day;

$day = 0;
$i = 100;
while ($i>1){
    $i = $i/2;
    $day++;
}
echo $day;
*/


//变量作用域
//1.全局变量
$i = 0;
//2.局部变量
function test(){
    //函数内的变量为局部变量
//    $b = 20;
}
//3.静态变量
//初始化一次,之后再这个变量的值一直保留
//static $b = 5;
//function test1(){
//    static $c = 3;
//    $c++;
//    return $c;
//}
//test1();
//test1();
//echo test1();
//函数

echo "<hr>";
function pay($money){
    static $day = 0;
    if ($money < 1){
        return $day;
    }else{
        $day++;
        return pay($money/2);
    };
};
echo  pay(100);

/*
echo "<hr>";
$i = 0;
function test0($a){
    //默认函数内取不到全局变量,需要加global声明
    global $i;
    return $i + $a;
}
*/



function huiWen($str){
    static $i = 0;
    $half = strlen($str)/2;
    if ($str[$i] != $str[$half*2 - 1 - $i]){
        return false;
    }else{
        $i++;
        if ($i < $half){
            return huiWen($str);
        }else{
            return true;
        }
    }
}
//函数名不区分大小写
var_dump(huiWen("abccba"));