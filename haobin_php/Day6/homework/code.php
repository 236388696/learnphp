<?php
    header("Content-type:image/png");
    $image = imagecreate(150,50);
    imagecolorallocate($image,202,33,215);
    $str="";
    define("codelen",4);
    for($i=0;$i<codelen;$i++){//每次取一位验证码
        switch (rand(0,2)){//每次从0,1,2随机取(数字,小写,大写)
            case 0:$str[$i] = chr(rand(48,57));
                break;
            case 1:$str[$i] = chr(rand(65,90));
                break;
            case 2:$str[$i] = chr(rand(97,112));
                break;
        }
    }
    for($k=0;$k<codelen;$k++){//给四个字符设置不同的颜色
        $color = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
        imagestring($image,5,22+$k*30,18,$str[$k],$color);
    }
    imagepng($image);
    imagedestroy($image);
    //把生成的字符串存到session里
    session_start();
    $codeStr = implode("",$str);
    unset($_SESSION["code"]);
    //然后重新赋值
    $_SESSION["code"] = $codeStr;
?>
