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
    <table border="1px">
        <th>文件名</th>
        <th>文件大小</th>
        <th>最后修改时间</th>
        <th>操作</th>
        <?php
        if (@$_GET["path"]){
            $path = $_GET["path"];
        }else{
            $path = ".";
        }
        $arr = scandir($path);
        foreach ($arr as $value){
            ?>
            <tr>
                <td>
                    <?php
                    if (is_dir($value)){
                        $url = $path."/".$value;
                        echo "<a href=list.php?path={$url} >{$value}</a>";
                    }else{
                        echo "{$value}";
                    }

                    ?>
                </td>
                <td>
                    <?php
                    echo filesize($value);
                    ?>
                </td>
                <td>
                    <?php
                    date_default_timezone_set("PRC");
                    $time = fileatime($value);
                    echo date("Y-m-d H:i:s", $time);
                    ?>
                </td>
                <td>
                    <?php
                    echo "<a href='removeDir.php?path={$url}'>删除</a>";
                    ?>
                </td>
            </tr>
            <?php
        }

        ?>
    </table>
</body>
</html>