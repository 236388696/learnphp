<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/28
 * Time: 上午10:13
 */
header("Content-type:text/html;charset=utf8");
$count=file_get_contents("pv.txt");
if(filesize("pv.txt")==0){
     file_put_contents("pv.txt",1);
}else{
    $count++;
    file_put_contents("pv.txt",$count);
}

echo file_get_contents("pv.txt");