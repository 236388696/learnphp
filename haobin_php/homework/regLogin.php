<?php

require_once("dataBase.php");
connectDataBase("localhost", "root", "", "mysjk");

    // 获取前端传递过来数据
    
    // 1. 我要知道前端现在要注册还是登录 type对应的值
    $nowType = $_POST["type"];

    if ($nowType == "注册"){
        // 2. 如果注册就获取注册的内容
        $name = $_POST["userName"];
        $pass = $_POST["passWord"];
        $age = $_POST["age"];
        $sex = $_POST["sex"];
        $tele = $_POST["telephone"];
        $add = $_POST["address"];
        $imgArr = $_FILES["handImage"];
        
        // 把图片从缓存文件夹下挪到工程中
            // 获取扩展名
            $imgType = $imgArr["type"];
            $arr = explode("/", $imgType);
            $imgType = $arr[1];
        
        // 拼接用户名.扩展名 图片的名字
        $newImageURL = $name.".".$imgType;
        move_uploaded_file($imgArr["tmp_name"], "./img/$newImageURL");
        
        // 3. 获取当前时间(即为注册时间)
        date_default_timezone_set("PRC");
        $time = time();
            // 格式化成年-月-日 时:分:秒
        $nowTime = date("Y-m-d H:i:s", $time);
        // 4. 写SQL语句
        $sql = "INSERT INTO UserInfo(id, uName, pWord, age, sex, telephone, address, rTime, imgPath) VALUES(NULL, '{$name}', '{$pass}', {$age}, '{$sex}', '{$tele}', '{$add}', '{$nowTime}', 'img/$newImageURL')";

        // 5. 执行并判断
        mysql_query($sql);
            // mysql_affected_rows() 返回受影响的行数
        if (mysql_affected_rows() > 0){
            echo "注册成功";
        } else{
            echo "注册失败";
        }
    } else if ($nowType == "登录"){
        $lName = $_POST["lUserName"];
        $lPass = $_POST["lPassWord"];
        
        
        $sql = "SELECT * FROM UserInfo WHERE uName = '{$lName}' AND pWord = '{$lPass}'";
        
        $result = mysql_query($sql);
        
        if (mysql_num_rows($result) > 0){
            $arr = mysql_fetch_assoc($result);
            $imgPath = $arr["imgPath"];
            header("Location: Show.php");
        } else{
            echo "登录失败";
        }
    }

?>