<?php
    //当前属于后台
    //1.获取前端利用get请求方式发送过来的数据
        //key和value都会在地址栏里显示(不安全)
        #一般用于请求一些信息展示类的数据
//    var_dump($_GET);
    #2.获取前端利用post请求方式,发送过来的数据
        #key和value不会在地址栏里显示,而且前端
        #发送的东西可以是图片或者视频音频等大数据
    var_dump($_POST);
    //如果获取$_POST中某个key值对象的value,前端
    #必须使用我这里规定的key值(例如userName);
    $suer = $_POST["userName"];
    echo $suer;
    #3.练习  做一个登录练习
    $user = $_POST["userName"];
    $pass = $_POST["password"];
    if ($user=="lidongxu"&&$pass=="123"){
        echo "登录成功";
    }else{
        echo "登录失败";
    }
?>