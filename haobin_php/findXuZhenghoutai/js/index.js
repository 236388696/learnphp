var bgword = document.getElementsByClassName("bg2")[0];
var bg = document.getElementsByClassName("bg1")[0];
//var bgm = document.getElementsByClassName("bgm")[0];
var content = document.getElementsByClassName("content")[0];
var content1 = document.getElementsByClassName("content1")[0];
var content2 = document.getElementsByClassName("content2")[0];
var content3 = document.getElementsByClassName("content3")[0];
var musicon = document.getElementsByClassName("music")[0];
var musicoff = document.getElementsByClassName("musicoff")[0];
var musicon2 = document.getElementsByClassName("music2")[0];
var musicoff2 = document.getElementsByClassName("musicoff2")[0];
var ps = document.querySelectorAll(".content1>p");
var ps3 = document.querySelectorAll(".content3>p");
var starR = document.getElementsByClassName("starbgr")[0];
var superman = document.getElementsByClassName("superman")[0];
var superxz = document.getElementsByClassName("superxz")[0];
var starkeng = document.getElementsByClassName("starkeng")[0];
var phone = document.getElementsByClassName("phone")[0];
var suiphone = document.getElementsByClassName("phone_boom")[0];
var over_sui = document.getElementsByClassName("over_phone_boom")[0];
var starbgr = document.getElementsByClassName("starbgr")[0];
var starbgl = document.getElementsByClassName("starbgl")[0];
var moon = document.getElementsByClassName("moon")[0];
var starkeng = document.getElementsByClassName("starkeng")[0];
var chip1 = document.getElementsByClassName("chip1")[0];
var chip2 = document.getElementsByClassName("chip2")[0];
var chip3 = document.getElementsByClassName("chip3")[0];
var chip4 = document.getElementsByClassName("chip4")[0];
var chip5 = document.getElementsByClassName("chip5")[0];
var chip6 = document.getElementsByClassName("chip6")[0];
var chip7 = document.getElementsByClassName("chip7")[0];
var chip8 = document.getElementsByClassName("chip8")[0];
var chip1_1 = document.getElementsByClassName("chip1_1")[0];
var chip2_2 = document.getElementsByClassName("chip2_2")[0];
var chip3_3 = document.getElementsByClassName("chip3_3")[0];
var chip4_4 = document.getElementsByClassName("chip4_4")[0];
var chip5_5 = document.getElementsByClassName("chip5_5")[0];
var chip6_6 = document.getElementsByClassName("chip6_6")[0];
var chip7_7 = document.getElementsByClassName("chip7_7")[0];
var chip8_8 = document.getElementsByClassName("chip8_8")[0];
var chipto1 = document.getElementsByClassName("chipto1")[0];
var chipto2 = document.getElementsByClassName("chipto2")[0];
var chipto3 = document.getElementsByClassName("chipto3")[0];
var chipto5 = document.getElementsByClassName("chipto5")[0];
var chipto6 = document.getElementsByClassName("chipto6")[0];
var chipto7 = document.getElementsByClassName("chipto7")[0];
var chipto8 = document.getElementsByClassName("chipto8")[0];
var xzchip1 = document.getElementsByClassName("xzchip1")[0];
var xzchip2 = document.getElementsByClassName("xzchip2")[0];
var xzchip3 = document.getElementsByClassName("xzchip3")[0];
var xzchip4 = document.getElementsByClassName("xzchip4")[0];
var xzchip5 = document.getElementsByClassName("xzchip5")[0];
var xzchip6 = document.getElementsByClassName("xzchip6")[0];
var xzchip7 = document.getElementsByClassName("xzchip7")[0];
var xzchip8 = document.getElementsByClassName("xzchip8")[0];
var begin = document.getElementsByClassName("begin")[0];
var guan = document.getElementsByClassName("guan")[0];
var shijian = document.getElementsByClassName("shijian")[0];
var person = document.getElementsByClassName("person")[0];
var zhanlipin = document.getElementsByClassName("zhanlipin")[0];
var suipian = document.getElementsByClassName("suipian")[0];
var guanggao = document.getElementsByClassName("guanggao")[0];
var sup = document.getElementsByClassName("sup")[0];
var choujiang = document.getElementsByClassName("choujiang")[0];
var kscj = document.getElementsByClassName("kscj")[0];
var huojiang = document.getElementsByClassName("huojiang")[0];
var weihuojiang = document.getElementsByClassName("weihuojiang")[0];
var shibai = document.getElementsByClassName("sb")[0];
var jiang = document.getElementsByClassName("jiang")[0];
var tijiao = document.getElementsByClassName("tijiao")[0];
var name = document.getElementsByClassName("name")[0];
var tele = document.getElementsByClassName("telephone")[0];
var shuoming = document.getElementsByClassName("shuoming")[0];
var jieshao = document.getElementsByClassName("js")[0];
var disapear = document.getElementsByClassName("X")[0];
var shuoming1 = document.getElementsByClassName("shuoming1")[0];
//定时器定义
var timer = null;
var timer1 = null;
var timer2 = null;
//总图片数
var n = 0;
var time = 0; //游戏前动画时间
var imgindex = 0; //超人披风切换
var playmusic = true;
var superarr = ["img/super_body1.png", "img/super_body2.png", "img/super_body3.png"]; //超人披风图片数组
//所有图片数组
var pic_load = ["img/xuzheng_succ_kuang.png", "img/xuzheng_kuang.png", "img/xuzheng.png", "img/vivo_mobile.png", "img/up.png", "img/tietou.png", "img/super_head.png", "img/super_glasses.png", "img/super_body3.png", "img/super_body2.png", "img/super_body1.png", "img/suipian_eight.png", "img/suipian_seven.png", "img/suipian_six.png", "img/suipian_five.png", "img/suipian_four.png", "img/suipian_three.png", "img/suipian_two.png", "img/suipian_one.png", "img/star11.png", "img/star10.png", "img/star9.png", "img/star8.png", "img/star7.png", "img/star6.png", "img/star5.png", "img/star4.png", "img/star3.png", "img/star2.png", "img/star1.png", "img/star.png", "img/songs_p.png", "img/ribbon5.png", "img/ribbon4.png", "img/ribbon3.png", "img/ribbon2.png", "img/ribbon1.png", "img/phone.png", "img/person_kuang.png", "img/one_pic3.png", "img/one_pic2.png", "img/one_pic1.png", "img/one_guan_pic.png", "img/music_on.png", "img/music_off.png", "img/music_o.png", "img/loading_txt.png", "img/loading_bg.png", "img/kuang_bg.png", "img/kuang_bg.jpg", "img/game_info_bt.png", "img/game_info_bg.png", "img/CSSatyr.png", "img/color_yan.png", "img/baobei.png", "img/bg.jpg", "img/chip1.png", "img/chip2.png", "img/chip3.png", "img/chip4.png", "img/chip5.png", "img/chip6.png", "img/chip7.png", "img/chip8.png", "img/word_bg.png", "img/loading_xuzheng.png"];
//取消鼠标移动默认事件
document.addEventListener("mousewheel", function() {
		event.preventDefault();
	})
	//随机数函数
