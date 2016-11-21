<?php
    $sqlIP = "localhost";
    $sqlRootName = "root";
    $sqlRootPass = "";
    $sqlDBName = "mysjk";
    if(mysql_connect($sqlIP,$sqlRootName,$sqlRootPass)){
        if(mysql_select_db($sqlDBName)){
            mysql_query("set names utf8");
        }
    }
    //查询方法
    function selectSQLQuery($tableName,$check){
        $sql = "SELECT * FROM ".$tableName." ".$check;
        //返回result结果集
        return mysql_query($sql);
    }
    //插入方法
    function insertSQLQuery($keyValue){
        $sql = "INSERT INTO ".$keyValue;
        mysql_query($sql);
        if(mysql_affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
?>
