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
    <?php
        echo "<table border='1' cellspacing='0'>";
        //循环行,每次输出一对tr标签
        for ($i=1;$i<=9;$i++){
            echo "<tr>";
            for($k=1;$k<=$i;$k++){
                echo "<td>";
                echo $i."*".$k."=".($i*$k);
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>
