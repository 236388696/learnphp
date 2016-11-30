<?php
header("Content-type:text/html;charset=utf8");
require_once "../listDB_CONNECT.php";
$sql = $pdo->query("SELECT * FROM weibo");
$arr = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        .wrap{
            width: 500px;
            margin: 0 auto;
            background-color: lightyellow;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        li{
            list-style: none;
        }
        #name{
            width: 400px;
            height: 23px;
            font-size: 1rem;
        }
        textarea{
            width: 400px;
            border: 1px solid pink;
            font-size: 1rem;
            /*向上对齐, 内容两个字跟着对齐*/
            vertical-align: top;
        }
        #fill li{
            padding: 10px 0;
        }
        #submit{
            padding: 3px 15px;
            border: 1px solid black;
            background-color: deepskyblue;
            position: relative;
            left: -200px;
            font-size: 1rem;
        }
        h3{
            margin-top: 20px;
            text-align: left;
        }
        #weibo{
            margin: 20px auto;
            width: 90%;
            background-color: white;
        }
        #weibo li{
            border-bottom: 1px solid #ccc;
            padding: 0 0 10px 40px;
        }
        .active{
            color: yellow;
        }
    </style>
    <script src="../../ajax1/jquery-2.2.3.min.js"></script>

    
</head>
<body>

<div class="wrap">
    <ul id="fill">
        <li>内容: <textarea name="" cols="30" rows="10" id="content"></textarea></li>
        <li><input type="button" value="提交" id="submit"></li>
    </ul>
    <div id="msg">
        <ul><h3>显示留言</h3></ul>
        <ul id="weibo">
            <?php
            for ($i = 0;$i<count($arr);$i++){
                echo "<li>";
                echo "<textarea cols=\"30\" rows=\"10\">";
                $content = $arr[$i];
                print_r($content["content"]);
                echo "</textarea>";
                echo "<span>";
                echo date("Y-m-d H:i:s",$content["time"]);
                echo "</span>";
                echo "<a class='prase' href='###'>👍";
                print_r($content["praise"]);
                echo "</a>";
                echo "<a class='down' href='###'>👎";
                print_r($content["down"]);
                echo "</a>";
                echo "<button class='delete'>删除</button>";
                echo "</li>";
            }
            ?>

        </ul>
<!--//        <div id="page">-->
<!--//-->
<!--//        </div>-->
<!--//    </div>-->
<!--//</div>-->

</body>

</html>

