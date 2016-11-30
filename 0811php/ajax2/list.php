<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/3
 * Time: 下午2:36
 */
$pdo=new PDO("mysql:host=loaclhost;dbname=0811","root","");
//显示中文
$pdo->exec("set names utf8");
//查找query
$result=$pdo->query("SELECT *FROM user");
//查找所有的
$arr=$result->fetchAll(PDO::FETCH_ASSOC);
//print_r($arr);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .content{
            position: absolute;
        }
    </style>
</head>
<body>
    <table cellspacing="0" border="1px" width="800px">
        <th>id</th>
        <th>username</th>
        <th>password</th>
        <th>tel</th>
        <?php
        for($i=0;$i<count($arr);$i++){
            echo "<tr>";
            //遍历关联数组用for each;
            foreach ($arr[$i]as $item){
                echo "<td>";
                echo $item;
                echo "</td>";
            }
            echo "</tr>";

        }
        ?>
    </table>
    <script src="../ajax1/jquery-2.2.3.min.js"></script>
    <script>
        $(function () {
            var that=null;
            $("td").on("dblclick", function (e) {
                $(".content").remove();
                var input = $("<input class='content' type='text'/>");
                input.val($(this).html());
                $("table").append(input);
                input.get(0).focus();
                input.css({
                    top: $(this).offset().top,
                    left: $(this).offset().left,
                    width: $(this).width(),
                    height: $(this).height()
                })
                that=$(this);


            })
            $(document).on("keydown",function (e) {
                var typeArr=["id","username","password","tel"];
                if(e.keyCode==13){
                    $.post("list_api.php",{
                        id:that.parent().children().first().html(),
                        type:typeArr[that.index()],
                        value:$(".content").val()
                    },function (data) {
                        var obj=JSON.parse(data);
                        if(obj.err==0){
                            that.html($(".content").val());
                        }else{
                            alert(obj.msg);
                        }
                        $(".content").remove();
                    })
                }
            })
        })
    </script>
</body>
</html>
