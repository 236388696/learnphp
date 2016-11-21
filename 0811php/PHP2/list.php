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

<table border="1">
    <th>文件名</th>
    <th>大小</th>
    <th>创建时间</th>
    <th>操作</th>


    <?php
    header("Content-type:text/html;charset=utf8");
    $files = scandir(".");
    $dir=opendir(".");
    for ($i = 0;$i < count($files);$i++){
        echo "<tr>";
        echo "<td>";
        echo readdir($dir);
        echo "</td>";

        echo "<td>";
        echo filesize($files[$i]);
        echo "</td>";

        echo "<td>";
        $ctime = filectime($files[$i]);
        echo date("Y-m-d H:i:s",$ctime);
        echo "</td>";

        echo "<td>";
        echo "<a href='###'>";
        echo '删除';
        echo "</a>";
        echo "</td>";

        echo "</tr>";
    }

    ?>
</table>
</body>
</html>