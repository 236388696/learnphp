<?php
$arr =["abc"=>123,"def"=>456,"ghi" =>789,"jkl"=>101112,"mno"=>131415];
$user = $_POST["userName"];
$password = $_POST["passWord"];
foreach ($arr as $key=>$value){
    if($user==$key&&$password==$value){
        echo substr($key,0,2);
        echo "登陆成功";
    }if($user!=$key&&$password==$value){
        echo "账号不存在";
    }else if($user==$key&&$password!=$value){
        echo "密码错误";
    }
}
?>
