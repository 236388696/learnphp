<?php
    mysql_connect("localhost","root","");
    mysql_select_db("mysjk");
    mysql_query("set names utf8");
    $sql="INSERT INTO user(ID,userName,passWord,telephone,age,address) VALUES(null,'霍明辉','12345','13838383838','25','河南')";
    mysql_query($sql);
    $sql3="SELECT * FROM user WHERE userName='霍明辉'";
    $result=mysql_query($sql3);
    while($row=mysql_fetch_assoc($result)){
        print_r($row);
    }
    $sql1="UPDATE user SET password=5448897 WHERE userName='霍明辉'";
    mysql_query($sql1);
    $sql2="DELETE FROM user WHERE userName='霍明辉'";
    mysql_query($sql2);
?>