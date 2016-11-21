<?php
    print_r($_FILES);
    $imgName = @$_POST[imgName];
    //获取前端传进来的图片
    $imgArr = $_FILES["img"];
    //传过来的图片都在缓存文件夹下
    //取出文件
    $onloadimg=$imgArr["tmp_name"];
    $newImage = $imgName."."."png";
    move_uploaded_file($onloadimg,"./onloadimg/{$newImage}");
    echo "<img src='./onloadimg/$newImage'>";
?>