function rand(min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}
//图片加载方法
for(var i = 0; i < pic_load.length; i++) {
	var loding_pic = new Image();
	loding_pic.src = pic_load[i];
	loding_pic.onload = function() {
		n++;
		if(n == pic_load.length) {
			//图片加载完成，加载界面消失，出现游戏前动画
			content.style.display = "none";
			content1.style.display = "block";
			//音乐图片点击切换
			musicon.addEventListener("touchstart", function() {
				musicon.style.display = "none";
				bgm.style.display = "none";
				musicoff.style.display = "block";
			}, false);
			musicoff.addEventListener("touchstart", function() {
				musicoff.style.display = "none";
				musicon.style.display = "block";
				bgm.style.display = "block";
			}, false);
			//游戏前动画定时
			clearInterval(timer);
			timer = setInterval(function() {
				time++;
				//文字消失
				if(time == 12) {
					for(var k = 0; k < ps.length; k++) {
						ps[k].style.display = "none";
					}
				}
				//星星、超人移动
				if(time == 13) {
					starR.style.top = 300 + "px";
					starR.style.left = 300 + "px";
					timer1 = setInterval(function() {
						if(imgindex == 3) {
							imgindex = 0;
						}
						superman.src = superarr[imgindex];
						imgindex++;
					}, 100);
					superxz.style.left = 35 + "px";
					superxz.style.top = 170 + "px";
					starkeng.style.left = 70 + "px";
					starkeng.style.top = 500 + "px";
				}
				//超人飞出屏幕
				if(time == 15) {
					superxz.style.left = -500 + "px";
					superxz.style.top = -20 + "px";
				}
				//手机出现
				if(time == 17) {
					phone.style.transform = "scale(1) rotate(360deg)";
					clearInterval(timer1);
				}
				//碎手机出现
				if(time == 19) {
					suiphone.style.opacity = 1;
					starbgl.style.display = "none";
					starbgr.style.display = "none";
					starkeng.style.opacity = 0;
					starkeng.style.top = 200 + "px";
					starkeng.style.left = 10 + "px";
					moon.style.display = "none";
				}
				//手机消失
				if(time == 20) {
					phone.style.display = "none";
				}
				//碎片分开，碎片上出现人头，出现星球
				if(time == 22) {
					chip1.style.right = -30 + "px";
					chip1.style.top = -90 + "px";
					chip1.style.transform = "rotate(60deg)";
					chip1_1.style.transform = "scale(0.8)";
					chip2.style.left = -50 + "px";
					chip2.style.top = -60 + "px";
					chip2.style.transform = "rotate(-30deg)";
					chip2_2.style.transform = "scale(0.8)";
					chip3.style.right = 30 + "px";
					chip3.style.top = -10 + "px";
					chip3_3.style.transform = "scale(0.8)";
					chip4.style.left = -60 + "px";
					chip4.style.transform = "rotate(60deg)";
					chip4_4.style.transform = "scale(0.8)";
					chip5_5.style.transform = "scale(0.8)";
					chip6.style.right = -60 + "px";
					chip6.style.top = 150 + "px";
					chip6_6.style.transform = "scale(0.8)";
					chip7.style.left = -50 + "px";
					chip7_7.style.transform = "scale(0.8)";
					chip8.style.right = -50 + "px";
					chip8_8.style.transform = "scale(0.8)";
					starkeng.style.opacity = 1;
					moon.style.opacity = 1;
					chipto1.style.opacity = 1;
					chipto2.style.opacity = 1;
					chipto3.style.opacity = 1;
					chipto5.style.opacity = 1;
					chipto6.style.opacity = 1;
					chipto7.style.opacity = 1;
					chipto8.style.opacity = 1;
					xzchip1.style.opacity = 1;
					xzchip2.style.opacity = 1;
					xzchip3.style.opacity = 1;
					xzchip4.style.opacity = 1;
					xzchip5.style.opacity = 1;
					xzchip6.style.opacity = 1;
					xzchip7.style.opacity = 1;
					xzchip8.style.opacity = 1;
				}
				//碎片旋转消失
				if(time == 24) {
					var move1 = null;
					clearInterval(move1);
					move1 = setInterval(function() {
						suiphone.style.transform = "rotate(" + 30 + "deg)"
						suiphone.style.opacity = 0;
					}, 100)
				}
				//出现点击开始
				if(time == 25) {
					begin.style.display = "block";
					begin.addEventListener("touchend", function() {
						content1.style.display = "none";
						bg.style.display = "block";
						bgword.style.display = "none";
						content2.style.display = "block";
						//点击后设置游戏时间，调用游戏函数
						daojishi = 60.00;
						checkpoint();
						clearInterval(timer2)
							//每10毫秒，游戏时间减少0.01秒
						timer2 = setInterval(function() {
							daojishi -= 0.01;
							shijian.innerHTML = daojishi.toFixed(2);
							//游戏时间到，结束游戏
							if(daojishi <= 0) {
								clearInterval(timer2);
								shibai.style.display = "block";
								shuoming1.addEventListener("touchend", function() {
									jieshao.style.display = "block";
									disapear.addEventListener("touchend", function() {
										jieshao.style.display = "none";
									}, false);
								}, false);
							}
						}, 10);
					}, false);
				}
			}, 1000); //1000
			//游戏初始块行数
			var num = 2;
			var arr = ["第一关 水星", "第二关 金星", "第三关 地球", "第四关 火星", "第五关 木星", "第六关 土星", "第七关 天王星", "第八关 海王星"];
			var arrsup = ["img/suipian_one.png", "img/suipian_two.png", "img/suipian_three.png", "img/suipian_four.png", "img/suipian_five.png", "img/suipian_six.png", "img/suipian_seven.png", "img/suipian_eight.png"];
			var arrText = ["Funtouch OS系统", "双2.5D弧面玻璃", "知性美颜系统", "眼球识别加密系统", "1300万像素镜头", "Hi-Fi音质耳放", "八核1.7GHz处理器", "PDAF快速相位对焦系统"];
			var arrJiang = ["港囧电影票一套", "vivo充电宝一个", "vivo耳机一个", "徐峥或赵薇签名照一张", "vivo X5pro一台"];
			//游戏函数
			function checkpoint() {
				//关显示
				guan.innerHTML = arr[num - 2];
				//过关图片显示
				sup.src = arrsup[num - 2];
				//过关文字显示
				guanggao.innerHTML = arrText[num - 2];
				//过关获得碎片数
				suipian.innerHTML = "你获得" + (num - 1) + "/8碎片";
				//循环创建游戏块
				for(var i = 0; i < (num) * (num); i++) {
					var div = document.createElement("div");
					div.style.width = person.offsetWidth / (num) - 1 + "px";
					div.style.height = person.offsetHeight / (num) - 1 + "px";
					div.innerHTML = "<img class='head' src='img/baobei.png' alt='' />";
					person.appendChild(div);
				}
				//随机产生一个徐峥
				var rand1 = rand(0, (num) * (num) - 1);
				var persons = document.querySelectorAll(".person>div");
				persons[rand1].firstElementChild.src = "img/xuzheng.png";
				//				persons[rand1].firstElementChild.src = "img/star.png";
				//过关显示
				persons[rand1].addEventListener("touchstart", function() {
					zhanlipin.style.display = "block";
					//游戏时间加1秒
					daojishi += 1;
					var timeout1 = setTimeout(function() {
						//1秒后消失
						zhanlipin.style.display = "none";
						//循环删除游戏块
						for(var j = 0; j < num * num; j++) {
							persons[j].remove(persons[j]);
						}
						//下一关
						if(num < 9) {
							num++;
							checkpoint();
						} else if(num == 9) {
							//通关
							clearInterval(timer2);
							content2.style.display = "none";
							bg.style.display = "none";
							bgword.style.display = "block";
							var time1 = 0;
							//过关后动画
							var time4 = setInterval(function() {
								time1++;
								if(time1 == 1) {
									content3.style.display = "block";
								}
								//删除文字，出现碎手机
								if(time1 == 6) {
									for(var i = 0; i < ps3.length; i++) {
										ps3[i].style.display = "none";
									}
									over_sui.style.display = "block";
								}
								//碎手机消失，出现抽奖界面
								if(time1 == 9) {
									over_sui.style.display = "none";
									choujiang.style.display = "block";
									shuoming.addEventListener("touchend", function() {
										jieshao.style.display = "block";
										disapear.addEventListener("touchend", function() {
											jieshao.style.display = "none";
										}, false);
									}, false);
								}
							}, 1000); //1000
							//点击抽奖
							kscj.addEventListener("touchend", function() {
								choujiang.style.display = "none";
								var rand2 = rand(0, 3);
								var rand2 = 0;
								//中奖
								if(rand2 == 0) {
									huojiang.style.display = "block";
									var randj = rand(0, 4);
									jiang.innerHTML = arrJiang[randj];
									tijiao.addEventListener("touchend", function() {
										$.ajax({
											url: "index.php",
											type: "get",
											data: {
												prize: arrJiang[randj],
												name: $(".name").val(),
												tele: $(".telephone").val()
											},
											success: function(res) {
												var res = JSON.parse(res);
												alert("恭喜" + res.name + "用户，" + res.msg + "!");
											}
										})
									}, false);
								} else {
									//未中奖
									weihuojiang.style.display = "block";
								}
							}, false);
						}
					}, 1000); //1000
				}, false);
			}
		}
	}
}