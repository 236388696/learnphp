<?php
require_once "initSQL.php";
$name = @$_POST["user"];
$pass = @$_POST["pass"];
$result = selectSQLQuery("101baidufuxi", " WHERE name = '{$name}' AND pass = '{$pass}'");
if(mysql_num_rows($result)>0){//查询结果集里有多少条数据
    $rows = mysql_fetch_assoc($result);
    $arr = array("error"=>"0","token"=>$rows["token"]);
    echo json_encode($arr);
}else{
    $arr = array("error"=>"1");
    echo json_encode($arr);
}
?>
