<?php
    //1.opendir()打开某个路径下的文件夹
    $dir = opendir("myDir");
    //2.readdir()每次读取指定文件夹下的一个文件
    while($dirName = readdir($dir)){
        echo "<br>";
        echo $dirName;
    }
    //注意:
    //.代表当前文件夹
    //..代表上级文件夹
    //3.scandir()扫描指定文件下所有文件名字(包括文件夹名字),返回一个数组
    echo "<br>";
    print_r(scandir("."));
    //4.is_dir()判断文件夹是否存在
    //存在返回true,不存在返回false
    echo "<br>";
    echo is_dir("myDir");
    //5.mkDir()创建文件夹
    echo "<br>";
    echo mkdir("newDir");
    //6.rmdir()删除文件夹
    echo "<br>";
    echo rmdir("newDir");
    //7.basename()过滤掉路径,只取文件名
    echo "<br>";
    echo basename("../Day1/1.jieshao.php");
    //8.dirname()返回当前文件所在文件夹名字(包含路径)
    echo "<br>";
    echo dirname("../Day1/1.jieshao.php");
    //9.pathinfo()获取这个路径的文件夹名字,文件名字(包括扩展名)
    //扩展名,文件名(不包括扩展名)
    echo "<br>";
    print_r(pathinfo("../Day1/1.jieshao.php"));
?>
