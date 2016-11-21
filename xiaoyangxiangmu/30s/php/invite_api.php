<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");
$type = $_POST["type"];
$numState = $_POST["numState"];
$openid = $_POST["openid"];
switch ($type){
    case "up":
        $sql = "SELECT * FROM racing WHERE openid='{$openid}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $upNum = $row[0][10];
        $upNum++;
        $sql = "UPDATE racing SET up={$upNum}";
        mysql_query($sql);
        break;
    case "down":
        $sql = "SELECT * FROM racing WHERE openid='{$openid}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $downNum = $row[0][11];
        $downNum++;
        $sql = "UPDATE racing SET down={$downNum}";
        mysql_query($sql);
        break;
}
