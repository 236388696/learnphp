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
<table border="1" cellspacing="0">
    <th>序号</th>
    <th>用户名</th>
    <th>密码</th>
    <th>年龄</th>
    <th>性别</th>
    <th>电话</th>
    <th>地址</th>
    <th>注册时间</th>
    <th>头像</th>
    <th>修改</th>
    <th>删除</th>
<?php
require_once("dataBase.php");
$page = @$_GET["page"];
$nowPage = $page;//记录当前页码
if($page!=null){
    $page = ($page-1)*5;
}else{
    $page = 0;
    $nowPage = 1;
}
if(connectDataBase("localhost","root","","mysjk")){//如果数据库打开成功
    $sql = "SELECT * FROM UserInfo LIMIT $page,5";
    $result = mysql_query($sql);
    for($i=0;$i<$row = mysql_fetch_row($result);$i++){
        echo "<tr>";
        for($j=0;$j<=count($row)-1;$j++){
            echo "<td>";
            if($j==count($row)-1) {
                echo "<img style='width:50px;height:50px;' src='{$row[$j]}'>";
            }else{
                echo "$row[$j]";
            }
            echo "</td>";
        }
        echo "<td><a style='text-decoration: none' href='updateInfo.php'>修改</a></td>";
        echo "<td><a style='text-decoration: none'>删除</a></td>";
        echo "</tr>";
    }
}
?>
</table>
<br>
<div style="width:600px;text-align:center">
    <?php
        $lastPage = $nowPage-1;
        if($lastPage<=1){
            $lastPage=1;
        }
        echo "<a style='text-decoration: none' href='show2.php?page={$lastPage}'>上一页</a>";
    ?>
    <?php
        //1.查询数据表一共有多少条数据,为了确定有几个a标签
        $sql = "SELECT * FROM UserInfo";
        $result = mysql_query($sql);
        $rowNum = mysql_num_rows($result);
        //计算一共分多少页
            //ceil向上取整
        $pNum = ceil($rowNum/5);

        for($i=1;$i<=$pNum;$i++){
            echo "<a style='margin-left:15px;text-decoration: none' href='show2.php?page={$i}'>$i</a>";
        }
    ?>
    <?php
        $nextPage = $nowPage+1;
        if($nextPage>=$pNum){
            $nextPage=$pNum;
        }
        echo "<a style='margin-left:15px;text-decoration: none' href='show2.php?page={$nextPage}'>下一页</a>";
    ?>

</div>
</body>
</html>
