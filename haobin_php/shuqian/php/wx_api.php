<?php 	
	/**
	* 微信API
	*/
	class W_X {
		private $appid = "wx49f8718bcd6d89a7";
		private $appsecret = "b4e4b206943102d4aa6f71a58394e3bb";

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

	    //通过code获取网页授权access_token
	    public function getToken ($code)
	    {
	    	$json = $this->httpGet("https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->appsecret}&code={$code}&grant_type=authorization_code");
	    	return json_decode($json, true);
	    }

	    public function refreshToken ($refresh_token)
	    {
	    	$json = $this->httpGet("https://api.weixin.qq.com/sns/oauth2/refresh_token?appid={$this->appid}&grant_type=refresh_token&refresh_token={$refresh_token}");
	    	return json_decode($json, true);
	    }

	    public function getUserInfo ($access_token, $openid)
	    {
	    	$json = $this->httpGet("https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN");
	    	return json_decode($json, true);
	    }

	}



 ?>
