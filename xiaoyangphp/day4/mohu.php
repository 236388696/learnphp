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
    <table border="1px">
        <th>id</th>
        <th>用户名</th>
        <th>密码</th>
        <th>电话</th>
        <?php
        require_once "initsql.php";


        if ($_POST){
            $search = $_POST["search"];
        }else{
            $search = "";
        }


        $sql = "SELECT * FROM user WHERE username LIKE '%{$search}%'";//查找所有的内容
        $result = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)){
        echo "<tr>";
            foreach ($row as $key=>$value){
                echo "<td>";

                if ($key == "username"){
                    echo str_replace($search,"<font color='#a52a2a'>{$search}</font>",$value);
                }else{
                    echo $value;
                }
                echo "</td>";
            }

        echo "</tr>";
        }
        
        ?>

    </table>

    <form action="mohu.php" method="post">
        <input type="text" name="search">
        <input type="submit">
    </form>


</body>
</html>