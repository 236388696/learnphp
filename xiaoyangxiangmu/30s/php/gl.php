<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");
$type = $_POST["type"];
switch ($type){
    case "chouJiang":
        $arr = [0,6,9];
        $index= rand(0,2);
        $num = rand(0,100);
        if($num >= 0 && $num < 5){
            $prize = 1;
        }else if($num >= 5 && $num < 10){
            $prize = 2;
        }else if($num >= 10 && $num < 15){
            $prize = 3;
        }else if($num >= 15 && $num < 20){
            $prize = 4;
        }else if($num >= 20 && $num < 25){
            $prize = 5;
        }else if($num >= 25 && $num < 30){
            $prize = 7;
        }else if($num >= 30 && $num < 35){
            $prize = 8;
        }else if($num >= 35 && $num < 40){
            $prize = 10;
        }else if($num >= 45 && $num < 50){
            $prize = 11;
        }else{
            $prize = $arr[$index];
        }
        $arr = array("err"=>0,"prize"=>$prize);
        echo json_encode($arr);
        break;
    case "completeInfo":
        $openid = $_GET["openid"];
        $name = $_POST["name"];
        $tel = $_POST["tel"];
        $province = $_POST["province"];
        $city = $_POST["city"];
        $address = $_POST["address"];
        $count = $_POST["prize"];
        $arr = array("","海泉湾公仔","林志颖签名书","星赏假期套票","星悦假期套票","海景房(一日)","","海洋温泉门票","明星海报","","神秘岛门票","梦幻剧场门票");
        $prize = $arr[$count];
        $sql = "SELECT * FROM racing WHERE openid='{$openid}'";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0){
            echo '{"err":1,"msg":"用户名已存在"}';
        }else{
            $sql = "UPDATE racing SET name='{$name}',tel='{$tel}',province='{$province}',city='{$city}',address='{$address}',prize='{$prize}' WHERE  openid='{$openid}'";
            $result = mysql_query($sql);
            if(mysql_affected_rows() > 0){
                echo '{"err":0,"msg":"更新成功"}';
            }else{
                echo '{"err":2,"msg":"更新失败"}';
            }
        }
        break;
}
