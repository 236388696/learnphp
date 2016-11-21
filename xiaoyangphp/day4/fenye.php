<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
<body>
<table border = "1px">
    <th>id</th>
    <th>用户名</th>
    <th>密码</th>
    <th>电话</th>
    <?php
    require_once "initsql.php";
    if ($_GET){
        $page = $_GET["page"];
    }else{
        $page = 0;
    }
    $start = $page*5;

    $sql = "SELECT * FROM user LIMIT {$start},5";
    $result  = mysql_query($sql);
    while ($row = mysql_fetch_assoc($result)){
        echo "<tr>";
        foreach ($row as $value){
            echo "<td>";
            echo $value;
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
<?php
$sql = "SELECT COUNT(id) FROM user";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
//    print_r($row);
//总条数
$count = $row[0];
//上一页
if ($page>0) {
    $lastPage = $page - 1;
    echo "<a href='fenye.php?page={$lastPage}'>上一页</a>";
}

for ($i = 0; $i < ceil($count/5); $i++){
    //每次循环生成一个a标签
    $showpage = $i+1;
    echo "<a href='fenye.php?page={$i}'>{$showpage}</a>";
}
//下一页
if ($page < ceil($count/5)-1){
    $nextPage = $page+1;
    echo "<a href='fenye.php?page={$nextPage}'>下一页</a>";
}
?>


</body>
</html>
</head>
<body>
    <table border = "1px">
        <th>id</th>
        <th>用户名</th>
        <th>密码</th>
        <th>电话</th>
        <?php
        require_once "initsql.php";
        if ($_GET){
            $page = $_GET["page"];
        }else{
            $page = 0;
        }
        $start = $page*5;

        $sql = "SELECT * FROM user LIMIT {$start},5";
        $result  = mysql_query($sql);
        while ($row = mysql_fetch_assoc($result)){
            echo "<tr>";
            foreach ($row as $value){
                echo "<td>";
                echo $value;
                echo "</td>";
            }
             echo "</tr>";
        }
     ?>
  </table>
    <?php
    $sql = "SELECT COUNT(id) FROM user";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
//    print_r($row);
    //总条数
    $count = $row[0];
    //上一页
    if ($page>0) {
        $lastPage = $page - 1;
        echo "<a href='fenye.php?page={$lastPage}'>上一页</a>";
    }

    for ($i = 0; $i < ceil($count/5); $i++){
        //每次循环生成一个a标签
        $showpage = $i+1;
        echo "<a href='fenye.php?page={$i}'>{$showpage}</a>";
    }
     //下一页
    if ($page < ceil($count/5)-1){
        $nextPage = $page+1;
        echo "<a href='fenye.php?page={$nextPage}'>下一页</a>";
    }
    ?>


</body>
</html>