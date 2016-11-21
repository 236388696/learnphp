<?php
require_once("dataBase.php");
connectDataBase("localhost", "root", "", "mysjk");

$deleNum = $_GET['deleteID'];
$sql = "DELETE FROM UserInfo WHERE id = {$deleNum}";


mysql_query($sql);

if (mysql_affected_rows() > 0){
    header("location: Show.php");
} else {
    header("location: error.php");
}
?>