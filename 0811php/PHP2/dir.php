<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/28
 * Time: 上午10:41
 */

header("Content-type:text/html;charset=utf8");
$dir=opendir(".");
//依次读取目录下的内容
echo readdir($dir);//com+d:整行复制
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";
echo readdir($dir);
echo "<br>";

//while ($file=readdir($dir)){
//    echo $file;
//    echo "<br>";
//}
//关闭目录
closedir($dir);

//以数组的形式返回目录下的文件
// ..父级里的所有文件
//print_r(scandir(".."));
//print_r(scandir("../PHP"));

//添加文件夹
//mkdir("asdfg");
//删除文件夹，前提是文件夹里没有内容；如果文件夹不为空，删除不了
//rmdir("a");


//输入的路径是否是文件夹
//is_dir("a");

//defaults write com.apple.finder AppleShowAllFiles -boolean true ; killall Finder 这是苹果终端写这个，查看当前文件夹的隐藏文件
function removeDir($path){
    //判断路径是文件还是文件夹
    //如果是文件夹，需要处理文件夹内的东西
    if(is_dir($path)){
        //2.判断文件夹下是否有内容，如果有，继续处理
        $arr=scandir($path);
        if(count($arr)>2){
            //遍历文件夹下的所有内容，每一个文件都需要进行当前相同的操作，调用递归函数
            for($i=2;$i<count($arr);$i++){
                //每一次遍历只能得到文件名，所以需要拼接路径
                $url=$path."/".$arr[$i];
                removeDir($url);
            }
            rmdir($path);
            //如果没有，直接删除文件夹
        }else{
            rmdir($path);
        }
        //如果是文件，直接删除
    }else{
        unlink($path);
    }
}
removeDir("./a"); //别忘了更改删除文件夹的权限。改可读性可改，com+i


//设置时区
date_default_timezone_set("PRC");
//1970年开始到现在时间的妙(js用的是毫秒)，文件的创建时间
$ctime= fileatime("xx.txt");
//时间格式：年月日 时分秒
echo date("Y-m-d ——H:i:s",$ctime);
echo "<br>";
echo date("Y年m月d日 H:i",$ctime);
echo "<br>";


//获取当前的时间戳
$currentTime=time();
echo date("H:i",$currentTime);


