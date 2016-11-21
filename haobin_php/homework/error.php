<?php
//
//    echo "发生错误";
//    echo "<script>";
//    echo "history.go(-1)";
//    echo "</script>";
//
//?>
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

    <div style="text-align: center; width: 80%; margin: 0px auto; height: 300px; border: 10px solid deepskyblue; font-size: 50px;">
        <p>没有发生更新内容, 或者发生错误</p>
        <br>
        <span style="font-size: 25px;" id="time">将在3秒后自动跳转, 如果没发生跳转请点击</span><a href="Show.php">跳转</a>
    </div>

<script>
    
    var p = document.getElementById("time");
    
    var sum = 3;
    var time = setInterval(function(){
        sum--;
        p.innerHTML = "将在" + sum + "秒后自动跳转, 如果没发生跳转请点击";
        if (sum == 0){
            clearInterval(time);
            window.location.href = "Show.php";
        }
    }, 1000);
    
</script>
</body>
</html>
