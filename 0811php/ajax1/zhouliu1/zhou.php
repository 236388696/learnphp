<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/4
 * Time: 下午8:31
 */
//路径url：homework.php
//请求方法method:get/host
//参数:user(string):用户名／ pwd(string):密码
//返回值：{"err":0,"headImg":"xx.jpg"}
//err:0成功，1失败

///常量：不能再赋值
define("HOST_NAME","localhost");
define("DB_NAME","0811");
//判断前台传没传到值
if(isset($_POST["username"])&&isset($_POST["password"])){
    //把前台给的username定个变量名$user
    $user=$_POST["username"];
    $password=$_POST["password"];
    //以pdo连接
    $pdo=new PDO("mysql:host=".HOST_NAME.";dbname=".DB_NAME.";","root","");
};
    //显示中文
    $pdo->query("set name uft8");
    //查找    username='{$user}：把前台传过来的值给数据库
    $result=$pdo->query("SELECT * FROM zhouliu WHERE username='{$user}'AND password='{$password}'");
    //fetall取所有的，返回的是一个关联数组
    $arr=$result->fetchAll(PDO::FETCH_ASSOC);
//    print_r($arr);
    if(count($arr)>0){
        $row=$arr[0];
        $headimg=$row["headimg"];
        echo json_encode(array("err"=>0,"msg"=>"登录成功","headimg"=>$headimg));
    }else{
        echo json_encode(array("err"=>1,"msg"=>"登录失败","headimg"=>$headimg));
    }


