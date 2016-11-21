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
<form action="haha.php?congGet='霍明辉'" method="post">


    <input type="text" name="ufo">

    <input type="submit" value="点我">

    <?php
    echo @$_GET["congGet"];
    echo @$_POST["ufo"];
    ?>

</form>
</body>
</html>