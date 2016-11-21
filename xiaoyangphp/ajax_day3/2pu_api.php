<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/17
 * Time: 下午3:51
 */

require_once "common.php";
$page = $_GET["page"];
$start = $page *4;
$sql = "SELECT * FROM image LIMIT {$start},4";
$result = mysql_query($sql);
$arr = array("err"=>0,"msg"=>"加载成功","result"=>[]);
while ($row = mysql_fetch_assoc($result)){
    array_push($arr["result"],$row);

}
echo json_encode($arr);