<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/2
 * Time: 下午5:13
 */

$num = rand(1,12);
echo json_encode(array("err"=>0,"num"=>$num));