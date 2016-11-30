<?php
//设置时区
date_default_timezone_set("PRC");
header("Content-type:text/html;charset=utf8");
//date_default_timezone_set("PRC");
//$pdo=new PDO("mysql:host=localhost;dbname=0811","root","");
//$pdo->query("set names utf8");
require_once "../ajax2/listDB_CONNECT.php";
//按时间倒叙
$sql = $pdo->query("SELECT * FROM weibo ORDER BY time DESC LIMIT 18");
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
            background-color: #aee3fb;
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
            overflow: hidden;
            text-align: left;
        }
        .active{
            color: yellow;
        }
        .right{
            float: right;
        }
    </style>


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

                //把每一条数据取出来
                $row=$arr[$i];
                echo "<li data-id={$row['id']}>";
                $content=$row["content"];
                //内容显示出来
                echo "<p>{$content}</p>";
                //取出来的是时间戳
                $time=$row["time"];
                $time=date("Y-m-d H:i",$time);
                echo "<p class='right'>{$time}
                    <span>赞</span><a href='javascript:void(0)'>{$row['praise']}</a>
                    <span>踩</span><a href='javascript:void(0)'>{$row['down']}</a>
                    <a class='remove' href='javascript:void(0)'>删除</a>
                    
                      </p>";
                echo "</li>";
            }
            ?>

        </ul>
         <div id="page">
            </div>
            </div>
        </div>
        <script src="../ajax1/jquery-2.2.3.min.js"></script>
        <script>
            $(function () {
                $("#submit").on("click",function () {
                    //接口：1.api.php
                    //参数:{type:"submit",content:"asdaas",时间让后台做}
                    //返回值：{"err":0,"time":"2016-10-1 00:00"}

                    $.ajax({
                        //接口
                        url:"1.api.php",
                        //类型
                        type:"post",
                        //往后台传的参数
                        data:{
                            type:"submit",
                            //内容
                            content:$("#content").val()
                        },
                        //返回的格式数据类型，不写默认是普通字符串，如果写"json"的话，返回值自动转成js对象
                        //json是个对象
                        dataType:"json",
                        success:function (data) {
                            if(data.err==0){
                                //时间是后台给的
                                addLi($("#content").val(),data.time,data.id);
                            }else{
                                console.log(data.msg);
                            }
                        }
                    })

                })
                //在dom中添加一个li
                function addLi(content,time,id) {
                    var li=$("<li></li>");
                    li.attr("data-id",id);
                    li.html("<p>"+content+"</p><p class='right'><span>"+time+"</span><span>赞</span><a href='javascript:void(0)'>0</a><span>踩</span><a href='javascript:void(0)'>0</a><a class='remove' href='javascript:void(0)'>删除</a></p>");
                    //prepend从前面加
                    $("ul#zuoye").prepend(li);
                    //取li的高度
                    var height=li.height();
                    li.height(0);
                    li.animate({
                        height:height
                    })
                }
                //给所有的添加删除事件
                $(document).on("click",".remove",function () {
                    var that=this;
                    $.ajax({
                        url:"1.api.php",
                        type:"post",
                        data:{
                            type:"remove",
                            id:$(this).parents("li").attr("data-id")
                        },
                        dataType:"json",
                        success:function (data) {
                            console.log(data);
                            if(data.err==0){
                                $(that).parents("li").animate({
                                    height:0
                                },function () {
                                    $(that).parents("li").remove();
                                })
                            }else{
                                console.log(data.msg);
                            }
                        }
                    })
                })
            })
        </script>

</body>

</html>

