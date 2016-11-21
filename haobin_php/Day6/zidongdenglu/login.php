<?php
//登录代码的书写
require_once("Tool/dataBase.php");
connectDataBase("localhost","root","","mysjk");
//1.获取前端数据
$name = $_POST["userName"];
$pass = $_POST["passWord"];
echo $name;
echo $pass;
$shaPass = sha1($pass);
$sql = "SELECT * FROM user WHERE uName = '{$name}' AND pWord = '{$shaPass}'";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0){
    header("location:index.php?successName={$name}");
}else{
//    header("location:error.php?msg=登录失败");
}
?>
