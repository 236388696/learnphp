<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<input type="text" id="text" style="display: none;position: absolute;top: 0;left: 0;">
    <table border="1px">
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>密码</th>
        </tr>
        <?php
        mysql_connect("localhost","root","");
        mysql_select_db("0503");
        mysql_query("set names utf8");
        $sql = "SELECT * FROM yonghu";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)){
            echo "<tr>";

            foreach ($row as $value){
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <script src="jquery-2.1.3.min.js"></script>
    <script>
        $("td").on("dblclick",function () {
            var that = $(this);
            $("#text").show().width($(this).width()).height($(this).height());
            $("#text").css({
                left:that.offset().left,
                top:that.offset().top
            })
            $("#text").focus().val(that.html());

        })

    </script>
</body>
</html>