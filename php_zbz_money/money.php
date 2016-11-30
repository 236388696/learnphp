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

$results = $pdo->query("SELECT * FROM user ORDER BY score DESC LIMIT 5");
$arrs = $results->fetchAll(PDO::FETCH_ASSOC);

$result = $pdo->query("SELECT * FROM user WHERE openid='{$openid}'");
if($result){
    $count = $result->rowCount();
    if($count > 0){
        //存在
    }else{
        $nickname = $arr["nickname"];
        $headimg = $arr["headimgurl"];
        $sex = $arr["sex"];
        $city = $arr["city"];
        $insertROW = $pdo->exec("INSERT INTO user(id,openid,nikename,headimg,sex,city,score) VALUE (NULL ,'{$openid}','{$nickname}','{$headimg}',$sex,'{$city}',0)");
        if ($insertROW > 0){

        }else{

        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="money.css">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">-->
    <title>数钱</title>
    <style>

    </style>
</head>
<body>
<div class="all">
    <div class="logo">
        <img src="img/index1.png" alt="">
        <img src="img/index2.png" alt="">
    </div>
    <div class="challenge">
        <img src="img/index01.png" alt="">
    </div>
    <div class="text">
        <img src="img/index02.png" alt="">
    </div>
    <div id="start">
        <img src="img/index10.png" alt="">
    </div>
    <div class="data">
        <img class="logos" src="img/from3.png" alt="">
        <p>个人信息将作为领奖依据请认真填写</p>
        <input placeholder="姓名" class="nickname" type="text">
        <input placeholder="电话" class="tel" type="text">
        <img class="games" src="img/from2.png" alt="">
    </div>

</div>
<div class="box">
    <div class="ranking">
        <img src="img/index7.png" alt="">
    </div>
    <div id="rule">
        <img src="img/index9.png" alt="">
    </div>
    <div id="prize">
        <img src="img/index8.png" alt="">
    </div>
    <div id="state">
        <img src="img/index6.png" alt="">
    </div>
</div>
<div class="rankings">
    <img class="sq1" src="img/sq1.png" alt="">
    <?php
    echo "<ul class='list'>";
    for ($i = 0; $i<count($arrs); $i++){
        $row = $arrs[$i];
        $nickname = $row["nikename"];
        $headimg = $row["headimg"];
        $score = $row["score"];
        echo "<li class='list1'>";
        echo "<img class='src' src='$headimg'>";
        echo "<span class='name'>$nickname</span>";
        echo "<span class='score'>$score".分."</span>";
        echo "</li>";
    }
    echo "</ul>";
    ?>

</div>
<div id="bgc"></div>
<div id="esc"><img src="img/form1.png" alt=""></div>
<div id="rules">
    <img src="img/gz.png" alt="">
</div>
<div id="prizes">
    <img src="img/jp.png" alt="">
</div>
<div id="states">
    <img src="img/jq.png" alt="">
</div>
<div class="all1">
    <img class="wall" src="img/wall.png" alt="">
    <img class="finger" src="img/finger.png" alt="">
    <img class="title" src="img/txt1.png" alt="">
    <span class="scoress">10</span>
    <img class="moneys" src="img/moneys.png" alt="">
    <img class="money" src="img/money.png" alt="">
    <span class="bai">0</span>
    <span class="shi">0</span>
    <span class="ge">0</span>
</div>
<div class="all2">
    <img class="again" src="img/again.png" alt="">
    <img class="share" src="img/share.png" alt="">
    <span class="rmb">¥800</span>
    <span class="strong">没办法！你已经强到没有对手了</span>
    <span class="zhanji">我的辉煌战绩:¥<span class="chengji">999</span> 当前排名:<span class="id">62</span>位</span>
    <img class="dollar" src="img/dollar.png" alt="">
    <img class="mengban" src="img/mengban.png" alt="">
</div>
<script src="jquery-2.2.3.min(1).js"></script>
<script src="zepto.min.js"></script>
<script src="zepto.touch.js"></script>
<script type="text/javascript">

    var rule = document.getElementById("rule");
    var bgc = document.getElementById("bgc");
    var esc = document.getElementById("esc");
    var rules = document.getElementById("rules");
    var prize = document.getElementById("prize");
    var state = document.getElementById("state");
    var prizes = document.getElementById("prizes");
    var states = document.getElementById("states");
    var start = document.getElementById("start");
    var data = document.querySelector(".data");
    var ranking = document.querySelector(".ranking");
    var rankings = document.querySelector(".rankings");
    var games = document.querySelector(".games");
    var all = document.querySelector(".all");
    var all1 = document.querySelector(".all1");
    
    rule.addEventListener("touchstart",function () {
        bgc.style.display = "block";
        esc.style.display = "block";
        rules.style.display = "block";
    });
    prize.addEventListener("touchstart",function () {
        bgc.style.display = "block";
        esc.style.display = "block";
        prizes.style.display = "block";
    });
    state.addEventListener("touchstart",function () {
        bgc.style.display = "block";
        esc.style.display = "block";
        states.style.display = "block";
    });
    
    esc.addEventListener("touchstart",function () {
        bgc.style.display = "none";
        esc.style.display = "none";
        rules.style.display = "none";
        prizes.style.display = "none";
        states.style.display = "none";
        data.style.display = "none";
        rankings.style.display = "none";
    })
    start.addEventListener("touchstart",function () {
        bgc.style.display = "block";
        esc.style.display = "block";
        data.style.display = "block";
    })
    ranking.addEventListener("touchstart",function () {
        bgc.style.display = "block";
        esc.style.display = "block";
        rankings.style.display = "block";
        $.ajax({
            url:"callback.php",
            type:"post",
            data:{

            }
        })
    })
    games.addEventListener("touchstart",function () {
        bgc.style.display = "none";
        esc.style.display = "none";
        all.style.display = "none";
        all1.style.display = "block";
    })

    $(function () {
        var timer = null;
        var timers = null;
        var imgsrc = 1;
        var gescore = 0;
        var shiscore = 0;
        var baiscore = 0;
        var time = 10;
        timer = setInterval(function () {
            imgsrc++;
            if (imgsrc > 3){
                imgsrc = 1;
            }
            $(".title").attr("src","img/txt"+imgsrc+".png")
        },2000);

        $(".games").on("touchstart",function () {
            $(".box").css("display","none")
            timers = setInterval(function () {
                time-=1;
                $(".scoress").html(time);
                if(time == 0){
                    $.ajax({
                        url:"callback.php",
                        type:"post",
                        data:{
                            score:$(".bai").html()+$(".shi").html()+$(".ge").html(),
                            openid:"<?php echo $openid; ?>"
                        },
                        dataType:"json",
                        success:function (data) {
                            if (data.err == 0){
                                $(".chengji").html(data.score);
                                $(".id").html(data.rank);
                            }else{
                                console.log(data.msg);
                            }
                        }
                    });
                    clearInterval(time);
                    $(".all1").css("display","none");
                    $(".box").css("display","block");
                    $(".all2").css("display","block");
                }
            },1000);
            $.ajax({
                url:"callback.php",
                type:"post",
                data:{
                    tel:$(".tel").val(),
                    openid:"<?php echo $openid; ?>"
                }

            })


        });



        $(document).on("swipeUp",".money",function () {
            $(".finger").remove();
            gescore++;
            $(".money").animate({
                width:"30%",
                height:"30%",
                top:"10%",
                left:"40%",
                opacity:0.5
            },500,function () {
                $(this).remove();
            })
            var img = $("<img src='img/money.png' class='money'>");
            $(".all1").append(img);

            $(".ge").html(gescore);
            if (gescore > 9){
                gescore = 0;
                $(".ge").html(gescore);
                shiscore+=1;
            }
            $(".shi").html(shiscore);
            if(shiscore > 9){
                shiscore = 0;
                $(".shi").html(shiscore);
                baiscore+=1;
            }
            $(".bai").html(baiscore);

            var zfs = $(".bai").html()+$(".shi").html()+$(".ge").html();
            $(".rmb").html("¥"+zfs);
        })
       $(".again").on("touchstart",function () {
           $(".all2").css("display","none");
           $(".all1").css("display","block");
           gescore = 0;
           shiscore = 0;
           baiscore = 0;
           time = 10;
       });
       $(".share").on("touchstart",function () {
           $(".mengban").css("display","block");
       }) 
       


    })
    
    document.addEventListener("touchmove",function (e) {
        e.preventDefault();
    })
    document.addEventListener("dblclick ",function (e) {
        e.preventDefault();
    })

</script>
</body>
</html>