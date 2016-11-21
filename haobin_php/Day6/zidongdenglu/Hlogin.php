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
<form action="login.php" method="post">
    用户名:<input type="text" name="userName" required="required" id="uN"><br>
    密码:<input type="password" name="passWord" required="required" id="pW"><br>
    <input type="checkbox" name="isZiDong" value="is" id="zD">自动登录<br>
<!--    选择自动登录有效时间-->
    <select name="" id="effectiveDate">
        <option value="1">1天</option>
        <option value="5">5天</option>
        <option value="10">10天</option>
    </select><br>
    <input type="submit" value="登录" onclick="btn()">
</form>
<script src="Tool/secret.js"></script>
<script>
    function btn() {
        var user = document.getElementById("uN").value;
        var pass = document.getElementById("pW").value;
        var check = document.getElementById("zD");
        var effSelect = document.getElementById("effectiveDate");
        if(check.checked){
            console.log(user,pass)
            var shaPass = hex_sha1(pass);
            //拿到用户选择的select的值
            var day = effSelect.value;
            var nowDate = new Date();
            nowDate.setTime(nowDate.getTime()+day*24*3600*1000);
            //多个cookie之间用;隔开
            document.cookie = "name="+user+";expires="+nowDate.toUTCString();
            document.cookie = "pass="+shaPass+";expires="+nowDate.toUTCString();
        }else{
            var dat = new Date();
            dat.setTime(dat.getTime()-day*24*3600*1000);
            document.cookie = "name="+";expires="+dat.toUTCString();
            document.cookie = "pass="+";expires="+dat.toUTCString();
        }
    }
    <?php
        require_once("Tool/dataBase.php");
        connectDataBase("localhost","root","","mysjk");
        //真正实现自动登录的再这里
        $name = $_COOKIE["name"];
        $pass = $_COOKIE["pass"];
        $sql = "SELECT * FROM user WHERE uName = '{$name}' AND pWord = '{$pass}'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)){
            header("location:index.php");
        }
    ?>
</script>
</body>
</html>