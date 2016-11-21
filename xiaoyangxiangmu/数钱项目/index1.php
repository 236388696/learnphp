<?php
function httpGet($url) {
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
//1.用户在微信点击确认登录后,会跳转此页面,同时传入一个参数code
$code = $_GET["code"];
$appid = "wx553d5e3607321cc6";
$secret ="4b6b5213ed0fadf2105df2260c53634a";
//2.通过code来请求access_token和openid
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
$result = httpGet($url);
$arr = json_decode($result,true);
$token = $arr["access_token"];
$openid =$arr["openid"];

//3.通过 access_token和openid 获取用户的详细信息
$url ="https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}&lang=zh_CN";

$result = httpGet($url);
$arr = json_decode($result,true);

//连接数据库
mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");
$sql = "SELECT * FROM shuqian WHERE openid = '{$openid}'";
$result = mysql_query($sql);
if (mysql_num_rows()>0){
	//存在
}else{
	$nickname = $arr["nickname"];
	$headimg = $arr["headimgurl"];
	$sql  ="INSERT INTO shuqian (id,openid,nickname,headimg,score,name,tel) VALUES (NULL ,'{$openid}','{$nickname}','{$headimg}',0,'','')";
	mysql_query($sql);
	if (mysql_insert_id()>0){
//		echo "<img src='$headimg'>";
	}else{
//		echo "<img src='$headimg'>";
	}
}

echo "<script>var  openid={$openid};</script>";

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="css/animate.css" />
		<title></title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}
			
			html,
			body {
				width: 100%;
				height: 100%;
			}
			
			#wrap {
				width: 100%;
				height: 100%;
				background: url(img/bc.png) no-repeat;
				background-size: 100% 100%;
			}
			
			header {
				padding-top: 22.34%;
			}
			
			.tiao1 img {
				width: 70.15%;
				margin-left: 21.40625%;
				-webkit-animation: bounce 1s;
			}
			.tiao2 img {
				width: 94.0625%;
				margin-left: 2.65625%;
				margin-top: -2.5%;
				-webkit-animation: shake 1s 0.2s;
			}
			
			.tiao3 img {
				width: 90.625%;
				margin-top: -2%;
				-webkit-animation: bounceIn 1s;
			}
			
			section {
				width: 100%;
				position: relative;
			}
			
			.begin img {
				width: 40.625%;
				margin-top: 24.21875%;
				margin-left: 26.4687%;
			}
			
			.hand img {
				/*height: 9.375%;*/
				width: 13.59375%;
				margin-left: 55.59375%;
				position: absolute;
				top: 75%;
			}
			.hand img{
				animation: huang 2s linear infinite;
			}
			@-webkit-keyframes huang{
			from{
				transform: scale(1);
			}
			50%{
				transform: scale(1.2); 
			}
			
			to{
				transform: scale(1);
			}
		}
			
			footer {
				position: absolute;
				width: 100%;
				height: 15%;
				bottom: 0;
				left: 4.6875%;
			}
			
			.red {
				position: absolute;
				/*top:40%;*/
			}
			
			.bc{
				width: 91.8%;
				height: 18.75%;
			}
			
			.xun {
				width: 20.3125%;
			}
			.rules1{
				position: absolute;
				width: 100%;
				height: 100%;
				left: 2%;
				top: 10%;
			}
			.rules2{
				position: absolute;
				width: 100%;
				height: 100%;
				left: 24%;
				top: 10%;
			}
			.rules3{
				position: absolute;
				width: 100%;
				height: 100%;
				left: 46%;
				top: 10%;
			}
			.rules4{
				position: absolute;
				width: 100%;
				height: 100%;
				left: 68%;
				top: 10%;
			}
			.imgs{
				position: absolute;
				width: 100%;
				height: 100%;
				
			}
			.imgs img{
				width: 73.4375%;
				position: absolute;
				top:10.5625%;
				left:13.28125%;
				z-index: 5;
				display: none;
			}
			.person{
				width: 100%;
				height: 100%;
				display: none;
				position: absolute;
				top:-58.5625%;
				left:13.28125%;
				z-index: 5;
			}
			.person img{
				width: 73.4375%;
			}
			/*.submit{*/
				/*position: absolute;*/
				/*top:90.09375%;*/
				/*left: 17.46875%;*/
				/*height: 17.28125%;*/
				/*width: 40.3125%;*/
			/*}*/
			/*.submit img{*/
				/*width: 100%;*/
				/*height: 100%;*/
			/*}*/
			#name{
				background-color: #F2BC2E;
				border: 2px solid #E52B46;
				position: absolute;
				top:40.09375%;
				left: 10%;
				width: 55.46875%;
				height: 15.8%;
				border-radius: 6px;
			}
			#tel{
				background-color: #F2BC2E;
				border: 2px solid #E52B46;
				position: absolute;
				top:62.09375%;
				left: 10%;
				width: 55.46875%;
				height: 15.8%;
				border-radius: 6px;
			}
			.cha{
				position: absolute;
				top:21% ;
				left: 86%;
				width: 100%;
				height: 100%;
				display: none;
				z-index: 5;
			}
			.cha img{
				width: 5%;
				
			}
			.hezi{
				position: absolute;
				width: 100%;
				height: 100%;
				background-color: black;
				opacity: 0.7;
				z-index: 3;
				display: none;
			}
			#sbt{
				width: 56%;
				height: 17%;
				background-color: #F41D48;
				color: #fff;
				font-size: 21px;
				font-weight: 900;
				border-radius: 15px;
				border: 0;
				outline: none;
				position: absolute;
				right: 0;
				margin: 0 auto;
				top:90.09375%;
				left: -25.46875%;
				/*height: 17.28125%;*/
				/*width: 40.3125%;*/
			}
			.imgs .list1{
				/*position: absolute;*/
				/*z-index: 11;*/
				/*width: 73.4375%;*/
				/*position: absolute;*/
				/*top:10.5625%;*/
				/*left:13.28125%;*/
			}
			#aj{
				width: 73.4375%;
				position: absolute;
				top:20.5625%;
				left:13.28125%;
				z-index: 15;
				display: none;
			}

		</style>
	</head>

	<body>
		<div id="wrap">
			<div class="hezi"></div>
			<header>

				<div class="imgs">
						<img class="aj1" src="img/1.png" />
						<div id="aj">
							<table>
								<th>用户名</th>
								<th>电话</th>
								<th>分数</th>
							</table>
						</div>
						<img src="img/2.png"/>
						<img src="img/3.png" />
						<img src="img/5.png"/>
				</div>
				<div class="cha">
					<img src="img/x.png"/>
				</div>
				<div class="tiao1">
					<img src="img/tiaozhan.png" />
				</div>
				<div class="tiao2">
					<img src="img/sudu.png" />
				</div>
				<div class="tiao3">
					<img src="img/yingqu.png" />
				</div>
			</header>
			<section>
				
				<div class="begin">
					<img src="img/bengin.png" alt="" />
				</div>
				
				<div class="hand">
					<img src="img/small_shou.png" />
				</div>
				
				<div class="person">
					<img src="img/个人资料.png"/>
					<form action="index2.php" method="get" onsubmit="return checksubmit()">
						<input type="text" name="name" id="name" placeholder="姓名"><br>
						<input type="text" name="tel" id="tel" placeholder="电话">
						<input type="submit" value="提交并开始游戏" id="sbt">
