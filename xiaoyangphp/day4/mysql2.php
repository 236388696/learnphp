<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/8/11
 * Time: 上午9:06
 */
header("Content-type:text/html;charset=utf-8");

//1.连接服务器
$mysql = mysql_connect("localhost","root","");
if ($mysql) {
    echo "数据库连接成功";
    //2.选择数据库
    $db = mysql_select_db("0503");
    if ($db) {
        echo "数据库0503打开成功";
        mysql_query("set names utf8");
//        //limit 查找多少个
////        $sql = "SELECT * FROM user LIMIT 5";
////        $sql = "SELECT * FROM user WHERE id < 5";
//       $sql = "SELECT * FROM user WHERE username = '文文'";
//        //非
////        $sql = "SELECT * FROM user WHERE NOT username = '文文'";

        //排序
        //ASC正序
        //DECS倒序
        //$sql = "SELECT *FROM user ORDER BY   id DESC ";

//
//        //AND用来连接两个并列的条件 OR表示或
//        $sql = "SELECT * FROM user WHERE id > 3 AND username = '雨'";
//
//
//        $result = mysql_query($sql);
//
//
//        while ($row = mysql_fetch_assoc($result)){
//            print_r($row);
//        }
//

        //插入
//        $sql = "INSERT INTO user (id,username,password,tel) VALUES (NULL,'大黄','123123','789789')";
//        mysql_query($sql);
//
//        echo  mysql_insert_id();

        //修改
//        $sql ="UPDATE user SET username = '哈哈',tel ='5436' WHERE id = 13";
//        mysql_query($sql);
//        //受影响的行数
//       if ( mysql_affected_rows()>0){
//           echo "更新成功";
//       }

       //删除
        $sql ="DELETE FROM user WHERE username = '大黄'";
        mysql_query($sql);
        echo mysql_affected_rows();


    }else{
        echo "数据库0503打开失败";
    }




    } else {
        echo "数据库连接失败";
    }
