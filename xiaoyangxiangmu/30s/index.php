<?php
//开始获取openid
header("Content-type:text/html;charset=utf-8");
require_once "connect_mysql.php";

function httpGet($url) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	// 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
	// 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	//验证token, 本地可以注释掉, 上线必须打开
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	$res = curl_exec($curl);
	curl_close($curl);
	return $res;
}

// 微信在用户确认授权后会跳到此页面,并传入一个参数code
$code = $_GET["code"];

$appid = "wx553d5e3607321cc6";
$secret = "4b6b5213ed0fadf2105df2260c53634a";

$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
$result = httpGet($url);
$arr = json_decode($result,true);
$token = $arr["access_token"];
session_start();
if($arr["openid"]){
	$_SESSION["openid"] = $arr["openid"];
}
$openid = $_SESSION["openid"];

$url ="https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}&lang=zh_CN";
$result = httpGet($url);
$arr = json_decode($result,true);
$nickname = $arr["nickname"];
$sql = "SELECT * FROM racing WHERE openid='{$openid}'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
if($row[0]<1){
	$sql = "INSERT INTO racing (id,name,tel,province,city,address,score,prize,nickname,openid,up,down) VALUES (NULL,'','','','','',0,'','{$nickname}','{$openid}',0,0)";
	mysql_query($sql);
}
echo "<script>var openid ='{$openid}';</script>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/index1.css"/>
    <title>Title</title>
</head>
<body>
	<div id="wrap1">
		<div class="hezi"></div>
		<img class="wrap_logo" src="img/1-logo.png"/>
		<img class="wrap_saiche" src="img/1_30second.png" alt="" />
		<img class="wrap_win" src="img/1_wintour.png"/>
		<img class="wrap_challenge" src="img/1_challenge.png" alt="" />
		<img class="wrap_go" src="img/1_go.png" alt="" />
		<img class="wrap_rule" src="img/1_rule.png" alt="" />
		<img class="wrap_info" src="img/2_info.png"/>
		<img class="wrap_cha" src="img/cha.png"/>
	</div>
	<div id="wrap2">
		<img class="wrap_begin" src="img/3_begin.png"/>
		<img class="wrap_logo" src="img/1-logo.png"/>
	</div>
	<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/index1.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>