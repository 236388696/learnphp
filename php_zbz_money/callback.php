<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/11
 * Time: 上午9:26
 */
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

$appid = "wxace98d71f03e90ae";
$appsecret = "ebb3d43f6867fdc93c88b31f9bc6a015";
$code = $_GET["code"];
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$appsecret}&code={$code}&grant_type=authorization_code";
$result = httpGet($url);
$arr = json_decode($result,true);
$token = $arr["access_token"];
$openid = $arr["openid"];
$url = "https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}&lang=zh_CN";
$result = httpGet($url);
$arr = json_decode($result,true);

$pdo = new PDO("mysql:host=".SAE_MYSQL_HOST_M.";port=".SAE_MYSQL_PORT.";dbname=".SAE_MYSQL_DB.";",SAE_MYSQL_USER,SAE_MYSQL_PASS);
$pdo->exec("set names utf8");

if (isset($_POST["tel"])){
  $tel = $_POST["tel"];
  $openid = $_POST["openid"];

  $pdo->exec("UPDATE user SET tel = '{$tel}' WHERE openid = '{$openid}'");
}
if(isset($_POST["score"])){
    $score = $_POST["score"];
    $openid = $_POST["openid"];
    $results = $pdo->query("SELECT * FROM user WHERE openid='{$openid}'");
    $arrs = $results->fetchAll(PDO::FETCH_ASSOC);
    $scores = $arrs[0]["score"];
    if ($score > $scores){
        $result = $pdo->exec("UPDATE user SET score = {$score} WHERE openid = '{$openid}'");
        $scoress = $result[0]["score"];
        if($result > 0){
            echo json_encode(array("err"=>0,"score"=>$scoress,"rank"=>count($arrs)));
        }else{
            echo json_encode(array("err"=>1,"msg"=>"sadsad"));
        }
    }else{
        echo json_encode(array("err"=>0,"score"=>$scores,"rank"=>count($arrs)));
    }


}
