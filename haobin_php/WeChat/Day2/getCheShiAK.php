<?php
	require_once("../weiXin_API.php");
	$appId = "wx1924d7a2e65e4280";
	$appSercet = "381f10a85640c9c1a5cd3643055d15e8";
	$token = getSafeAccessToken($appId,$appSercet,"localhost","root","","mysjk","access_token");
//	$url = "https://api.weixin.qq.com/cgi-bin/user/get?access_token={$token}&next_openid=";
//	//httpGet抓到指定网址上显示的内容
//	$arr = httpGet($url);
//	var_dump($arr);
	//1.获取好友列表(里面的openid)
    //2.把长链接变成短连接
    $jsonStr = "{'action':'long2short','long_url':'http://wap.koudaitong.com/v2/showcase/goods?alias=128wi9shh&spm=h56083&redirect_count=1'}";
    $url = "https://api.weixin.qq.com/cgi-bin/shorturl?access_token={$token}";
    //参数json对象,带access_token的网址链接
    $str = httpPost($jsonStr,$url);
    var_dump(json_decode($str,true));
?>