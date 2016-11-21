<?php
    $fn = $_GET["fn"];
    $str = ["msg"=>"你好"];
    $str = json_encode($str);
    //$fn:获取到的方法名
    //():调取方法,括号里传参数
    //下面类似cess(123)
    //因为当前php文件就是在script src引入的,所以可以直接"想"js里那样去使用
    //这样用的前提是:必须在script src引入这个php文件
    echo "{$fn}('{$str}')";
?>
