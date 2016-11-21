<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/10
 * Time: 下午5:20
 */

header("Content-type:text/html;charset=utf-8");
//连接数据库
//参数1:服务器的地址
//参数2:用户名
//参数3:密码
$mysql =  mysql_connect("localhost","root","");
if ($mysql){
    echo "连接成功";
    //选择数据库
    $db = mysql_select_db("0503");
    //显示汉字
    mysql_query("set names utf8");

    //查找表中所有内容
    //$sql = "SELECT * FROM user";
    //通过sql语句查询
    //$result =  mysql_query($sql);

    //按行查询,结果每一行返回一个索引数组
//    while ($row = mysql_fetch_row($result)){
//        print_r($row);
//    }

    //按行查询,结果每一行返回索引数组与关联数组
//    while ($row = mysql_fetch_array($result)){
//        print_r($row);
//    }

    //按行查询,结果每一行返回关联数组
//    while ($row = mysql_fetch_assoc($result)){
//        print_r($row);
//    }

    $sql = "INSERT INTO user (id,username,password,tel) VALUES (NULL,'交换空间哈','123321','1235465442')";
    $result = mysql_query($sql);
    echo mysql_insert_id();

    //受影响的行
    echo mysql_affected_rows($result);

}else{
    echo "连接失败";
}