</form>
				</div>
			</section>
			<footer>
				<div class="red">
					<img class="bc" src="img/4.png" />
					<div class="rules1">
						<img class="xun" src="img/shuqian.png" />
					</div>
					<div class="rules2">
						<img class="xun" src="img/rule1.png" />
					</div>
					<div class="rules3">
						<img class="xun" src="img/jiangpin1.png" />
					</div>
					<div class="rules4">
						<img class="xun" src="img/jiangquan2.png" />
					</div>
				</div>
			</footer>
		</div>
		
		<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			var imgBig = document.querySelectorAll(".imgs img");
			var imgSmall = document.querySelectorAll(".xun");
			var cha = document.querySelector(".cha");
			var hezi = document.querySelector(".hezi");
			var begin = document.querySelector(".begin img");
			var person = document.querySelector(".person");
			var aj= document.getElementById("aj");
			var rules1= document.querySelector(".rules1");
		for (var i = 0;i<imgSmall.length;i++) {


				imgSmall[i].index = i;
				imgSmall[i].addEventListener("touchstart",function(){

					for (var j =0;j<imgBig.length;j++) {
						imgBig[j].style.display = "none";
						hezi.style.display = "none";
					}
					imgBig[this.index].style.display ="block";
					cha.style.display = "block";
					hezi.style.display = "block";


				}) 
			}
	rules1.addEventListener("touchstart",function () {
		aj.style.display ="block";
		$.ajax({
			url:"shuqian_api.php",
			type:"get",
			dataType:"json",
			success:function (data) {
				if (data.err ==0){
					for (var i= 0;i<5;i++){

					}
				}
			}


		})







	})

			cha.addEventListener("touchstart",function(){
				
				for (var i = 0; i < imgBig.length; i++) {
					imgBig[i].style.display = "none";
					cha.style.display = "none";
					
				}
				hezi.style.display = "none";
				person.style.display = "none";
				aj.style.display ="none";
			})  
			begin.addEventListener("touchstart",function(){
				person.style.display = "block";
				cha.style.display = "block";
				hezi.style.display = "block";


				$.ajax({
					url:"shuqian_api.php",
					data:{
						type:"submit",
						openid:"openid",
						name:$("#name").val(),
						tel:$("#tel").val(),
					}
					type:"get",
					dataType:"json",
					success:function (data) {
						console.log(data)
					}

				})











			})


			function checksubmit() {
				if ($("#name").val() == "") {
					alert("请输入姓名");
					$("#name").focus();
					return false;
				} else if ($("#tel").val() == "") {
					alert("请输入电话");
					$("#tel").focus();
					return false;
				} else {
					return true;
				}
			}




		</script>
	</body>

</html>












