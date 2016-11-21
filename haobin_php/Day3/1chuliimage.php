<?php
    print_r($_FILES);
    //拿到存储有戒指信息的img对应的数据
    $imgArr = $_FILES["img"];
    if($imgArr["error"]==0){//如果没有错误则继续
        //判断文件是否是从前端上传过来的
        if(is_uploaded_file($imgArr["tmp_name"])){
            //设置时区(本地)
            date_default_timezone_get("PRC");
            //获取时间戳
            $time = time();
            //获取图片后缀名
            $type = $imgArr["type"];
            $arr = explode("/",$type);
            $zuiStr = $arr[1];
            //拼接成新的图片名字
            $name = $time.".".$zuiStr;
            //挪动
            move_uploaded_file($imgArr["tmp_name"],"./onloadimg/{$name}");
        }
    }
?>
