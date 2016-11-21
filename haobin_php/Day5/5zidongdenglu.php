<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="secret.js"></script>
</head>
<body>

<form action="" method="post">
    <input type="text" name="userName" id="name">
    <br>
    <input type="text" name="passWord" id="pass">
    <br>
    <input type="button" value="登录" onclick="deng()">
</form>

<script>
    function deng(){
        var te = document.getElementById("pass");
        var str = te.value;
        var sha1Str = hex_sha1(str);
        document.cookie = "pass=" + sha1Str;
        
        var na = document.getElementById("name");
        var naStr = na.value;
        document.cookie = "name=" + naStr;
    }
</script>

<?php
    // 1. 从后台获取这个用户名的人的 密码
    $name = @$_COOKIE["name"];

    // 2. 从cookie里获取对应的密码
require_once("dataBase.php");
connectDataBase("localhost", "root", "", "MYSQL0604");
    // 3. 如果匹配一样 则自动登录
    $sql = "SELECT pWord FROM UserInfo WHERE uName = '{$name}'";
    $result = mysql_query($sql);

    $rows = mysql_fetch_row($result);
    if (@$_COOKIE["pass"]){
    if ($rows[0] == @$_COOKIE["pass"]){
        // 直接跳转到首页
        echo "可以自动登录";
    } else{
        // 什么都不做.
        echo "不能自动登录";
    }
    }
?>


</body>
</html>