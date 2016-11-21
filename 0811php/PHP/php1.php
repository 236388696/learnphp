<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/26
 * Time: 下午4:11
 */
header("Content-type:text/html;charset=utf8");

//变量名开头必须是$，命名规范：数字字母下划线，数字不能开头
$a=0;  #这也是注释

//数据类型
//1. int
$b=10;
echo gettype($b);

//2.float
$spi=3.14159;
echo  gettype($spi);

//3.bool
$yes=true;
echo gettype($yes);

//null空
//4.string
$str="hello 早上好";
echo "<br>";
echo gettype($str);

//在php中，双引号中的变量会被解析，为了安全，变量用{}包起来
echo "晚上好;a{$str}av";

//单引号就和js中的引号作用一样，纯字符串
echo '{$str}';

//php中，用.来字符串拼接
echo "豪哥说"."不管是不是你"."就弄你";

//+只能用来做运算，不能字符串拼接，tru＝1；字符串会从前往后找数字，到第一个非数字字符结束，进行计算
echo $b+"12a";


//5.array
//php中数组有两种：
//1.和js中的数组相同，叫做索引数组
$arr=[1,2,3];
echo "<hr>";
//print_r用来打印数组
print_r($arr);

echo "<br>";
//var_dump打印变量的详细信息
var_dump($arr);

echo "<br>";
//2.和js中的对象类似，以键值对的形式出现，叫做关联数组
$arr1=["name"=>"豪哥","age"=>20,"爱好"=>"刘胜心"];
print_r($arr1);
echo "<br>";
echo  $arr1["name"];
echo "<br>";

for($i=0;$i<count($arr);$i++){
    echo $arr[$i];
}
echo "<br>";


//和js中forin不同的是，前面是放的是要遍历的数组，中间用as分割，后面是数组中的value(js中是key)
foreach($arr1 as $value){
    echo $value;
}
echo "<br>";
//as后面可以放两个变量 $key=>$value
foreach ($arr1 as $key=>$value){
    echo $key."的值是".$value;
}

//资源类型
$file =fopen("../test.html","r");
var_dump($file);

?>
