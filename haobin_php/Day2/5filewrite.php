<?php
    //文件写入
    //1.先看一下各种模式下的写入
        //r不能写入
        //r+覆盖,不删除全部
        //w覆盖,删除全部
        //w+覆盖,删除全部
        //a在尾部添加
        //a+在尾部添加
    $file = fopen("1.txt","a");
    //1.fwrite()写入数据
//    echo fwrite($file,"abc");
    //2.file_put_contents()覆盖写入
        //file_get_contents和file_put_contents()不需要
        //调用fopen方法,这两个方法效率高
//    echo file_put_contents("1.txt","王俊");
    //3.copy()复制文件
        //参数;要复制文件路径,复制到的文件路径,并命名
        //需要已经存在的路径
    echo copy("1.txt","2.txt");
    //4.rename()重命名一个文件
    rename("2.txt","10.txt");
    //5.unlink()删除一个文件
    unlink("10.txt");
    //6.fclose()关闭连接,fopen使用后要记得关闭
    fclose($file);
?>
