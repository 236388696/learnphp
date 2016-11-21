<?php
	$openid = $_GET["openid"];
	$nickname = $_GET["nickname"];
	echo "<script>var openid ='{$openid}';var nickname = '{$nickname}';</script>"
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/game.css" />
	</head>
	<body>
		<div id="fail">
			<p class="fail_go">你只闯过了<span class="score" ></span>个障碍物</p>
			<p class="fail_win">胜出全国<span></span>的玩家</p>
			<img class="fail_agin" src="img/5_agin.png"/>
			<img class="fail_paihang" src="img/5_paihang.png"/>
		</div>
		<div id="success">
			<p class="fail_go">你共闯过了<span class="score">0</span>个障碍物</p>
			<p class="fail_win">胜出全国<span>0</span>的玩家</p>
			<img class="success_invite" src="img/5_invite.png"/>
			<img class="fail_paihang" src="img/5_paihang.png"/>
		</div>
		<div id="invite">
			<img class="invite_cartoon" src="img/5_cartoon.png"/>
			<div class="hezi"></div>
		</div>
		<div id="game">
			<div id="deng">
				<img class="game_deng" src="img/19_deng1.png" alt="" />
			</div>
			<div class="ready">
				<img src="img/19_ready.png" />

			</div>
			<div class="clock">
				<img class="game_clock" src="img/19_clock.png" />
				<div class="game_time">
					<span>00</span>: <span>00</span>: <span class="second">30</span>
				</div>
			</div>
			<img class="speedUp" src="img/19_speedUp.png" />
			<img class="game_left" src="img/19_left.png" />
			<img class="game_right" src="img/19_right.png" />
			<canvas id="canvas" width="500" height="500"></canvas>
		</div>
		<div id="bangdan">
			<div id="bd_bg">
				<ul id="bd_ul">
					<!--<li>-->
					<!--<span class="bd_mingci">0</span>-->
					<!--<span class="bd_name">0</span>-->
					<!--<span class="bd_score">0</span>-->
					<!--</li>-->
				</ul>
				<img src="img/cha.png" alt="" id="bd_cha">
			</div>
		</div>
		<script src="js/loading.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/game.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>