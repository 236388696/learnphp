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
<?php
//echo "<table border='1'>";
//    echo "<th>
//        <td>文件名</td>
//        <td>文件大小</td>
//        <td>最后修改时间</td>
//        <td>操作</td>
//         </th>";
//
//echo "</table>";


echo "<table border='1'>";

    echo "<tr>
            <th>文件名</th>
            <th>文件大小</th>
            <th>最后修改时间</th>
            <th>操作</th>
         </tr>";

        $arr = scandir(".");
       for ($i = 0; $i < count($arr)-1; $i++){
            $fileName = $arr[$i];
            $fileSize = filesize($arr[$i]);
            $fileTime = filectime($arr[$i]);
            $fileTime =  date("Y-m-d H:i:s", $fileTime);
           echo "<tr>";
              echo "<td>".$fileName."</td>";
              echo "<td>".$fileSize."</td>";
              echo "<td>".$fileTime."</td>";
           echo "</tr>";
       }




?>

</body>
</html>