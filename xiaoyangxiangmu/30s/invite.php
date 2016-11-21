<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");
$openid=$_GET["openid"];
$sql = "SELECT * FROM racing WHERE openid='{$openid}'";
$result = mysql_result($sql);
$row = mysql_fetch_row($result);
$nickname = $row[0][8];
$score = $row[0][6];
$sql = "SELECT * FROM racing WHERE score < '{$score}'";
$result = mysql_result($sql);
$row = mysql_fetch_row($result);
$currentCount = $row[0];

$sql = "SELECT count(id) FROM racing";
$result = mysql_result($sql);
$row = mysql_fetch_row($result);
$allCount = $row[0];

$shenglv = ($currentCount / $allCount) * 100;
echo "<script>var nickname={$nickname};var score = {$score};var shenglv = {$shenglv};var openid={$openid};</script>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/invite.css">
    <title>Document</title>
</head>
<body>
    <div id="invite_friend">
        <img src="img/8_bg.png" alt="" id="inf_bg">
        <p id='inf_name'></p>
        <p id='inf_score'>闯过了<span></span>个障碍物</p>
        <p id='inf_paiming'>胜出全国<span></span>%的玩家</p>
        <img src="img/8_jingji.png" id="inf_jingji">
        <img src="img/8_tailow.png" alt="" id="inf_tiaoz">
    </div>
    <div id="in_complete">
        <img src="img/9_bg.png" alt="" id="inc_bg">
        <img src="img/9_btn.png" alt="" id="inc_btn">
    </div>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/invite.js"></script>
    <script>

    </script>
</body>
</html>