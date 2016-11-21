<?php
    //1.打开一个文件
        //参数:文件路径,打开方式
        //如果提示没有权限去创建,则给予权限即可
    $isOpen = fopen("1.txt","a");
    echo $isOpen;
    //2.计算一个文件里所有字节数
        //注意:回车也算一个字节
    echo filesize("1.txt");
    //3.is_file()判断指定路径的文件是否存在
    if(is_file("1.txt")){
        echo "存在";
    }else{
        echo "不存在";
    }
/***************************************************/
    echo "<hr>";
    //读取文件
        //注意打开的方式,如果是a是不可读的
    $file = fopen("1.txt","r");
    //1.fread()
        //参数:文件管理对象,读取长度
//    echo fread($file,filesize("1.txt"));
    echo "<hr>";
    //2.fgets()按照每行读取
    echo fgets($file);
    echo fgets($file);
    echo fgets($file);

    //3.file_get_contents()读取文件全部内容
    echo "<br>";
    echo file_get_contents("1.txt");
    //4.file()文件每一行作为一个数组中的元素,返回一个数组
    echo "<br>";
    print_r(file("1.txt"));
    //5.获取文件上次读取时间
    $time = fileatime("7fileGroup.php");
    //获取时区
    date_default_timezone_set("PRC");
    echo date("Y-m-d H:i:s", $time);
    //6.filectime()获取文件创建时间
?>
