<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/23
 * Time: 下午2:39
 */

$files = scandir("img");
$types=["jpg","png","gif","jpeg"];
//print_r($files);
$arr = array();
foreach ($files as $file){
    if (is_file("img/".$file)){
        $name = explode(".",$file);
//        if (in_array($name[1],$types)){
//            $arr["{$name[0]}"] ="img/".$file;
//        }


        print_r($name);
    }
}
//echo json_encode($arr);
