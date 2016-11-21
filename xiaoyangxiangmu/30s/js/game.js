$(document).on("touchmove",function (e) {
	e.preventDefault();
});
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var SCREEN_WIDTH = document.documentElement.clientWidth;
var SCREEN_HEIGHT = document.documentElement.clientHeight;
var start = false;
canvas.width = SCREEN_WIDTH;
canvas.height = SCREEN_HEIGHT;

loading({
	a19_bg: "img/19_bg.png",
	a19_begin: "img/19_qipaoxian.png",
	a19_ownCar: "img/19_ownCar.png",
	a19_deng1: "img/19_deng1.png",
	a19_deng2: "img/19_deng2.png",
	a19_deng3: "img/19_deng3.png",
	a19_deng4: "img/19_deng4.png",
	a20_zhangaiwu: "img/20_zhangaiwu.png",
	a20_caiLeft: "img/20_caiLeft.png",
	a20_carRight: "img/20_carRight.png",
	a20_zhangaiCai: "img/20_zhangaiCai.png"
}, {
	complete: main
});

function rand(min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

function checkP(obj1, obj2) {
	if(Math.abs(obj1.x + obj1.w / 2 -3- (obj2.x + obj2.w / 2)) <= obj1.w / 2 + obj2.w / 2 && Math.abs(obj1.y + obj1.h / 2-3 - (obj2.y + obj2.h / 2)) <= obj1.h / 2 + obj2.h / 2) {
		return true;
	} else {
		return false;
	}
}

function checkP1(obj1, obj2) {
	if(Math.abs(obj1.x + obj1.w / 3 - (obj2.x + obj2.w / 3)) <= obj1.w / 3 + obj2.w / 3 && Math.abs(obj1.y + obj1.h / 2 - (obj2.y + obj2.h / 2)) <= obj1.h / 2 + obj2.h / 2) {
		return true;
	} else {
		return false;
	}
}

var scrollY0 = 0;
var scrollY = 0;
var score = 0;

function main(obj) {
	//车
	var carOwn = {
			img: obj.a19_ownCar,
			w: SCREEN_WIDTH * 0.14861,
			h: SCREEN_WIDTH * 0.26388,
			x: (SCREEN_WIDTH - SCREEN_WIDTH * 0.14861) / 2,
			y: SCREEN_HEIGHT * 0.6
		};
		//起跑线
	var begin = {
		img: obj.a19_begin,
		w: SCREEN_WIDTH * 0.82,
		h: SCREEN_WIDTH * 0.118,
		x: SCREEN_WIDTH * 0.09,
		y: SCREEN_HEIGHT * 0.52
	};

	//小障碍物
	var dikes = [];

	function Dike() {
		this.img = obj.a20_zhangaiwu;
		this.w = SCREEN_WIDTH * 0.076388;
		this.h = SCREEN_WIDTH * 0.076388;
		this.x = rand(SCREEN_WIDTH * 0.14861, SCREEN_WIDTH - SCREEN_WIDTH * 0.14861);
		this.y = 0;
	}
	Dike.prototype.draw = function() {
		ctx.drawImage(this.img, this.x, this.y, this.w, this.h);
	};
	Dike.prototype.canClear = function() {
			if(this.y >= SCREEN_HEIGHT) {
				return true;
			} else {
				return false;
			}
		};
		//车障碍物
	var EnemyCars = [];

	function EnemyCar(object1) {
		this.img = object1;
		this.w = SCREEN_WIDTH * 0.133333;
		this.h = SCREEN_WIDTH * 0.2888888;
		this.x = rand(SCREEN_WIDTH * 0.14861, SCREEN_WIDTH - SCREEN_WIDTH * 0.14861 - 30);
		this.y = -SCREEN_WIDTH * 0.2888888;
		this.bool = true;
	}
	EnemyCar.prototype.draw = function() {
		ctx.drawImage(this.img, this.x, this.y, this.w, this.h);
	};
	EnemyCar.prototype.canClear = function() {
		if(this.y >= SCREEN_HEIGHT) {
			return true;
		} else {
			return false;
		}
	};
	ctx.clearRect(0, 0, SCREEN_WIDTH, SCREEN_HEIGHT)
	ctx.drawImage(obj.a19_bg, 0, scrollY, SCREEN_WIDTH, SCREEN_HEIGHT);
	ctx.drawImage(obj.a19_bg, 0, scrollY - SCREEN_HEIGHT, SCREEN_WIDTH, SCREEN_HEIGHT);
	ctx.drawImage(begin.img, begin.x, begin.y + scrollY0, begin.w, begin.h);
	ctx.drawImage(carOwn.img, carOwn.x, carOwn.y, carOwn.w, carOwn.h);
	var bool = false;
	function drawAll() {
		if(start) {
			ctx.clearRect(0, 0, SCREEN_WIDTH, SCREEN_HEIGHT);
			if(bool) {
				scrollY += 10;
			} else {
				scrollY += 4;
			}
			scrollY0 += 4;
			var timer5 = null;
			$(".speedUp").on("touchstart", function(e) {
				e.preventDefault();
				bool = true;
				clearInterval(timer5)
				timer5 = setInterval(function() {
					bool = false;
				}, 2000)
			});
			if(scrollY >= SCREEN_HEIGHT) {
				scrollY = 0;
			}
			ctx.clearRect(0, 0, SCREEN_WIDTH, SCREEN_HEIGHT)
			ctx.drawImage(obj.a19_bg, 0, scrollY, SCREEN_WIDTH, SCREEN_HEIGHT);
			ctx.drawImage(obj.a19_bg, 0, scrollY - SCREEN_HEIGHT, SCREEN_WIDTH, SCREEN_HEIGHT);
			//起跑线
			ctx.drawImage(begin.img, begin.x, begin.y + scrollY0, begin.w, begin.h);
			//车
			ctx.drawImage(carOwn.img, carOwn.x, carOwn.y, carOwn.w, carOwn.h);
			//障碍物
			if(scrollY % 200 == 0) {
				var dike = new Dike();
				dikes.push(dike)
			}
			for(var i = 0; i < dikes.length; i++) {
				var dike = dikes[i];
				dike.draw();
				if(bool){
					dike.y += 10;
				}else{
					dike.y += 4;
				}

				if(dike.canClear()) {
					dikes.splice(i, 1);
					score++;
					i--;
				}
			}
			var arr = [obj.a20_caiLeft, obj.a20_zhangaiCai, obj.a20_carRight]
				//障碍车
			if(scrollY % 6000 == 0) {
				var enemyCar = new EnemyCar(obj.a20_zhangaiCai);
				EnemyCars.push(enemyCar);
			}

			for(var j = 0; j < EnemyCars.length; j++) {
				var enemyCar = EnemyCars[j];
				enemyCar.draw();
				if(bool){
					enemyCar.y += 10;
				}else{
					enemyCar.y += 4;
				}
				if(enemyCar.canClear()) {
					EnemyCars.splice(j, 1);
					score++;
					j--;
				}
			}
			var rand0 = rand(0, 2);
			for(var z = 0; z < EnemyCars.length; z++) {
				if(EnemyCars[z].bool) {
					if(EnemyCars[z].y >= SCREEN_HEIGHT * 0.2) {
						if(rand0 == 2) {
							enemyCar.w = SCREEN_WIDTH * 0.172222;
							enemyCar.img = arr[2];
							EnemyCars[z].bool = false;
						} else if(rand0 == 1) {
							enemyCar.img = arr[1];
							EnemyCars[z].bool = false;
						} else if(rand0 == 0) {
							enemyCar.w = SCREEN_WIDTH * 0.172222;
							enemyCar.img = arr[0];
							EnemyCars[z].bool = false;
							EnemyCars[z].x -= SCREEN_WIDTH * 0.04;
						}
					}

				}
			}

		}
		$(".score").text(score);
		//判断障碍物碰撞	
		for(var i = 0; i < dikes.length; i++) {
			if(checkP(dikes[i], carOwn)) {
				start = false;
				clearInterval(tiemr2);
				if(score >= 30){
					$("#success").fadeIn(500);
				}else{
					$("#fail").fadeIn(500);
				}
				$("#game").fadeOut(500);
			}
		}
		//判断障碍车碰撞
		for(var j = 0; j < EnemyCars.length; j++) {
			if(checkP1(EnemyCars[j], carOwn)) {
				start = false;
				clearInterval(tiemr2);
				if(score >= 30){
					$("#success").fadeIn(500);
				}else{
					$("#fail").fadeIn(500);
				}
				$("#game").fadeOut(500);
			}
		}
		window.requestAnimationFrame(drawAll);
	}
	drawAll();
	var timer3 = null;
	$(".game_left").on("touchstart", function(e) {
		e.preventDefault();
		carOwn.x -= 10;
		if(carOwn.x <= SCREEN_WIDTH * 0.09305555) {
			carOwn.x = SCREEN_WIDTH * 0.09305555 - 10;
		}
		timer3 = setInterval(function() {
			if(carOwn.x <= SCREEN_WIDTH * 0.09305555) {
				carOwn.x = SCREEN_WIDTH * 0.09305555 - 10;
			} else {
				carOwn.x -= 10;
			}
		}, 20)
	})
	$(".game_left").on("touchend", function() {
		clearInterval(timer3)
	});
	var timer4 = null;
	$(".game_right").on("touchstart", function(e) {
		e.preventDefault();
		carOwn.x += 10;
		if(carOwn.x >= SCREEN_WIDTH * 0.9097 - carOwn.w) {
			carOwn.x = SCREEN_WIDTH * 0.9097 - carOwn.w;
		}
		timer4 = setInterval(function() {
			if(carOwn.x >= SCREEN_WIDTH * 0.9097 - carOwn.w) {
				carOwn.x = SCREEN_WIDTH * 0.9097 - carOwn.w;
			} else {
				carOwn.x += 10;
			}
		}, 20)
	});
	$(".game_right").on("touchend", function() {
		clearInterval(timer4)
	})
}
//红绿灯的定时器
var x = 1;
var timer = null;
timer = setInterval(function() {
	x++;
	if(x == 4) {
		start = true;
		clearInterval(timer)
	}
	$(".game_deng").attr("src", "img/19_deng" + x + ".png");
}, 500);
setTimeout(function() {

}, 1500);
setTimeout(function() {
	$("#deng img").animate({
		top: "-15%",
		opacity: "0"
	}, 500);
	$(".ready img").animate({
		top: "30%",
		opacity: "0"
	})
}, 1800);
$(document).on("touchmove", function(e) {
	e.preventDefault();
});
var t = 30;
var timer2 = null;
tiemr2 = setInterval(function() {
	t--;
	if(t <= 0) {
		t = 0;
		clearInterval(timer2);
		start = false;
		$("#game").fadeOut(500);
		$("#success").fadeIn(500);
	}
	if(t < 10) {
		$(".second").html("0" + t)
	} else {
		$(".second").html(t)
	}
}, 1000);
$(".fail_agin").on("touchstart",function(){
	window.location.assign("index.php")
});

$(".fail_paihang").on("touchstart",function () {
	$("#bangdan").show();
	$.ajax({
		url: "php/a30s_api.php",
		type: "post",
		dataType: "json",
		data: {
			score : score,
			openid :openid
		},
		success: function (data) {
			if (data.err == 0){
				$("#bd_ul").empty();
				for(var i = 0; i < data.num;i++){
					var liObj = $("<li><span class='bd_mingci'>"+(i+1)+"</span><span class='bd_name'>"+ data.nickname[i]+"</span><span class='bd_score'>"+data.score[i]+"</span></li>");
					$("#bd_ul").append(liObj);
				}
			}
		}
	})
});
$("#bd_cha").on("touchstart",function(){
	$("#bangdan").hide();
});

$(".success_invite").on("touchstart",function(){
	$("#invite").show();
	$(".invite_hezi").show();
	var openid = null;
	$.ajax({
		url:"php/a30s_api.php",
		type:"post",
		dataType:"json",
		data:{
			type:open
		},
		success:function (data) {
			openid=data.openid;
		}
	});
	
	$.ajax({
		url:"php/sample.php",
		type:"post",
		data:{
			openid:openid
		}
	});

});








