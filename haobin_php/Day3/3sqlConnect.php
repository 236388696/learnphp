<?php
    //概念问题:
        //1.服务器是由很多块大容量硬盘组成的,服务器
        //一般存储数据信息
        //2.数据信息靠什么管理
        //数据库操作系统(常用的有MySQL,MDB,DB,Oracle)
        //3.数据库操作系统语言:SQL语言
        //4.数据库是存储数据的仓库,有数据表+字段进行
        //搭建框架,然后往里存入一条条数据
/*******************************************************/
    //代码实现
    //1.链接某台服务器上的数据库
        //参数:数据库所在的服务器的IP地址
        //数据库系统的用户名
        //数据库系统的密码
    //MySQL默认登录名root,密码""
    $connect = mysql_connect("localhost","root","");
    //2.链接数据库系统成功以后,需要选择数据仓库
    $selectSQL = mysql_select_db("mysjk");
    //设置编码格式
    mysql_query("set names utf8");
    //3.SQL语言
    //查询
    $sql = "SELECT * FROM user";
    //4.执行编写好的SQL语言
    $result = mysql_query($sql);
    //5.$result是返回的所有数据集合,利用下面方式拿出每条数据
    //mysql_fetch_row()取出来的每条数据是索引数组
    //mysql_fetch_assoc()取出来的每条数据是关联数组(常用)
    //mysql_fetch_array()取出来的每条数据是索引加关联数组
    while ($row = mysql_fetch_array($result)){
        echo "<br>";
        print_r($row);
    }
?>
