<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/3
 * Time: 上午9:34
 */
//路径url：homework.php
//请求方法method:get/host
//参数:user(string):用户名／ pwd(string):密码
//返回值：{"err":0,"headImg":"xx.jpg"}
//err:0成功，1失败

//常量:不会变的值
//define("PI","3.14");
//echo PI;
//PI=1.5;//常量不能再重新给值
define("HOST_NAME","localhost");
define("DB_NAME","0811");


//判断前台有没有，把两个变量传过来
if(isset($_POST["user"])&&isset($_POST["pwd"])){
    $user=$_POST["user"];
    $pwd=$_POST["pwd"];

    //以pdo的形式连接数据库
//    $pdo=new PDO("mysql:host=localhost;dbname=0811","root","");
    $pdo=new PDO("mysql:host=".HOST_NAME.";dbname=".DB_NAME.";","root","");
//"a="+45+";"+545=65;
    //显示中文
    $pdo->exec("set names utf8");
    //查找,返回的是一个对象，并不是资源
    $result=$pdo->query("SELECT*FROM username WHERE username='{$user}'AND password='{$pwd}'");
    //fetchAll取所有的，返回一个数组，是索引数组
    $arr=$result->fetchAll(PDO::FETCH_ASSOC);
    if(count($arr)>0){
        $row=$arr[0];
        //取headImg.src
        $headImg=$row["headImg"];
        //  把数组转成字符串,把结果传出去
        echo json_encode(array("err"=>0,"headImg"=>$headImg));
    }else{
        //直接写字符串
        echo'{"err":1,"msg":"用户未找到"}';
    }
}
