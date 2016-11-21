<?php
    //1.设置文件头信息,文件输出的是图片
    //或者image/jpeg
    header("Content-type:image/png");
    //2.创建画布
    $image = imagecreate(500,500);
    //3.设置颜色
    imagecolorallocate($image,0,0,255);
    //声明颜色变量
    $blue = imagecolorallocate($image,0,0,255);
    $green = imagecolorallocate($image,0,255,0);
    $red = imagecolorallocate($image,255,0,0);
    //设置线宽
    imagesetthickness($image,10);
    //绘制线
    imageline($image,0,0,100,100,$green);
    //绘制椭圆或者圆
    //参数:圆心坐标,圆宽、高,起始角度,终止角度
    imagearc($image,200,200,200,100,0,360,$red);
    //绘制矩形
    //参数,左上角坐标,右下角坐标
    imagefilledrectangle($image,0,100,100,200,$green);
    //*****绘制文字
    //参数:字体大小,位置,文字,颜色
    imagestring($image,5,100,300,"hello",$red);
    //倒数第二步:输出图片对象
    imagepng($image);
    //倒数第一步:拥吻要释放内存
    imagedestroy($image);

?>
