$(function () {
	$('#start').on('touchstart', function(event) {
		$('#user_data').show();
		/* Act on the event */
	});
	$('#p1_sub').on('touchstart', function(event) {
		event.preventDefault();
		var nameReg = /[\u4e00-\u9ef8]{2,4}/g;
		var telReg = /^1[3458][0-9]{9}$/;
		if (!nameReg.test($("#name").val()) || !telReg.test($("#tel").val())) {
			alert("请正确填写");
		}else {
			$.ajax({
				url: 'php/shuqian_api.php',
				type: 'GET',
				dataType: 'json',
				data: {},
				success: function (responseObj) {
					// console.log(responseObj);
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
						}222
						$('#p2_txt').attr('src', 'img/p2_txt'+i+'.png');
					}
					donghua();
				});
			}
			donghua();
		}
	});

	$('.ranking').on('touchstart', function(event) {
		event.preventDefault();
		$('#rank').show();
		$.ajax({
			url: 'php/shuqian_api.php',
			type: 'GET',
			dataType: 'json',
			data: {},
			success: function (responseObj) {
				
			}
		});
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
	// 	alert("滑动");
	// 	/* Act on the event */
	// });
	// 阻止屏幕跟着滑动, 所以把背景的默认事件关了
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
					if (time < 10) {
						$(".clock").css('left', '73%');
					}
					if (time == 0) {
						clearInterval(timer);
						$.ajax({
							url: 'php/shuqian_api.php',
							type: 'GET',
							dataType: 'json',
							data: {},
							success: function (responseObj) {
								
							}
						});	
					}
					$('.clock').text(time);
				},1000);
			}

			var newImg = $('<img src="img/p2_qian.jpg" class="p2_qian" id="p2_qian">');
			$(this).before(newImg);
			addSwipeUp("#p2_qian");
			$(this).animate({top: 0, width: 0, left: $('#game').width()/2}, 500, "easeOutQuad", function () {
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

