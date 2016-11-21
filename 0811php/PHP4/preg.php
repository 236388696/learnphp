<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/1
 * Time: 下午4:42
 */
preg_match("/\d+/","DLH160811abc123",$arr);
//match_all就是js中的g,全局查找
//（）子字符串
//preg_match_all("/0(8)11/","DLH160811abc123",$arr);
//print_r($arr);

//.匹配除了\n以外的任意内容
//通过()可以获取一个子表达式，并且这个子表达式可以被向后引用，通过\1,\2获取子表达式，在php中是\\1;
//preg_match_all("/['|\"].+/","abc'正则'pa12345\"李维\"",$arr);
//preg_match_all("/(['|\"]).+\\1/","abc'正则'pa12345\"李维\"",$arr);
//print_r($arr);



//{1，2}匹配一次到2次
//*0次－多次
//.：除了\n以外


//正向肯定预查(?==xx),表示如果后面的内容是xx的话，就匹配到，并且匹配的结果不包含xx
//反向肯定预查(?<=xx),表示如果前面是xx的话，匹配并且不包含x，js不支持反向预查
$str="DLH160811DLA160921DLS1600000";
preg_match_all("/(?<=DL)\w(?=\d+)/",$tr,$arr);
print_r($arr);
