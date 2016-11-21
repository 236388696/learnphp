<?php
    if(isset($_GET["path"])){
    $path=$_GET["path"];
}else{
        $path=".";
    }
//    array_unshift()

?>
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

<table>
    <th>文件名</th>
    <th>大小</th>
    <th>创建时间</th>
    <th>操作</th>
    <?php
    $files = scandir("$path"); //("../.")去父级
    for($i = 0; $i < count($files); $i++){
        echo "<tr>";
        $url=$path."/".$files[$i];//com+shift+上
        if (is_dir($url)){
            echo "<td><a href='lao_list.php?path={$files[$i]}'>".$files[$i]."</a></td>";
        }else{
            echo "<td>".$files[$i]."</td>";
        }
        //@抑止符, 阻止错误信息在前端显示出来
        $size = @filesize($files[$i]);
        //保留几位小数, 第二个参数控制保留的位数
        $size = number_format($size/1024, 2);
        echo "<td>".$size."kb</td>";
        date_default_timezone_set("PRC");
        $ctime = @filectime($files[$i]);
        echo "<td>".date("m-d H:i", $ctime)."</td>";
        echo "<td><a href='###'>删除</a></td>";
        echo "</tr>";
    }

    ?>
</table>
</body>
</html>