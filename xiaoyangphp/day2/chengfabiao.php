<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            width: 100px;
            height: 40px;
            background-color: #cc1fb6;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    echo "<table>";
    for ($i = 0; $i < 9; $i++){
        echo "<tr>";
        for ($j = 0; $j < $i +1; $j++){

           echo "<td>" . ($j+1). "*" . ($i+1) ."= ". ($i+1)*($j+1)."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";



?>
</body>
</html>