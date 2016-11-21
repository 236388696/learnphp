<?php
$name = @$_GET["name"];
$tel = @$_GET["tel"];
echo $name;
echo $tel;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
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

        .wrap {
            overflow: hidden;
            width: 100%;
            height: 100%;
            background: url(img/bc2.png) no-repeat;
            background-size: 100% 100%;
        }

        header {
            position: relative;
            width: 100%;
            height: 31.69014085%;
        }

        .head img {
            position: absolute;
            top: 40.27777778%;
            left: 10%;
            width: 82.5%;
            display: none;
        }

        .head .head1 {
            display: block;
        }

        section {
            width: 100%;
            height: 11.44366197%;
            position: relative;
        }

        .middle1 {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url(img/sore.png) no-repeat;
            background-size: 11.5625% 80.76923077%;
            background-position: 22.03125% 0;
            z-index: 2;
        }

        .middle2 {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url(img/sore.png) no-repeat;
            background-size: 11.5625% 80.76923077%;
            background-position: 37.25% 0;
            z-index: 2;
        }

        .middle3 {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url(img/sore.png) no-repeat;
            background-size: 11.5625% 80.76923077%;
            background-position: 52.625% 0;
            z-index: 2;
        }

        .clocks {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url(img/click.png) no-repeat;
            background-size: 15.625% 69.23076923%;
            background-position: 76.25% 10%;
            z-index: 2;
            color: #987A56;
        }

        .clocks span {
            position: absolute;
            left: 68.95%;
            top: 30%;
            font-size: 23px;
        }

        .middle1 span {
            position: absolute;
            left: 22.95%;
            top: 28%;
            font-size: 30px;
            z-index: 8;
            color: white;
        }

        .middle2 span {
            position: absolute;
            left: 36.95%;
            top: 28%;
            font-size: 30px;
            z-index: 8;
            color: white;
        }

        .middle3 span {
            position: absolute;
            left: 50.95%;
            top: 28%;
            font-size: 30px;
            z-index: 8;
            color: white;
        }

        footer {
            height: 56.86619718%;
            width: 100%;
            position: relative;
        }

        .money {
            margin-left: 20.46875%;
            width: 100%;
            height: 100%;
        }

        .money img {
            width: 56.71875%;
            height: 100%;
            position: absolute;
            top: 28%;
            z-index: 4;
        }

        .qiang {
            position: absolute;
            bottom: 0;
            z-index: 6;
        }

        .qiang img {
            width: 100%;
        }

        .hand {
            position: absolute;
            top: 45%;
            left: 63%;
            width: 100%;
            z-index: 6;

        }

        .hand img {
            width: 34.71875%;
        }
    </style>
</head>

<body>
<div class="wrap">
    <header>
        <div class="head">
            <img class="head1" src="img/2lei.png" />
            <img class="head2"  src="img/2you.png" />
            <img class="head3"  src="img/2yi.png" />
        </div>
    </header>
    <section>
        <div class="middle1">
            <span>0</span>
        </div>
        <div class="middle2">
            <span>0</span>
        </div>
        <div class="middle3">
            <span>0</span>
        </div>
        <div class="clocks ">
            <span>10</span>
        </div>
    </section>
    <footer>
        <div class="hand">
            <img src="img/bigshou.png" />
        </div>
        <div class="money">
            <img src="img/100yuan.png" />
        </div>
        <div class="qiang">
            <img src="img/qiang.png" />
        </div>
    </footer>
</div>
<script src="js/jquery-2.1.3.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    var span = document.querySelector(".clocks>span");
    var span1 = document.querySelector(".middle1>span");

    var score = 0;

    $(document).on("touchstart", function(e) {
        e.preventDefault();
    })


    var bool = false;
    $("footer").on("touchstart", function(event) {
        var finger1 = event.originalEvent.targetTouches[0];
        var y1 = finger1.clientY;



        function move(event) {
            var finger2 = event.originalEvent.targetTouches[0];
            var y2 = finger2.clientY;
            if(y1 - y2 > 80) {
                bool = true;
                $(".money>img").animate({
                    width: '0',
                    height: '0',
                    left: '50%',
                    top: '-90%'
                }, 700)
            }
        }

        if(bool) {
            score++;
            bool = false;
            var bai = parseInt(score / 100);
            var shi = parseInt(score / 10 % 10);
            var ge = score % 10;
            $(".middle1 span").text(bai);
            $(".middle2 span").text(shi);
            $(".middle3 span").text(ge);

            if (score%3 ==0) {
                $(".head  img").hide();
                $(".head  img").eq(2).show()
            }
            if (score%3 ==1) {
                $(".head  img").hide();
                $(".head  img").eq(1).show()
            }
            if (score%3 ==2) {
                $(".head  img").hide();
                $(".head  img").eq(0).show()
            }
        }




        $(".money").append("<img src='img/100yuan.png'/>");
        $("footer").on("touchmove", move);
        $("footer").on("touchend", function() {
            $("footer").off("touchemove", move)
        })
   });
    setInterval(function() {
        span.innerHTML -= 1;
        if(span.innerHTML == 0) {
            window.location.assign("index3.php?name=<?php echo $name; ?>&tel=<?php echo $tel; ?>&score="+score);
        }

        $(".hand").animate({
            top:'25%',
            opacity:'0.5'
        },500,function () {
            $(".hand").animate({
                top:'45%',
                opacity:'1'
            },500)
        })
    }, 1000)





</script>
</body>

</html>