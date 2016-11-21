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
    <th>操作1</th>
    <th>操作2</th>
<?php
require_once("dataBase.php");
$page = @$_GET["page"];
$keyWord = @$_GET["keyWord"];
session_start();
if($keyWord != null){
    $_SERVER["keyWord"] = $keyWord;
} else {
    $keyWord = $_SESSION["keyWord"];
}
$nowPage = $page; // 记录当前页码
if ($page != null){
    $page = ($page - 1) * 5;
} else {
    $page = 0;
    $nowPage = 1; // 页码默认在第一页
}
if (connectDataBase("localhost", "root", "", "MYSQL0604")){ // 如果数据库打开成功
    $sql = "SELECT * FROM UserInfo";
    if ($keyWord != null){
        $sql = $sql." WHERE uName LIKE '%{$keyWord}%'";
    }
    echo "page: ".$page;
    $sql = $sql." LIMIT {$page}, 5";
//    if ($keyWord != null){
//        $sql = "SELECT * FROM UserInfo WHERE uName LIKE '%{$keyWord}%'"; // 查询uName里面包换关键字的信息
//    }
//    else { // 如果关键字为空 代表正常查
//        $sql = "SELECT * FROM UserInfo LIMIT $page, 5";
//    }
    $result = mysql_query($sql);
    while ($rows = mysql_fetch_assoc($result)){
        echo "<tr>";
        foreach ($rows as $key=>$value){
            echo "<td>";
            if ($key == "imgPath"){
                echo "<img style='width: 50px; height: 50px;' src='$value'>";
            } else {
                echo $value;
            }
            echo "</td>";
        }
        echo "<td>";
        // 取出你要修改的那个人的id传到下一页
        $changeTheID = $rows["id"];
        echo "<a href='updateInfo.php?changeID={$changeTheID}'>修改</a>";
        echo "</td>";
        echo "<td>";
        echo "<a href='delete.php?deleteID={$changeTheID}' onclick=\"if(confirm('确定删除?')==false)return false;\">删除</a>";
        echo "</td>";
        
        echo "</tr>";
    }
}
?>
</table>
<br>
<div style="width: 700px; text-align: center">
    
    <?php
        $lastPage = $nowPage - 1;
        echo "<a href='Show2.php?page={$lastPage}'>上一页</a>";
    ?>
    
    <?php
        // 1. 查询数据表一共有多少条数据, 为了确定输出几个a标签

        $sql = "SELECT * FROM UserInfo";
        $result = mysql_query($sql);
        // 计算结果集里数据条数
        $rowNum = mysql_num_rows($result);
        
        // 计算一下一共能分多少页
            // ceil()向上取整
        $pNum = ceil($rowNum / 5);
        
        for ($i = 1; $i <= $pNum; $i++){
            echo "<a style='margin-left: 15px ;text-decoration: none' href='Show2.php?page={$i}'>$i</a>";
        }
    ?>
    
    <?php
        $nextPage = $nowPage + 1;
        echo "<a href='Show2.php?page={$nextPage}'>下一页</a>";
    ?>
    
</div>




</body>
</html>