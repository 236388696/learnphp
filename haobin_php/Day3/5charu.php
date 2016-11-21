<?php
    $SQL = mysql_connect("localhost","root","");
    $selectDb = mysql_select_db("mysjk");
    mysql_query("set names utf8");
    //插入一条数据
        //字段名不用加单引号
        //字段名和值要一一对应,不要穿位子
        //数值类型不要加引号
    $sql = "INSERT INTO user(id,userName,passWord,telephone,age,address) VALUES(NULL,'孙超','666','12365478900',20,'moon')";
    mysql_query($sql);
?>
