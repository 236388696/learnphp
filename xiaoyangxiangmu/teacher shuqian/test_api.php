<?php 
	require_once 'wx_api.php';
	$code = "031kJlu22cxSN113oXu22FIiu22kJlux";
	$wx = new w_x();
	$api = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxbeba9336ac3584d0&secret=346b2310f20376d489eaaa0b4707794b&code={$code}&grant_type=authorization_code";
	$json = $wx->httpGet($api);
	echo $json;
 ?>
