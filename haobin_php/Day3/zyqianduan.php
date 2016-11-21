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
    <form action="zyqianduan.php" enctype="multipart/form-data" method="post">
        用户名:<input type="text" name="uName"><br>
        密码:<input type="password" name="pWord"><br>
        年龄:<input type="text" name="age"><br>
        性别:<input type="text" name="sex"><br>
        电话号:<input type="text" name="telephone"><br>
        地址<input type="text" name="address"><br>
        注册时间<input type="text" name="rTime"><br>
        图片名字<input type="text" name="imgName"><br>
        <input type="file" name="img"><br>
        <input type="submit" value="注册" name="type"><br>
        <input type="submit" value="登录" name="type">
    </form>
    <?php
        $typeValue = @$_POST["type"];
        $imgArr = @$_FILES["img"];
        $imgName = @$_POST[imgName];
        $onloadimg=$imgArr["tmp_name"];
        $newImage = $imgName."."."png";
        move_uploaded_file($onloadimg,"./onloadimg/{$newImage}");
        $SQL = mysql_connect("localhost","root","");
        $name = @$_POST[uName];
        $password = @$_POST[pWord];
        $age = @$_POST[age];
        $sex = @$_POST[sex];
        $tele = @$_POST[telephone];
        $add = @$_POST[address];
        $time = @$_POST[rTime];
        $selectDb = mysql_select_db("mysjk");
        mysql_query("set names utf8");
        if($typeValue == "注册"){
            $sql = "INSERT INTO regedit(id,uName,pWord,age,sex,telephone,address,rTime) VALUES(NULL,$name,$password,$age,$sex,$tele,$add,$time)";
        }else if($typeValue == "登录"){
            if($name==$uName&&$password==$pWord){
                echo "登录成功";
            }else if($name!=$uName){
                echo "账户不存在";
            }else if($name==$uName&&$password!=$pWord){
                echo "密码错误";
            }
        }
    ?>
</body>
</html>