<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/12
 * Time: 下午3:10
 */

session_start();
header("Content-type:text/html;charset=utf-8");
header("Content-type: image/png");


function agian(){
    $width =200;
    $height = 100;

    $im = @imagecreatetruecolor($width,$height) or die('创建图片失败');
    $backgroung_color = @imagecolorallocate($im,255,255,255);
//    imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));

    imagefill($im,0,0,$backgroung_color);
    $border_color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
    imagerectangle($im,0,0,$width-1,$height-1,$border_color);
    $text_color = imagecolorallocate($im,rand(50,180),rand(50,180),rand(50,180));
    $fontsize = 100;
    $code =rand(1000,9999);
    imagestring($im,$fontsize,rand(20,$width/2),rand($height/2,$height-20),$code,$text_color);
    $_SESSION['mycode'] = $code;
    imagepng($im);
    imagedestroy($im);
}
agian();
