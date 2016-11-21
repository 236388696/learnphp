<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/11
 * Time: 下午3:20
 */

header("Content-type:text/html;charset=utf-8");
$path = $_GET["path"];
function removeDir($path){
    if (is_dir($path)){
        $arr=scandir($path);
        if (count($arr)>2){
            for($i = 2;$i <count($arr) ;$i++){
                $url=$path."/".$arr[$i];
                removeDir($url);
            }
        }
        rmdir($path);
    }else{
        unlink($path);
    }
}
removeDir($path);
echo "<script>window.location.href = 'list.php'</script>";