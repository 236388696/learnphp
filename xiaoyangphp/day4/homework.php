<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/11
 * Time: 下午8:36
 */
header("Content-type:text/html;charset=utf-8");
require_once "initsql.php";

$sql1 = "SELECT * FROM user";
$result1 =mysql_query($sql1);
$count =floor(mysql_num_rows($result1)/5);


@$path = $_GET["wd"];
if ($path == ""){
    $path =1;
}
$start = ($path -1) * 5;
$sql ="SELECT * FROM user WHERE id LIMIT {$start},5";
$result = mysql_query($sql);
echo "<table border='1px'>
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>密码</th>
            <th>电话</th>
        </tr>";
while ($row = mysql_fetch_assoc($result) ){
    echo "<tr>";
    foreach ($row as $value){
        echo "<td>{$value}</td>";
    }
    echo "</tr>";
}
echo "</table>";
for ($i = 0; $i < $count; $i++){
    $n = $i +1;
    echo "<a href=homework.php?wd={$n}>第{$n}页</a>";
}