<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/26
 * Time: 下午3:36
 */
header("Content-type:text/html;charset=utf-8");
print_r($_FILES);
$file=$_FILES["file"];
if ($file["error"]==0){
    //上传成功
    $typeArr = array("jpg","jpeg","png","gif");
    $type=explode(".",$file["name"]);
    if (in_array($type[count($type)-1],$typeArr)){
        //是图片格式
        //文件是上传的
        if (is_uploaded_file($file["tmp_name"])){
            $path = "../img/".time().".".$type[1];
            if (move_uploaded_file($file["tmp_name"],$path)){
                echo "移动成功";
                mysql_connect("localhost","root","");
                mysql_select_db("0503");
                mysql_query("set names utf8");
               $newPath =  str_replace("..","http://localhost/0503/RP/",$path);
                $sql = "INSERT INTO image(id,imgPath) VALUES (NULL ,'{$newPath}')";
                mysql_query($sql);
                if (mysql_insert_id()>0){
                    header("Localtion:manage.php");
                }else{
                    echo "插入失败";
                }
            }else{
                echo "移动失败";
            }
        }
    }
}