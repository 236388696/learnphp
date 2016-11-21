$(function () {
	$('#start').on('touchstart', function(event) {
		$('#user_data').show();
		/* Act on the event */
	});
	$('#p1_sub').on('touchstart', function(event) {
		event.preventDefault();
		console.log(openid);
		$.ajax({
			url:"shuqian_api.php",
			type:"get",
			dataType:"json",
			data:{
				type: "submit",
				openid: openid,
				name : $("#name").val(),
				tel:$("#tel").val()
			},
			success:function (data) {
				console.log(data);
			}
		});
		
		$(".wrap").hide();
		$('#user_data').hide();
		$('#game').show();
		var i = 0;
		var frameNum = 0;
		function donghua () {
			window.requestAnimationFrame(function () {
				frameNum++;
				
				if (frameNum % 40 == 0) {
					i++;
					if (i > 3) {
						i = 1;
					}
					$('#p2_txt').attr('src', 'img/p2_txt'+i+'.png');
				}
				donghua();
			});
		}
		donghua();
	});

	$('.ranking').on('touchstart', function(event) {
		event.preventDefault();
		$('#rank').show();
	});

	$('.activity_rule').on('touchstart', function(event) {
		event.preventDefault();
		$("#rule").show();
	});

	$('.prize').on('touchstart', function(event) {
		event.preventDefault();
		$("#prize").show();
	});

	$('.shiyong').on('touchstart', function(event) {
		event.preventDefault();
		$("#shuoming").show();
	});

	$('.close').on('touchstart', function(event) {
		$(this).parent().hide();
	});

	touch.on('#p2_qian', 'touchstart', function(ev){
		ev.preventDefault();
	});

	// $('#p2_qian').on('touchmoved', '.selector', function(event) {
	// 	alert("����");
	// 	/* Act on the event */
	// });
	// ��ֹ��Ļ���Ż���, ���԰ѱ�����Ĭ���¼�����
	touch.on('#game', 'touchstart', function(ev){
			ev.preventDefault();
			
		});
	var score = 0;
	function addSwipeUp (target) {
		touch.on(target, 'swipeup', function(ev){
			ev.preventDefault();
			if ($(this).attr("mark") == 1) {
				clearInterval(timer);
				var time = 30;
				var timer = setInterval(function () {
					time--;
					if (time == 0) {
						clearInterval(timer);
						$('#game').hide();
						$('#game_over').show();
						$('.shou_count').text(score*100);
						$.ajax({
							url:"shuqian_api.php",
							type:"get",
							data:{
								type:"score",
								score:score,
								openid:openid
							},
							dataType:"json",
							success:function (data) {
								console.log(data);
							},
							//成功失败结束都会调用complete函数
							complete:function (a,b) {
console.log(b);
							}
						})


					}
					$('.clock').text(time);
				},1000);
			}

			var newImg = $('<img src="img/p2_qian.jpg" class="p2_qian" id="p2_qian">');
			$(this).before(newImg);
			addSwipeUp("#p2_qian");
			$(this).animate({top: 0, width: 0, left: $('#game').width()/2}, 800, function () {
				score++;
				$('.count').eq(0).text(Math.floor(score / 100));
				$('.count').eq(1).text(Math.floor(score % 100 / 10));
				$('.count').eq(2).text(score % 10);
				$(this).remove();
			});
		});
	}
	addSwipeUp("#p2_qian");
})

