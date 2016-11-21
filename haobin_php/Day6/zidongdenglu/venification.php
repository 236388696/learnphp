<?php
    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $strs="";
    for($i=0;$i<4;$i++){
        $rand = rand(0,61);
        $strs.=$str[$rand];
    }
    header("Content-type:image/png");
    $image = imagecreate(150,50);
    imagecolorallocate($image,0,255,255);
    $blue = imagecolorallocate($image,0,0,255);
    imagestring($image,5,58,17,$strs,$blue);
    imagepng($image);
    imagedestroy($image);
    session_start();
    $_SESSION["str1"] = $strs;
?>
