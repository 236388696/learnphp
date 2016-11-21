<?php
$img=@$_POST["img"];
$name=@$_POST["name"];
$pass=@$_POST["pass"];
$age=@$_POST["age"];
$sex=@$_POST["sex"];
$yan=$_POST["yanZ"];

mysql_connect("localhost","root","");
mysql_select_db("lvnan");
mysql_query("set names utf8");

session_start();
$sessDraw=$_SESSION["draw"];
if ($yan==$sessDraw){
    $sql="SELECT * FROM signUp WHERE uName='{$name}'";
    $result=mysql_query($sql);
    $arr=array();
    if (mysql_num_rows($result)>0){
        $arr["msg"]="用户名重复";
        echo json_encode($arr);
    }else{
        $sql="INSERT INTO signUp(ID,uName,pWord,age,sex,imgPath) VALUES (null,'{$name}','{$pass}',{$age},'{$sex}','{$img}')";

        $result=mysql_query($sql);
        if (mysql_affected_rows()>0){
            $arr["msg"] = "注册成功";
            echo json_encode($arr);
        }else{
            $arr["msg"] ="注册失败";
            echo json_encode($arr);
        }
    }

}else{
    $arr["msg"]="验证码错误";
    echo json_encode($arr);
}



?>
