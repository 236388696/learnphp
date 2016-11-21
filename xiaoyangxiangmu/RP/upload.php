<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        .wrap{
            width: 1000px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }
        .wrap ul{
            width: 100%;
            list-style: none;
            padding: 10px;
            box-sizing: border-box;
        }
        .wrap ul li{
            background-color: #ccc;
            margin-bottom: 20px;
            font-size: 50px;
            width: 20%;
            height: 150px;
            margin: 2%;
            display: inline-block;
            position: relative;
        }
        .wrap ul li img {
            width: 100%;
            height: 100%;
        }
        .wrap ul li .cha{
            font-size: 15px;
            position: absolute;
            top:-12px;
            right:0;
            color: grey;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!--//表单标签中设置enctype="multipart/form-data"来确保匿名上载文件的正确编码-->
<form action="1upload.php" method="post" enctype="multipart/form-data" >
    <input type="file" name="files[]" multiple="true">

    <input type="submit" value="上传图片">

</form>
<div id="wrap" class="wrap">
    <ul>
        <?php
        require_once "common.php";
        $sql = "SELECT * FROM image ";
        $result = mysql_query($sql);
        while ( $row = mysql_fetch_row($result)){
            $id = $row[0];
            $imgPath = $row[1];
            echo "<li><img src='{$imgPath}'><div class='cha' data-id='{$id}' >X</div>";
            echo "</li>";
        }

        ?>
    </ul>
</div>
<script src="js/jquery-2.1.3.min.js"></script>
<script>
    $(".cha").each(function(i,ele) {
            $(ele).on("click",function () {
                $.ajax({
                    url:"api.php",
                    type:"post",
                    dataType:"json",
                    data:{
                        type:"delete",
                        dataid:$(this).attr("data-id")
                    },
                    success:function (data) {
                        if (data.err == 0){
                            alert("删除成功");
                           $(".wrap li").eq(i).remove()
                        }
                    }
                })
            })
        })






</script>

</body>
</html>