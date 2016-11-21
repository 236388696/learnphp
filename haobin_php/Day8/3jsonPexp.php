<?php
    $fn = $_GET["fn"];
    $str = array("msg"=>"你想干啥");
    $str = json_encode($str);
    echo "{$fn}('{$str}')";
?>
