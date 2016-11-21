<?php
    $SQL = mysql_connect("localhost","root","");
    $selectDb = mysql_select_db("mysjk");
    mysql_query("set names utf8");
    //SQL语言讲解
    //1.查询一条数据
        //LIMIT后面的数字代表了要查询几条,默认从第一条开始
//    $sqlC = "SELECT * FROM user LIMIT 1";
    //2.查询第二条到第四条数据
        //参数:从第几条开始,查几个
//    $sqlC = "SELECT * FROM user LIMIT 1,3";
    //3.WHERE条件查询
//    $sqlC = "SELECT * FROM user WHERE NOT age > 50000";
    //4.多个条件查询
        //AND
//    $sqlC = "SELECT * FROM user WHERE telephone='4444' AND address='444444'";
        //OR
//    $sqlC = "SELECT * FROM user WHERE telephone='4444' OR address='555555'";
    //5.通配符_ %
        //%代表一个或多个字符
        //_代表一个字符
    $sqlC = "SELECT * FROM user WHERE userName LIKE '李_'";
    $result = mysql_query($sqlC);
    while ($row = mysql_fetch_assoc($result)){
        echo "<br>";
        print_r($row);
    }
    echo "<br>";
    //查询结果集的条数
    var_dump(mysql_num_rows($result));
?>
