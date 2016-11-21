<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/31
 * Time: 上午9:08
 */
header("Content-type:text/html;charset=utf8");
//die("游戏结束");
print_r($_POST);
$type=$_POST["type"];
switch ($type){
    case"登录":
        //1.取出本地保存的用户名和密码
        $content=file_get_contents("user.txt");
        //2.根据换行分割成数组
        $arr=explode("\n",$content);
        //3.遍历数组，查看每一个是否匹配的
        for($i=0;$i<count($arr);$i++){
            //username|password=>[username,password]
            //4.把每一组用户用｜分割成数组，$user[0]为用户名，$user[1]为密码
            $user=explode("|",$arr[$i]);
            //5.获取前端传入的用户名和密码
            $user=$_POST["username"];
            $password=$_POST["password"];
            //6.判断
            if($username==$user[0]&&$password==$user[1]){
                echo "登录成功";
                break;
            }

        }
        //如果for循环遍历完，说明没匹配到
        if($i==count($arr)){
            echo "登录失败";
        }
        break;
    case "注册":
        $file=fopen("user.txt","a");
        $username=$_POST["username"];
        $password=$_POST["password"];
        //username|password
        //按照上面的格式写入文本
        fwrite($file,$username."|"."password"."\n");
        fclose($file);
        echo "注册成功";
        break;
    default:
        //后面的代码不再执行，程序直接结束
        die("输入错误");
        break;
}