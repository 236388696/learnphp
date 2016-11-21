<?php
mysql_connect("localhost","root","");
mysql_select_db("lvnan");
mysql_query("set names utf8");

$name=@$_POST["name"];
$pass=@$_POST["pass"];

$sql="SELECT * FROM signUp WHERE uName='{$name}' AND  pWord='{$pass}'";
$result=mysql_query($sql);
//echo $sql;
$arr=array();
if (mysql_num_rows($result)>0){
    $arr["msg"]="登录成功";
}else{
    $arr["msg"]="登录失败";
}
echo json_encode($arr);


?>
