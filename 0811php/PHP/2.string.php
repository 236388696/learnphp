<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/27
 * Time: 上午9:32
 */


header("Content-type:text/html;charset=utf8");
//定界符
$str=<<<EOF
大耳朵tutu，早上好
早饭吃了吗？
EOF;

echo  $str;

//获取字符串长度
echo strlen($str);
echo "<br>";

//字符串比较。后面减前面的
echo strcmp("b","a");
echo "<br>";


//第一个参数：要重复的内容；第二个参数：重复的次数
echo str_repeat("_",20);
echo "<br>";


//替换：第一个参数：要替换的字符串的内容  第二个参数：替换之后的内容  第三个参数：从哪个字符串中分替换
echo  str_replace("_","世界","sdffgfhhjk");
echo "<br>";

//忽略大小写替换
echo str_ireplace("B","早上好","abc");
echo "<br>";

//删除前后空格
echo "/".trim(" ab   c ")."/";
echo "<br>";

//第二个参数是一个隐藏参数，默认是空格，内容是要删除首、尾的内容，只删除首位，不参数中间的内容
echo trim("该，吃饭,耳，朵图图","该吃饭啦");
echo "<br>";
//l/r删除左／右的空格
echo "/".ltrim("    abc")."/";
echo "/".rtrim("    rghh      ")."/";
echo "<br>";

//把字符串根据某个字符分割成数组
print_r(explode("_","a_b_c_d"));
echo "<br>";


//把数组转换成字符串
echo implode([1,2,3,4]);
//把数组转换成字符串，第一个参数为转换时元素之间拼接的内容，可以不写，默认为空
echo implode("=",[1,2,3,4]);
echo "<br>";

//完整输出html标签，不被浏览器解析
echo htmlspecialchars("<br>");
echo "<br>";

//判断一个变量是否有值
var_dump(isset($str)) ;

//删除变量
$a=20;
unset($a);
echo $a;

//把变量里的内容拿出来当名字用，变量的变量
$a="hello";
$$a="world";
$$$a="世界";
echo $world;

//&相当于给$c变量加了一个别名，操作的是同一个变量的内容
$c=20;
$d=&$c;//给c起个别名叫b；
$d=50;
echo $c;
echo "<br>";


$arr=[1,2,3,];
$arr=array(1,2,3);
$arr=array("name"=>"tututu","age"=>30);
array_push($arr,"爱好");
$arr["爱好"]="破冰";
print_r($arr);



