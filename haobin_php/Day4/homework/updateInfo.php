<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="updateInfo.php">
    <?php
        require_once("dataBase.php");
        $str = connectDataBase("localhost","root","","mysjk");
        //1.保存要修改的ID值
        $theID = $_GET["changeId"];
        if($theID!=null){
            file_put_contents("theID.txt",$theID);
        }
        //2.利用查出来的id去数据库里查询
        $changeID = file_get_contents("theID.txt");
        $sql = "SELECT * FROM UserInfo WHERE id = {$changeID}";
        $result = mysql_query($sql);
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $key=>$value){
            if($key=="ingPath"){
                continue;
            }
            echo $key;
            echo ":  ";
            echo "<input type='text' name='{$key}' value='{$value}'";
            if($key=="id"||$key=="rTime"){
                echo "readonly='readonly'";
            }
            echo ">";
            echo "<br>";
        }
    ?>
    <input type="submit" value="点击修改" onclick="confirm('你确定么')">
    <?php
        //获取点击修改按钮后,利用GET方式传递的值
        $id = @$_GET["id"];
        $name = @$_GET["uName"];
        $passWord = @$_GET["pWord"];
        $age = @$_GET["age"];
        $sex = @$_GET["sex"];
        $tele = @$_GET["telephone"];
        $add = @$_GET["address"];
        $sql = "UPDATE UserInfo SET uName = '{$name}' , pWord = '{$passWord}' , age = {$age} , sex = '{$sex}' , telephone = '{$tele}' , address = '{$add}' WHERE id = $id";
        if($name!=null){
            mysql_query($sql);
            if(mysql_affected_rows()>0){
                //跳转到show.php
                header("location:show1.php");
            }else{
                //跳转到error  3秒后自己回来
                header("location:error.php");
            }
        }
    ?>
</form>
</body>
</html>