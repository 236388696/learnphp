<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>一起来数钱</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>
	<!-- 第一页 -->
	<div class="wrap">
		<img src="img/tiaozhan.png" class="tiaozhan tada animated" alt="">
		<img src="img/yinqu.png" class="yinqu swing animated" alt="">

		<img src="img/p1_btns_wrap.png" class="p1_btns_wrap" alt="">
		<img src="img/ranking.png" class="ranking" alt="">
		<img src="img/activity_rule.png" class="activity_rule" alt="">
		<img src="img/prize.png" class="prize" alt="">
		<img src="img/shiyong.png" class="shiyong" alt="">

		<img src="img/start_game.png" id="start" class="start_game animated infinite" alt="">
		<img src="img/shou.png" class="shou fadeOut animated infinite" alt="">
	</div>
	<!-- 用户信息 -->
	<div id="user_data">
		<img src="img/p1_from.png" class="p1_form" alt="">
		<input type="text" placeholder="姓名" id="name">
		<input type="text" placeholder="电话" id="tel">
		<img src="img/p1_sub.png" id="p1_sub" class="p1_sub" alt="">
		<img src="img/close.png" class="close" alt="">
	</div>
	
	<!-- 第二页 -->
	<div id="game">
		<img src="img/p2_kuang.png" class="p2_kuang" alt="">
		<img src="img/p2_txt1.png" id="p2_txt" alt="">
		<img src="img/p2_scoring.png" class="p2_scoring1" alt="">
		<img src="img/p2_scoring.png" class="p2_scoring2" alt="">
		<img src="img/p2_scoring.png" class="p2_scoring3" alt="">
		<img src="img/shizhong.png" class="shizhong" alt="">
		<img src="img/qian_sh.png" class="qian_sh" alt="">
		<img src="img/p2_qian.jpg" class="p2_qian" id="p2_qian" alt="" mark="1">
		<img src="img/p2_zhuan.png" class="p2_zhuan" alt="">
		<img src="img/p2_shou.png" class="p2_shou fadeOutUp animated infinite" alt="">
		<div class="time">
			<span class="count">0</span>
			<span class="count">0</span>
			<span class="count">0</span>
			<span class="clock">30</span>
		</div>
	</div>
	<div id="game_over">
		<img src="img/p3_acquire.png" class="p3_acquire">
		<p id="money_count">¥ <span class="shou_count">888</span></p>
		<p class="p3_txt">没办法! 你已经强到没有对手了</p>
		<div id="zhanji">我的辉煌战绩:¥<span class="shou_count">888</span> 当前排名:第<span class="shou_rank">99</span>位</div>
		<img src="img/p3_again.png" class="p3_again" alt="">
		<img src="img/p3_share_btn.png" class="p3_share_btn" alt="">

		<!-- 底部 -->
		<img src="img/p1_btns_wrap.png" class="p1_btns_wrap" alt="">
		<img src="img/ranking.png" class="ranking" alt="">
		<img src="img/activity_rule.png" class="activity_rule" alt="">
		<img src="img/prize.png" class="prize" alt="">
		<img src="img/shiyong.png" class="shiyong" alt="">
	</div>
	<!-- 排行榜 -->
	<div id="rank">
		<img src="img/ranking_bg.png" class="ranking_bg" alt="">
		<img src="img/close.png" class="close" alt="">
		<ul style="list-style: none;" id="rank_list">
			
		</ul>
	</div>
	<div id="rule">
		<img src="img/rule_bg.png" class="rule_bg" alt="">
		<img src="img/close.png" class="close" alt="">
		<div class="rule_txt">
				<h2 id="rule_title">活动规则</h2>
				<br>
				<br>
				<p>1、每人有多次游戏机会，但成绩只能提交一次，且提交之后不能更改!</p>
				<br>
				<p>2、提交成绩时要提供姓名及手机号码作为兑奖凭证，因用户本人未在规定时间内提供正确的手机号码造成的奖品损失，由用户个人承担。</p>
				<br>
				<p>3、活动时间为2016年5月11日-5月19日24:00，活动结束后将在“雾灵山庄”微信公布中奖名单。</p>
				<br>
				<p>4、获奖规则：系统将根据大家提交的成绩，按照由多到少的规则进行排行，排名第1的网友将获得一等奖，排名第2-第21位的网友将分获二等奖，以此类推</p>
				<br>
				<p>5、奖品的发放：活动结束后，将由工作人员与您取得联系，并将相应的卡券编号发送到您提供的手机号码上。</p>
		</div>
	</div>
	<div id="prize">
		<img src="img/rule_bg.png" class="rule_bg" alt="">
		<img src="img/close.png" class="close" alt="">
		<div class="rule_txt">
				<h2 id="rule_title">活动奖品</h2>
				<br>
				<br>
				<p>一等奖1人：价值1488元7号楼1晚豪华标间免费房券1张，并可享康体项目3折优惠；</p>
				<br>
				<p>二等奖20人：100元订房代金券每人1张，并可享康体项目4折优惠；</p>
				<br>
				<p>三等奖50人：50元订房代金券每人1张，并可享康体项目5折优惠。</p>
		</div>
	</div>
	<div id="shuoming">
		<img src="img/rule_bg.png" class="rule_bg" alt="">
		<img src="img/close.png" class="close" alt="">
		<div class="rule_txt">
				<h2 id="rule_title">奖券使用说明</h2>
				<br>
				<br>
				<p>1、奖品的使用：请务必至少提前一周致电010-81027788或81027799进行预约，并于入住时向前台服务人员出示您手机上收到的卡券编号即可使用（需同时验证获奖人姓名与手机号码）。</p>
				<br>
				<p>2、代金券仅适用于线下门市价入住客房消费使用，不适用于通过携程或微信等其他线上渠道预定使用。</p>
				<br>
				<p>3、免费房安排的房间将视当时酒店排房情况而定，如您所预约的时段预订已满，将与您协商调整入住时间。</p>
				<br>
				<p>4、免费房券及代金券不得用于除订房外其他产品消费，不得与酒店其他优惠折扣或礼券同时使用，且不予退换、兑换现金或找赎。</p>
				<br>
				<p>5、对于恶意刷奖者和作弊者，主办方有权取消其兑奖资格。</p>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/tween.js"></script>
	<script type="text/javascript" src="js/touch.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
