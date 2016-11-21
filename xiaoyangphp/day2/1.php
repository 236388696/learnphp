<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/9
 * Time: 下午2:24
 */

header("Content-type:text/html;charset=utf-8");
//打开文件
//r只能读取文件
//w可以写入文件内容,会覆盖原来的内容,如果文件不存在会创建
//a,在原来内容的基础上追加内容,如果文件不存在会创建


$file = fopen("1.txt","r");
//获取文件内容
//1.文件
//2.要获取的大小
//filesize()获取文件大小
//echo fread($file,filesize("1.txt"));

//按行读取内容
//echo  fgets($file);
//echo  fgets($file);
//echo  fgets($file);
//while ($content = fgets($file)){
//    echo "$content";
//    echo "<br>";
//}

//读取整个文件内容
//echo  file_get_contents("1.txt");
//echo file_get_contents("http://www.baidu.com");

//把文件内容按行读取为数组
print_r(file("1.txt"));

//写入文件内容
//echo  fwrite($file,"可好看");

//写入文件内容
//file_put_contents("1.txt","建行卡上本地");

//复制
//echo copy("1.txt","2.txt");

//重命名
//echo rename("1.txt","10.php");

//删除文件,返回布尔值
//echo unlink("2.txt");



//关闭文件 返回的是布尔值
//fclose($file);







