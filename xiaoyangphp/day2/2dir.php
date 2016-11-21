<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/9
 * Time: 下午4:34
 */

header("Content-type:text/html;charset=utf-8");

//打开文件夹
//$dir = opendir(".");

//echo readdir($dir);
//echo readdir($dir);
//echo readdir($dir);

//按行获取目录
//while ($file = readdir($dir)){
//    echo  "<hr>";
//    echo $file;
//}
//获取目录所有内容,以数组返回
print_r(scandir("."));
echo "<hr>";
print_r(scandir(".",1));
//判断是不是文件夹
var_dump(is_dir("."));

//mkdir创建文件夹
//if (mkdir("dir1")){
//    echo "创建成功";
//}else{
//    echo "创建失败";
//}

//删除文件夹
//if (rmdir("dir1")){
//    echo "删除成功";
//}else{
//    echo "删除失败";
//}


//echo filesize("pv.php");

//获取创建文件的时间戳,单位是s
//$ctimer =  filectime("pv.php");

//设置时区
date_default_timezone_set("PRC");
//获取当前时间
$time =time();

//时间格式转换
echo date("Y-m-d H:i:s",$time);

echo "<hr>";
$path = "./pv.php";
//从整个路径中返回文件的名字
echo basename($path);

//从整个路径中返回文件夹的名字
echo dirname($path);

echo "<hr>";
//路径的详细信息
print_r(pathinfo($path));


//关闭文件夹
//closedir($dir);

function removeDir($path){
    if (is_dir($path)){
        $arr = scandir($path);
        if (count($arr)>2){
            for ($i = 2; $i < count($arr); $i++){
                $url = $path."/".$arr[$i];
                removeDir($url);
            }
        }
        rmdir($path);
    }else{
        unlink($path);
    }
}

removeDir("../5");
