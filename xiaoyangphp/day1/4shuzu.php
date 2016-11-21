<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/8
 * Time: 下午5:34
 */
header("Content-type:text/html;charset=utf-8");
//php中数组有两种,一种叫索引数组,和js的数组下标类似,通过下标取值
//另一种叫关联数组,类似于js中的对象,已键 =>值的形式
$arr1 = [1,2,3,4];
//var_dump();
//专门打印数组的
print_r($arr1);
//count(),获取数组长度
for ($i = 0; $i < count($arr1); $i++){
    echo "<br>";
    echo $arr1[$i];
}
//不写下标,默认向后追加
$arr1[] = 20;
print_r($arr1);

echo "<br>";
//如果下标位置有值,为修改,如果没有,添加新值。
$arr1[1] = 10;
print_r($arr1);

echo "<br>";
//删除数组中的元素,不会改变后面元素的下标
//unset表示删除变量的值
unset($arr1[1]);
print_r($arr1);

//2.关联数组
$arr2 = array("name"=>"呵呵哒","年龄"=>"20","爱好"=>"啊啊啊");
print_r($arr2);
//添加
$arr2["sex"] = "男";
echo "<br>";
print_r($arr2);

//遍历 for
//foreach两种形式
foreach ($arr2 as $value){
    echo "<br>";
    echo $value;
}
echo "<hr>";
foreach ($arr2 as $key => $value){
    echo "<br>";
    echo $key.":".$value;
}

//去重
print_r(array_unique([1,5,2,4,1,"a","d","a"]));
echo "<hr>";

$arr3 = [1,2,3];
$arr4 = [4,5,6];
//数组合并
print_r(array_merge($arr3,$arr4));
echo "<hr>";

array_push($arr3,9);
print_r($arr3);

//function push(&$arr,$a){
//    $arr[] = $a;
//}

//删除最后一个
array_pop($arr3);
print_r($arr3);
echo "<hr>";

//删除第一个
array_shift($arr3);
print_r($arr3);

//从头部添加
array_unshift($arr3,5);
print_r($arr3);
echo "<hr>";

//map所接收的参数 是函数 对函数中的每一个元素进行操作
$arr5 = array_map(function ($i){
    return trim($i);
},$arr3);
print_r($arr5);
echo "<hr>";

$arr6 = array("name"=>"wenwen","sex"=>"nan");
$arr7 = array("name"=>"dahuang","hobby"=>"nan");
//如果两个数组存在key相同的元素,用第二个数组中的值替换第一个数组中的值,其余的元素追加
//到数组里,返回一个新数组。
print_r(array_replace($arr6,$arr7));

//数组转字符串
//第一个参数之间用什么连接
//第二个参数为数组
echo implode("|",$arr3);
echo "<hr>";

$str = "ab,cd,ef";
//字符串转数组
//第一个参数为根据什么将字符串更改
//第二个参数为字符串
print_r(explode("b",$str));
echo "<hr>";

//反向,倒叙
print_r(array_reverse($arr3));

//求和
echo array_sum($arr3);



//strpos查找字符串
$str = 'What is your name?';
$cha = strpos($str,'name');
echo $cha;


//addslashes转义字符
$str = "what's your name?";
echo addslashes($str);//输出：what\'s your name?




