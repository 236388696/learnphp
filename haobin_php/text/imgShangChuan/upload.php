<?php
//isset()代表变量是否存在
if(isset($_FILES["myFile"]))
{
    $ret = array();
    //DIRECTORY_SEPARATOR  == '/';
    //拼接路径
    $uploadDir = 'uploads'.DIRECTORY_SEPARATOR;
    //dirname()获取指定路径的文件夹名字

    $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.$uploadDir;

    file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
    if(!is_array($_FILES["myFile"]["name"])) //single file
    {
        $fileName = $_FILES["myFile"]["name"];
        move_uploaded_file($_FILES["myFile"]["tmp_name"],$dir.$fileName);
        $ret['file'] = DIRECTORY_SEPARATOR.$uploadDir.$fileName;
    }
    echo json_encode($ret);
}

?>