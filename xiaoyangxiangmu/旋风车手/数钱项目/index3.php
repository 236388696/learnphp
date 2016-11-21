<?php
$score = @$_GET["score"];
$name = @$_GET["name"];
$tel = @$_GET["tel"];
header("Content-type:text/html;charset=utf-8");
$mysql = mysql_connect("localhost","root","");
if ($mysql){
    $db = mysql_select_db("0503");
    mysql_query("set names utf8");
    $sql = "SELECT * FROM shuqian WHERE  username = '{$name}'";
    $result = mysql_query($sql);
   if ( mysql_num_rows($result0m ) < 1){
        $sql = "INSERT INTO shuqian (id,username,tel,score) VALUES (NULL ,'{$name}','{$tel}','{$score}')";
        $result = mysql_query($sql);
        if (mysql_insert_id()>0){
//            echo "插入成功";
        }else{
//            echo "插入失败";
        }
    }
}else{
//    echo "连接失败";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;

        }
        html,body{
            width: 100%;
            height: 100%;

        }
        .wrap{
            width: 100%;
            height: 100%;
            background: url(img/bc4.png);
            background-size: 100% 100%;
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
            top:30.5625%;
            left:13.28125%;
            z-index: 5;
            display: none;
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

        header{
            height: 41.72535211%;
            position: relative;
        }
        .fenshu{
            color: white;
            font-size: 70px;
            font-weight: 900;
            position: absolute;
            top: 54.43037%;
            left: 20.59375%;
        }
        .status{
            color: white;
            position: absolute;
            top: 77.00421941%;
            left: 24.6875%;
        }
        section{
            height: 43.2%;
            width: 100%;
            position: relative;
        }
        .again img{
            position: absolute;
            top: 36%;
            left: 16.5625%;
            width: 29.21875%;
        }
        .tuhao img{
            position: absolute;
            top: 36%;
            left: 59.375%;
            width: 29.21875%;
        }
        .succ{
            position: absolute;
            top: 90.00421941%;
            left: 15.6875%;
            color: red;
        }
        .max_score{
            position: absolute;
            top: 90.00421941%;
            left: 15.6875%;
            color: red;
        }
        .current_paiming{
            position: absolute;
            top: 90.00421941%;
            left: 25.6875%;
            color: red;
        }
    </style>
</head>
<body>
<div class="wrap">
    <header>

        <div class="imgs">
            <img src="img/1.png" />
            <img src="img/2.png"/>
            <img src="img/3.png" />
            <img src="img/5.png"/>
        </div>
        <div class="cha">
            <img src="img/x.png"/>
        </div>


        <div class="score">
            <?php
            $score *= 10;
            echo "<p class='fenshu'>￥{$score}</p>";
            ?>
        </div>
        <div class="status">
            没办法！你已经强到没有对手了
        </div>
        <p class="succ">
            我的辉煌战绩:
            <?php
           echo "￥{$score}";
            ?>
         当前排名:<span class="current_paiming"></span>
        </p>

    </header>

    <section>
        <div class="again">
            <a href="index2.php"><img src="img/zaiyici.png"/></a>
        </div>
        <div class="tuhao">
            <img src="img/tuhao.png"/>
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

    <script src="js/jquery-2.1.3.min.js"></script>

    <script>
        var imgBig = document.querySelectorAll(".imgs img");
        var imgSmall = document.querySelectorAll(".xun");
        var cha = document.querySelector(".cha");
        var person = document.querySelector(".person");

        for (var i = 0;i<imgSmall.length;i++) {
            imgSmall[i].index = i;
            imgSmall[i].addEventListener("touchstart",function(){
                for (var j =0;j<imgBig.length;j++) {
                    imgBig[j].style.display = "none";
                }
                imgBig[this.index].style.display ="block";
                cha.style.display = "block";
            })
        }
        cha.addEventListener("touchstart",function(){

            for (var i = 0; i < imgBig.length; i++) {
                imgBig[i].style.display = "none";
                cha.style.display = "none";

            }
            person.style.display = "none";
        });

        $(".again").on("click",function () {

        })

    </script>

</div>
</body>
</html>
