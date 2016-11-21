<?php
	require_once("httpGet.php");
	$appId = "wxd1ac9326e764b3e0";
	$appSecret = "95d8b43543cd5d28799f99ba6df9fd36";
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
	//1.微信不推荐用这种方式火气accessToken
//	echo file_get_contents($url);
	//2.获取access——token
	//利用第三方库Curl来得到网页上的内容
	$str = httpGet($url);
	echo $str;
?>