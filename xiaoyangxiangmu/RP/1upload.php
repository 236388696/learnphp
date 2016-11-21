
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
$files = $_FILES["files"];

//var_dump($_FILES);
//上传成功
for ($i = 0;$i < count($files["error"]);$i++){
if ($files["error"][$i] == 0){
    $types = explode("/",$files["type"][$i]);
     if ($files["type"][$i][0]){
        $name = time().".".$files["name"][$i];
         if (move_uploaded_file($files["tmp_name"][$i],"img/".$name)) {
             $imgPath = pathinfo($_SERVER["HTTP_REFERER"])["dirname"] . "/img/" . $name;
             $sql = "INSERT INTO image (id,imgPath) VALUES (NULL ,'{$imgPath}')";
             mysql_query($sql);
             if (mysql_insert_id() > 0) {
                 echo '{"err":0,"msg":"添加成功"}';
                 header("Location:upload.php");
             } else {
                 echo '{"err":1,"msg":"添加失败"}';
                 header("Location:upload.php");
             }
         }

         }
     }
}