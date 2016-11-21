<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/8
 * Time: 下午6:50
 */
header("Content-type:text/html;charset=utf-8");
/**
 * 1.php标记
 *   1.1<?php   ?>
 *   1.2<?      ?>
 *   1.3<script language="php"></script>
 *   1.4<%      %>
 *
 * 2.定义一个自定义变量,和变量命名规则
 *    2.1变量:命名规范:以$开头,数字字母下划线,数字不能开头
 *
 * 3.如何定义一个自定义常量
 *    3.1常量:指在程序中无法修改的值。在脚本执行期间该值不能改变
 *            常量对大小写敏感,通常常量名总是大写 例:define("PI",3.141855)
 *
 * 4.定界符定义一个字符串,使用定界符要注意哪些?
 *     4.1 $str3 = <<<EOF
             今天天气不错,
             呵呵哒
           EOF;
 *        注意:结束标识符所在的行不能包含任何其他字符,这意味着该标识符不能被缩进,只在分号之前
 *              之后都不能有任何空格或制表符。
 *
 * 5.
 *
 * 6.
 *
 * 7. 91
 *
 * 8. + - * / % . = ++ --
 */
// 9.
    for ($i = 0; $i < 5; $i++){
        for ($j = 0; $j <2*$i+1 ; $j++){
            echo "*";
        }echo "<br>";
    }
//10.
/*  10.1
    for ($i = 1; $i<14 ; $i++){
        if ($i<10 && $i>4 && $i%3 ==0){

        }else{
            echo "$i,";
        }
    }
*/
/* 10.2
    $i = 1;
     while ($i<14){
         if ($i<10 && $i>4 && $i%3 ==0){

         }else{
             echo "$i,";
         }
         $i++;
     }
*/
/*
$i = 1;
do{
    if ($i<10 && $i>4 && $i%3 ==0){

    }else{
        echo "$i,";
    }
    $i++;
} while ($i<14);
*/

//11.
/*
  $a = 10;
    $b = &$a;
    echo $b; // 10
    $b = 15;
    echo  $a; //15
*/

//12.
$_SERVER['HTTP_REFERER'];//可以得到链接,提交当前页的父页面的url
$_SERVER['REMOTE_ADDR'];//客户端IP地址
$_SERVER['REQUEST_URI'];//url的路径部分
$_SERVER['HTTP_USER_AGENT']; //操作系统和浏览器的有关信息

//13.
$val_1 = "hello";
$$val_1 = "world";
echo $hello;  //world
echo $val_1;  //hello
echo ${$val_1}; //world

//14.
$i=10;
$i++;
echo $i; //11
$y = $i++;
echo $y;  //11
$y = ++$i;
echo $y;  //13
$y += 10;
echo $y; //23
echo "<hr>";

//15.
$a = "123";
$a .= 456;
echo $a;//123456
echo "<hr>";

//16.
$a = 3;
$b = 4;
$c = 5;
echo $a > $b && $c>$b || $a<$c; //1
echo "<hr>";

//17.
$a = 3; $b = 4; $c = 5;
echo $a>$b ? $a : $c; //5
echo "<hr>";

//18.
$x = 1;
++$x;
$y = $x++;
echo $y;//2
echo "<hr>";

//19.
function abc($a,$b=10,$c=10) {
    return $a+$b+$c; }
echo abc(10,30); //50
echo "<hr>";

//20.
function a(&$a) {
    $a *= 10; }
$b = 10;
a($b);
echo $b;//100
echo "<hr>";

//21.
$n = 1000;
$y = 1;
for($i=1;$i<$n;$i+=5) {
    $y += $i;
}
echo $y;

function digui($i){
    static $y =1;
    if ($i > 1000){
        return $y;
    }else{
        $y = $i+$y;
        $i+=5;
        return digui($i);
    }
}
print_r(digui(1));
echo "<hr>";

//22.
function keep_val(){
    static $count = 0;
    $count++;
    echo $count;
}
echo keep_val();//1
echo keep_val(); //2
echo keep_val();//3
echo "<hr>";

//23.
$str1 = null;
$str2 = false;
echo $str1==$str2 ? '相等' : '不相等'; //相等
$str3 = '';
$str4 = 0;
echo $str3==$str4 ? '相等' : '不相等'; //相等
$str5 = 0;
$str6 = '0';
echo $str5===$str6 ? '相等' : '不相等'; //不相等


//24.
$count = 5;
function get_count(){
    static $count = 0;
    return $count++;
}
echo $count; //5
++$count;
echo get_count(); //0
echo get_count(); //1
echo "<hr>";

//25.
$GLOBALS['var1'] = 5;
$var2 = 1;
function get_value(){
    global $var2;
    $var1 = 0;
    return $var2++;
}
get_value(); //1
echo $var1; //5
echo $var2; //2
echo "<hr>";

//26.
$num = 6 + false + null + "24linux";
echo $num;//30
echo "<hr>";

//27.

//28.
for ($i = 0; $i < 100; $i++){
    if( $i%2 !=0){
        echo "$i,";
    }
}
echo "<hr>";


$i = 1;
while ($i < 100){
    if( $i%2 !=0){
        echo "$i,";
    }
    $i++;
}
echo "<hr>";

$i = 1;
do{
    if( $i%2 !=0){
        echo "$i,";
    }
    $i++;
}while($i < 100);
echo "<hr>";

//29.
function b($num1,$num2,$num3){
    $a =0;
    $a = $num1 > $num2 ? $num1 : $num2;
    $a = $a > $num3 ? $a : $num3;
    return $a;
}
echo b(2,12,7);
echo "<hr>";

//30.
function cheng($i){
    if ($i == 1){
        return 1;
    }else{
        return $i * cheng($i -1);
    }
}
echo cheng(-5);



