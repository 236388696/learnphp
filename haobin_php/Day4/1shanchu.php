<?php
    mysql_connect("localhost","root","");
    mysql_select_db("mysjk");
    mysql_query("set names utf8");
    //删除表
    $sql = "DROP TABLE regedit";
    var_dump(mysql_query($sql));
?>
