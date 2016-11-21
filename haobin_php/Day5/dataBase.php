<?php
    function connectDataBase($dbIP,$dbName,$dbPass,$sel_dbName){
        $connectDB = mysql_connect($dbIP,$dbName,$dbPass);
        //连接成功
        if($connectDB){
            $selectDB = mysql_selectdb($sel_dbName);
            if($selectDB){
                mysql_query("set names utf8");
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
?>
