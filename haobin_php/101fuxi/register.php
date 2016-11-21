<?php
    //建立数据库连接三个步骤
    require_once("dataBase.php");
    connectDataBase("localhost", "root", "", "mysjk");
    // 4. 写SQL语句
    $name = @$_POST["user"];
    $pass = @$_POST["pass"];
    $type = @$_POST["type"];
    $msg = "";
    if($name!=""&&$pass!=""){
        if($type == "立即注册"){
            $sql = "SELECT * FROM baidu WHERE userName='{$name}'";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
                $msg = "账户存在";
            }else{
                $sql = "INSERT INTO baidu(id, userName, passWord) VALUES(NULL, '{$name}', '{$pass}')";
                // 5. 执行并判断
                mysql_query($sql);
                // mysql_affected_rows() 返回受影响的行数
                if (mysql_affected_rows() > 0&&$name!=""&&$pass!=""){
                    $msg = "注册成功";
                }else{
                    $msg =  "注册失败";
                }
            }
        }else if($type == "登录"){
            $sql = "SELECT * FROM baidu WHERE userName='{$name}' AND passWord='{$pass}'";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0){
                $msg = "登陆成功";
            }else{
                $msg = "登录失败";
            }
        }
    }
    else{
        $msg = "账号或密码不能为空";
    }
    $arr = array("error"=>0,"res"=>$msg);
    //把数组转化成json字符串传给前端,
    //特别注意,php页面echo打印什么,ajax就会获取到什么
    echo json_encode($arr);
?>
