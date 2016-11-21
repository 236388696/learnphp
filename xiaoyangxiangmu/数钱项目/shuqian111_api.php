<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/22
 * Time: 上午8:13
 */
header("Content-type:text/html;charset=utf-8");
$mysql = mysql_connect("localhost","root","");
mysql_select_db("0503");
mysql_query("set names utf8");
$sql = "SELECT *FROM shuqian ORDER BY score DESC LIMIT 0,5";
$result = mysql_query($sql);
$arr  = array("err"=>0,"msg"=>"加载成功","username"=>[],"tel"=>[],"score"=>[]);
while ($row = mysql_fetch_assoc($result)){
     array_push($arr["username"],$row["username"]);
    array_push($arr["tel"],$row["tel"]);
    array_push($arr["score"],$row["score"]);

}
echo json_encode($arr);