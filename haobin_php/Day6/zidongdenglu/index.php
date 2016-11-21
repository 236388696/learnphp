<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <!--这里显示欢迎XXX登录,系统时间:XXXX-->
    <div style="height: 500px;width: 80%;border: 10px solid deepskyblue; font-size: 40px">
        <p id="huanying"></p>
        <p id="time"></p>
    </div>
    <script>
        var userName = document.cookie["name"];
        var nowTime = new Date();
        var timeStr = nowTime.getFullYear()+"-"+(nowTime.getMonth()+1)+"-"+nowTime.getDate()+" "+nowTime.getHours()+":"+nowTime.getMinutes()+":"+nowTime.getSeconds();
        var tim = document.getElementById("time");
        tim.innerHTML = "当前时间"+timeStr;
    </script>
<!--    获取get方式里的用户名-->
    <?php
        $name = $_GET["successName"];
        echo "<input id='name' style='display: none' type='text' value='".$name."'>"
    ?>
<!--    设置欢迎文字-->
    <script>
        var huan = document.getElementById("huanying");
        var na = document.getElementById("name");
        huan.innerHTML = "欢迎"+na.value+"登录";
    </script>
</body>
</html>