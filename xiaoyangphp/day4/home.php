<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/11
 * Time: 下午7:33
 */
header("Content-type:text/html;charset=utf-8");
require_once "initSql.php";
@$path = $_GET["path"];
if ($path == ""){
    $path = 1;
}
$start = 5 * ($path - 1);
$end = 5;
$sql = "SELECT * FROM user where id LIMIT {$start},{$end}";
$result = mysql_query($sql);
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>密码</th>
            <th>电话</th>
        </tr>";
while(@$row = mysql_fetch_assoc($result)){
    echo "<tr>";
    foreach ($row as $value){
        echo "<td>{$value}</td>";
    }
    echo "</tr>";
}
echo "</table>";
for ($i = 0;$i < 10;$i++){
    $n = $i + 1;
    echo "<a href=home.php?path={$n}>第{$n}页</a>";
}
?>