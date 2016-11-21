<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/16
 * Time: 上午10:41
 */

require_once "common.php";

$sql = "SELECT * FROM xinlang ORDER by id DESC LIMIT  5";
$result = mysql_query($sql);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>新浪微博</title>
    <style>
        * { padding: 0; margin: 0; }
        li { list-style: none; }
        body { background: #f9f9f9; font-size: 14px; }

        #box { width: 450px; padding: 10px; border: 1px solid #ccc; background: #f4f4f4; margin: 10px auto; }
        #fill_in { margin-bottom: 10px; }
        #fill_in li { padding: 5px 0; }
        #fill_in .text { width: 380px; height: 30px; padding: 0 10px; border: 1px solid #ccc; line-height: 30px; font-size: 14px; font-family: arial; }
        #fill_in textarea { width: 380px; height: 100px; line-height: 20px; padding: 5px 10px; border: 1px solid #ccc; font-size: 14px; font-family: arial; overflow: auto; vertical-align: top; }
        #fill_in .btn { border: none; width: 100px; height: 30px; border: 1px solid #ccc; background: #fff; color: #666; font-size: 14px; position: relative; left: 42px; }

        #message_text h3 { font-size: 14px; padding: 6px 0 4px 10px; background: #ddd; border-bottom: 1px solid #ccc; }
        #message_text li { background: #f9f9f9; border-bottom: 1px solid #ccc; color: #666; overflow: hidden; }
        .caozuo{ float:right;}
        #message_text h3 { padding: 10px; font-size: 14px; line-height: 24px; }
        #message_text p { padding: 0 10px 10px; text-indent: 28px; line-height: 20px; }
        #page a{
            font-size:24px;
            margin-left: 20px;
        }
        #page a.active{
            color:yellow;
        }
    </style>
</head>

<body>
<div id="box">
    <ul id="fill_in">
        <form>
            <li>内容：<textarea id="content"></textarea></li>
            <li><input id="btn" type="button" value="提交" class="btn" /></li>
        </form>
    </ul>
    <div id="message_text">
        <ul class="list">
            <?php
            while ($row = mysql_fetch_assoc($result)){
                echo "<li data-id=".$row["id"].">";
                echo "<p>".$row["content"]."</p>";
                $time = date("Y年m月d日 H:i:s",$row["time"]);
                echo "<p class='caozuo'><span>{$time} 顶:<a href='javascript:void(0)' class='ding'>".$row["up"]."</a> 踩: <a href='javascript:void(0)' class='cai'>".$row["down"]."</a><a href='javascript:void(0)' class='shan'>删除</a></span></p>";
                echo "</li>";
            }

            ?>
        </ul>
        <div id="page">
            <?php
            $sql = "SELECT COUNT(id) FROM xinlang";
            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            $pageCount = ceil($row[0]/5);
            for ($i = 0; $i < $pageCount; $i++){
                ?>
                <a href="javascript:void (0)" class=<?php
                if ($i ==0){echo "active";}
                ?>><?php echo $i+1 ?></a>
                <?php
            }


            ?>
        </div>
    </div>
</div>


<script src="jquery-2.1.3.min.js"></script>
<script>
    $(function () {
        $("#btn").on("click",function () {
            $.ajax({
                url:"2weibo_api.php",
                type:"get",
                data:{
                    type:"add",
                    content:$("#content").val()

                },
                dataType:"json",
                success:function (data) {
                    if(data.err == 0){
                        addLi($("#content").val(),data.time,0,0,data.id)
                        $(".list").children().last().animate({
                            height:0
                        },function () {
                            $(".list").children().last().remove()
                        });

                    }else{
                        alert("提交失败");
                    }
                }
            })

        });

        $(document).on("click",".ding",function (event) {
            var that =$(event.target);
            $.ajax({
                url:"2weibo_api.php",
                type:"get",
                data:{
                    type:"up",
                    id:that.parents("li").attr("data-id")
                },
                dataType:"json",
                success:function (data) {
                    if (data.err == 0){
                        that.html(data.upCount);
                    }else{
                        alert(data.msg);
                    }
                }


            })

        });
        $(document).on("click",".cai",function (event) {
            var that =$(event.target);

            $.ajax({
                url:"2weibo_api.php",
                type:"get",
                data:{
                    type:"down",
                    id:that.parents("li").attr("data-id")
                },
                dataType:"json",
                success:function (data) {
                    if (data.err == 0){
                        that.html(data.downCount);
                    }else{
                        alert(data.msg);
                    }
                }

            })

        })
        $(document).on("click",".shan",function (event) {
            var that =$(event.target);
            $.ajax({
                url:"2weibo_api.php",
                type:"get",
                data:{
                    type:"shan",
                    id:that.parents("li").attr("data-id"),
                    lastId:that.parents("ul").children().last().attr("data-id")
                },
                dataType:"json",
                success:function (data) {
                    if (data.err== 0){
                        that.parents("li").animate({
                            height:0
                        },function () {
                            that.parents("li").remove();
                            if (data.result){
                                var obj = data.result;
                                addLi(obj.content,obj.time,obj.up,obj.down,obj.id,true);
                            }

                        })
                    }else{
                        alert(data.msg);
                    }
                }
            })
        })

        $("#page a").on("click",function () {
            $("#page a").removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $.ajax({
                url:"2weibo_api.php",
                type:"get",
                dataType:"json",
                data:{
                    type:"page",
                    page:$(this).index()
                },
                success:function (data) {
                    console.log(data);
                    if (data.err ==0){
                        $(".list").empty();
                        for (var i = 0;i<data.result.length;i++){
                            var obj = data.result[i];
                            addLi(obj.content,obj.time,obj.up,obj.down,obj.id,true)
                        }
                        history.pushState(null,document.title,"2weibo.php?page="+index);
                    }
                }


            })




        })




        function add0(s) {
            if (s < 10){
                return "0" + s;
            }else{
                return s;
            }
        }


        //处理从后台返回的时间戳
        function setTime(s) {
            var date  = new Date();
            date.setTime(s*1000);
            return date.getFullYear() + "年" + add0(date.getMonth()+1) + "月" +add0(date.getDate()) + "日"+ add0(date.getHours()) + ":" + add0(date.getMinutes()) + ":" + add0(date.getSeconds());
        }



        function addLi(content,time,up,down,id,isLast) {
            var liObj = $("<li data-id="+id+"><p>"+content+"</p><p class='caozuo'><span>" + setTime(time) + "顶:" + "<a href='javascript:void(0)' class='ding'>" + up + "</a>"+"踩:"+"<a href='javascript:void(0)' class='cai' >"+down+"</a> "+"<a href='javascript:void(0)' class='shan'>删除</a></span></p></li>");

            if (isLast){
                $(".list").append(liObj);
            }else {
                $(".list").prepend(liObj);
            }

            var height = liObj.height();
            liObj.height(0);
            liObj.animate({
                height:height
            })

        }
    })

</script>

</body>

</html>
