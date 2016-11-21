<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div{
            width: 60px;
            height: 20px;
            border: 1px solid black;
            display: inline-block;
            text-align: center;
            line-height: 20px;
        }
    </style>
</head>
<body>
    <?php
        for($i=1;$i<=9;$i++){
            for($j=1;$j<=$i;$j++){
                $x = $i*$j;
                echo "<div>$j*$i=$x</div>";
            }
            echo "<br>";
        }
    ?>
</body>
</html>
