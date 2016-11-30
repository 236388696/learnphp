<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/2
 * Time: 下午3:48
 */

echo '{"a":1,"b":2,"name":"大眼妹"}';
$arr=array("name"=>"liu","hobby"=>"hao","age"=>30);
//把关联数组转成json字符串
echo json_encode($arr);

$str='{"name":"小薇","sex":"undefined"}';
//把json字符串转为关联数组，第二个参数true不填的话转为对象
$assocArr=json_decode($str,true);
print_r($assocArr);