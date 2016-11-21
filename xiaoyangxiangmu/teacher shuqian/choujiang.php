<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/31
 * Time: 下午4:19
 */
$num = rand(1,8);
echo json_encode(array("err"=>0,"num"=>$num));