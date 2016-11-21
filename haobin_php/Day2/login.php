<?php
    $user = @$_POST["userName"];
    $pass = @$_POST["passWord"];
    $type = @$_POST["type"];
    //判断账号密码不能为空
    if($user!=null&&$pass!=null){
        //如果前端点击的是注册按钮,那个type对应传递过来的就是"注册"
        if($type=="注册"){
            $file = fopen("login.txt","a");
            $str = $user.",".$pass."\n";
            //每一对账号密码用,隔开,一对占一行,最后要加\n换行
            if(fwrite($file,$str)>0){//fwrite($file,$str)>0返回写入
                //字节数,如果大于0代表注册成功
                echo "注册成功";
            }else{
                echo "注册失败";
            }
        }
        $isOk = false;//记录是否找到对对应的用户名和密码
        if($type=="登录"){
            //读取文件里现有的账号密码,进行比对
            $allArr = file("login.txt");
            for($i=0;$i<count($allArr);$i++){
                $lineStr = $allArr[$i];
                //用,分隔开,成为两部分,方便比对
                $lineArr = explode(",",$lineStr);
                //分隔开之后,数组里应该有两个元素
                $userFromLocal = $lineArr[0];
                $passFromLocal = $lineArr[1];
                //过滤掉密码后面的回车
                $passFromLocal = substr($passFromLocal,0,strlen($passFromLocal)-1);
                //进行比较
                if($user==$userFromLocal&&$pass==$passFromLocal){
                    $isOk = true;
                    break;
                }
            }
            if($isOk){
                echo "登录成功";
            }else{
                echo "登录失败";
            }
        }
    }else{
        echo "账号密码不能为空";
    }
?>