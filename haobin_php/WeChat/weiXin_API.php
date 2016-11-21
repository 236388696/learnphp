<?php
//GET请求方式抓包
function httpGet($url) {
		    // http://blog.sina.com.cn/s/blog_640738130100tsig.html
            // 初始化对象
   		$curl = curl_init();
            // curl_setopt() 设置会话参数
            // CURLOPT_RETURNTRANSFER 结果保存到字符串中
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // CURLOPT_TIMEOUT 超时秒数
	    curl_setopt($curl, CURLOPT_TIMEOUT, 100);
            // 注意:
	    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
	    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	    curl_setopt($curl, CURLOPT_URL, $url);
	
            // 执行会话
	    $res = curl_exec($curl);
	    curl_close($curl);

    return $res;
 }
	//获取access_token的方法
	function getAccessToken($appId,$appSecret){
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
		$str = httpGet($url);
		//利用数据库来保存access_token，没过期不重新请求，过期再重新请求，并覆盖数据库里access_token以及时间
		//把json字符串转化为数组，加true是数组，不加是对象
		return json_decode($str,true)["access_token"];//返回access_token字符串
	}
	//微信应用id，应用秘钥，数据库所在服务器地市，登录数据库所用账号名，登录密码，数据库名字，表名
	function getSafeAccessToken($appId,$appSecret,$mysqlIP,$mysqlAdmin,$mysqlPass,$selDB,$formName){
		mysql_connect("$mysqlIP","$mysqlAdmin","$mysqlPass");
		mysql_select_db($selDB);
		mysql_query("set names utf8");
		$sql = "SELECT * FROM ".$formName;
		$result = mysql_query($sql);
		if(mysql_num_rows($result)>0){
			$arr = mysql_fetch_assoc($result);
			$oldTime = $arr["time"];
			$newTime = time();//获取秒
			if($newTime-$oldTime>7200){
				//过期了
				$token = getAccessToken($appId,$appSecret);
				$sql = "UPDATE ".$formName." set access_token=".$token.",time = ".$newTime;
				mysql_query($sql);
			}else{
				$token = $arr["access_token"];
			}
		}else{
			//第一次
			$token = getAccessToken($appId,$appSecret);
			$time = time();
			$sql = "INSERT INTO ".$formName."(access_token,time) VALUES ('{$token}','{$time}')";
			mysql_query($sql);
		}
		return $token;
	}
//通过post请求的网址,抓取上面的内容
function httpPost($data,$url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tmpInfo = curl_exec($ch);
    if (curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);
    return $tmpInfo;
}
//长连接转短连接
function longToShort($appId,$appSecret,$mysqlIP,$mysqlAdmin,$mysqlPass,$selDB,$formName,$longUrl){
    $token = getSafeAccessToken($appId,$appSecret,$mysqlIP,$mysqlAdmin,$mysqlPass,$selDB,$formName);
    $jsonStr = "{'action':'long2short','long_url':'{$longUrl}'}";
    $url = "https://api.weixin.qq.com/cgi-bin/shorturl?access_token={$token}";
    $str = httpPost($jsonStr,$url);
    return json_decode($str,true);
}
?>