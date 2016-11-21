<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/5
 * Time: 上午10:58
 */

class WX {
    //私有属性,appid和secret,防止外界修改
    private $appid;
    private $appsecret;

    //构造函数
    /**
     * WX constructor 构造函数,初始化该类的对象时调用.
     * @param $appid
     * @param $appsecret
     */
    public function __construct($appid,$appsecret){
        $this->appid = $appid;
        $this->appsecret =$appsecret;
    }
     private  function httpGet($url) {
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
    /**
     * @param $code:通过微信网页授权获取到的code
     */
    private function getToken($code){
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->appsecret}&code={$code}&grant_type=authorization_code";
        $result = $this->httpGet($url);
        //请求的结果是否有错误
        if (strlen($result["errcode"]) > 1){
            exit("请检查你的appid");
        }else{
            return json_decode($result,true);
        }
    }

    /**
     * 获取用户公开信息
     * @param $code:微信传回来的code
     */
    public function getUserInfo($code){
        $result =$this->getToken($code);
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token={$result['access_token']}&openid={$result['openid']}&lang=zh_CN";
        $result = $this->httpGet($url);
        if (strlen($result["errcode"]) > 1){
            exit("拉取个人信息是出错");
        }else{
            return json_decode($result,true);
        }
    }

}
