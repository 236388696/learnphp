
<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/17
 * Time: 下午2:42
 */
//var_dump($_FILES);
require_once "common.php";
header("Content-type:text/html;charset=utf-8");
$img = $_FILES["img"];
//var_dump($_FILES);
//上传成功
if ($img["error"] == 0){
    //explode把字符串打散成数组
    $types = explode("/",$img["type"]);
     if ($types[0]=="image"){
         //文件名14xxxx.png
        $name = time().".".$types[1];
         //move_uploaded_file(参数1,参数2)
         //参数1:必需。规定要移动的文件
         //参数2:必需。规定文件的新位置。
         if (move_uploaded_file($img["tmp_name"],"img/".$name)){
//             var_dump(pathinfo($_SERVER["HTTP_REFERER"]));
                $imgPath =pathinfo($_SERVER["HTTP_REFERER"])["dirname"]."/img/".$name;
             $sql = "INSERT INTO image (id,imgPath) VALUES (NULL ,'{$imgPath}')";
             mysql_query($sql);
             if (mysql_insert_id() > 0){
                 echo '{"err":0,"msg":"添加成功"}';
             }else{
                 echo '{"err":1,"msg":"添加失败"}';
             }


         }
     }
}