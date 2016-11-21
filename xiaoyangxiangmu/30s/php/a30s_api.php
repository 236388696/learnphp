<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/30
 * Time: 上午9:50
 */
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");
$score = $_POST["score"];
$openid = $_POST["openid"];
$sql = "UPDATE racing SET score='{$score}' WHERE openid='{$openid}'";
$result = mysql_query($sql);

$sql = "SELECT COUNT(id) FROM racing";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$count = $row[0];
if($count < 10){
    $sql = "SELECT * FROM racing ORDER BY score DESC LIMIT {$count}";
    $num = $count;
}else{
    $sql = "SELECT * FROM racing ORDER BY score DESC LIMIT 10";
    $num = 10;
}
$result = mysql_query($sql);
$arr = array("err"=>0,"msg"=>"获取成功","num"=>$num,"nickname"=>[],"score"=>[]);
while ($row = mysql_fetch_row($result)){
    array_push($arr["nickname"],$row[8]);
    array_push($arr["score"],$row[6]);
}
echo json_encode($arr);