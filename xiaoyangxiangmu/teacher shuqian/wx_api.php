<?php 
	define('APPID', 'wxbeba9336ac3584d0');
	define('APPSECRET', '346b2310f20376d489eaaa0b4707794b');
	/**
	* 微信API
	*/
	class w_x {
		function httpGet($url) {
		    $curl = curl_init();
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
		    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
		    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
		    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		    //验证token, 本地可以注释掉, 上线必须打开
		    // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
		    curl_setopt($curl, CURLOPT_URL, $url);
		    $res = curl_exec($curl);
		    curl_close($curl);
		    return $res;
	  	}

	  	function httpPost ($data,$url){
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
	}
 ?>
