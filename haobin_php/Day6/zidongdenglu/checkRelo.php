<?php
//本文件用于处理登录和注册信息使用
require_once("Tool/dataBase.php");
connectDataBase("localhost","root","","mysjk");
    $type = @$_POST["type"];
    if($type!=null){
        if($type=="注册"){
            $name = @$_POST["userName"];
            $pass = @$_POST["passWord"];
            //不仅前台要进行空的判断,后台也需要进行判断
            //防止有人通过不法途径传递空数据放数据库
            //当前页面可以获取当前页面前一个页面的链接来判断
            //是否通过制定的注册页面济宁初测的,如果是再执行下面的代码
            if($name!=""&&$pass!=""){
                //查询用户名是否存在
                $selecSQL = "SELECT * FROM user WHERE uName = '{$name}'";
                $result = mysql_query($selecSQL);
                if(mysql_num_rows($result)>0){
                    header("location:error.php?msg=用户已经存在");
                }
                else{
                    //密码需要加密
                    $shaPass = sha1($pass);
                    $sql = "INSERT INTO user(id,uName,pWord,taken) VALUE (NULL ,'{$name}','{$shaPass}','0')";

                    mysql_query($sql);
                    if(mysql_affected_rows()>0){
                        header("location:index.php?successName={$name}");
                    }
                    else{
                        header("location:error.php?msg='注册失败'");
                    }
                }
            }
        }
    }
?>
