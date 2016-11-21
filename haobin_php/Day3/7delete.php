<?php
    $SQL = mysql_connect("localhost","root","");
    $selectDb = mysql_select_db("mysjk");
    mysql_query("set names utf8");
    //删除
    $sql = "DELETE FROM user WHERE userName = '霍明辉'";
    mysql_query($sql);
?>
