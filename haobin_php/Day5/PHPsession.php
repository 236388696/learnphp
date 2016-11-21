<?php
    //session类似于cookie,在PHP端使用session
    //可以临时存储一些常用的字段,当然也可是设置过期时间
    //默认过期时间请查看服务器php.ini配置
    //session.cookie_lifetime
//最重要***************
session_start();//启用session
$_SESSION["name"] = "王俊";//设置session里的某一个key
echo $_SESSION["name"];//取出session里的某个key值
print_r($_SESSION);//查看当前服务器里的session
?>
