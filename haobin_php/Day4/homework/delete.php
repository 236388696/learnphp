<?php
    require_once("dataBase.php");
    connectDataBase("localhost", "root", "", "mysjk");
    $deleNum = $_GET["deleteId"];
    $sql = "DELETE FROM UserInfo WHERE id = {$deleNum}";
    mysql_query($sql);
    if (mysql_affected_rows() > 0) {
        header("location:show1.php");
    } else {
        header("location:error.php");
    }
    echo "<a href='delete.php?deleteID={$changeTheID}' onclick='if(confirm('确定删除?')==false)return false;'>删除</a>";
?>
