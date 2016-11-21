<?php
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
?>