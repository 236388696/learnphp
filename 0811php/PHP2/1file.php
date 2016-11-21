<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/28
 * Time: 上午9:04
 */
header("Content-type:text/html;charset=utf8");
//第二个参数是文件的打开模式
//    r可读,不可写，不可创建
//    r+可写，
//    w不可读，写入并且覆盖
//    w+ 直接写
//    a不可读，可写  在文件末尾追加写入
//    a+可读可写，不可截断，可创建
$file=fopen("pv.txt","r");
//根据长度读取文件内容（一个汉字3个字节，数字字母符号一个字节）
//    echo fread($file,8);
 echo "<br>";
//filesize()获取文件的大小
//echo fread($file,filesize("1.txt"));

//按行读取
echo fgets($file);
while ($row=fgets($file)){
    echo $row;
    echo "<br>";
}

//关闭文件
fclose($file);

echo file_get_contents("pv.txt");
//可以获取远程服务器上的文件内容
//echo file_get_contents("http://www.taobao.com");

//以写入的模式打开
$newFile=fopen("pv.txt","w");
echo fwrite($newFile,"好开心，明天不用上课啦！！！！");
fclose($newFile);

//直接根据文件路径覆盖写入，不需要打开
file_put_contents("pv.txt","希望今天晚上不要上自习了！");


//追加写入，不会覆盖原文件内容
$addFile=fopen("pv.txt","a");
fwrite($addFile,"天天特别不爱起早，好苦恼");
fclose($addFile);

//重命名
rename("pv.txt","xx.txt");

//复制文件，要复制的文件，复制之后的新文件名
copy("xx.txt","xxxx.txt");


//删除文件
unlink("xxxx.txt");


