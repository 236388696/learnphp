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
<!--action地址填写当前文件-->
<form action="zuoye.php" method="post">
    <input type="submit" value="赞" name="type">
    <input type="submit" value="踩" name="type">
    <?php
        $typeValue = @$_POST["type"];
        $zan = 0;
        $cai = 0;
        if($typeValue!=null){
            if(is_file("zan.txt")){
                $fStr = file_get_contents("zan.txt");
                $arr = explode(",",$fStr);
                //拿出赞和踩的数值
                $zan = $arr[0];
                $cai = $arr[1];
                //判断前端是踩还是赞
                if($typeValue == "赞"){
                    $zan++;
                }else if($typeValue == "踩"){
                    $cai++;
                }
                $str = $zan.",".$cai;
                file_put_contents("zan.txt","$str");
            }else{
                $file = fopen("zan.txt","a");
                $str = "";
                if($typeValue == "赞"){
                    $str = "1".","."0";
                }else if($typeValue == "踩"){
                    $str = "0".","."1";
                }
                fwrite($file,$str);
            }
        }
        echo "<br>";
        echo "赞:".$zan;
        echo "踩:".$cai;
    ?>
</form>
</body>
</html>


