<?php
    require_once "initSQL.php";
    $token = @$_GET["token"];
    if($token){
        $result = selectSQLQuery("101baidufuxi"," WHERE token = '{$token}'");
        $rows = mysql_fetch_assoc($result);
        $name = $rows["name"];
    }else{
        header("location:login.html");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人信息展示</title>
    <style>
        .xingMing{
            color: red;
            border: 1px solid black;
        }
        .intr{
            color: green;
            border:3px dashed blue;
        }
    </style>
</head>
<body>
    <div class="xingMing">
        <p><?php echo $token?></p>
    </div>
    <?php
        if($rows["intro"]!=null){
        echo <<<EDT
        <div class="intr">
            <p>{$rows["intro"]}</p>
        </div>
EDT;

        }
    ?>
</body>
</html>