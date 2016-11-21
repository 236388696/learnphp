<?php
header("Content-type:image/png");
$image=imagecreate(150,50);
imagecolorallocate($image,255,255,255);

$str="";
define("strLen",4);

for ($i=0; $i<strLen; $i++){
    switch (rand(0,2)){
        case 0:
            $str[$i]=chr(rand(48,57));
            break;
        case 1:
            $str[$i]=chr(rand(65,90));
            break;
        case 2:
            $str[$i]=chr(rand(97,122));
            break;
    }
}

for ($j=0; $j<strLen; $j++){
    $color=imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
    imagestring($image,5,15+$j*30,35,$str[$j],$color);
}

imagepng($image);
imagedestroy($image);


session_start();
$drawStr=implode("",$str);

unset($_SESSION["draw"]);
$_SESSION["draw"]=$drawStr;
?>
