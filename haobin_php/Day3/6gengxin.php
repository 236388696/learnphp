<?php
    $SQL = mysql_connect("localhost","root","");
    $selectDb = mysql_select_db("mysjk");
    mysql_query("set names utf8");
    //更新
    $sql = "UPDATE user SET age = 20 WHERE userName = '霍明辉'";
    mysql_query($sql);
?>
