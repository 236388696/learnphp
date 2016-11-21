<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/17
 * Time: 下午5:41
 */


$cb = $_GET["cb"];


$jsonStr = '{"name":"文文","hobby":"哈哈"}';
echo "{$cb}({$jsonStr})";
