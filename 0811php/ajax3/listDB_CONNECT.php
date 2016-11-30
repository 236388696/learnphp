<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/3
 * Time: 下午4:01
 */
date_default_timezone_set("PRC");
$pdo=new PDO("mysql:host=localhost;dbname=0811","root","");
$pdo->query("set names utf8");