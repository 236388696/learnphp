<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/11/1
 * Time: 下午4:05
 */

header("Content-type:text/html;charset=utf8");

// 通过pdo连接mysql数据库 1.主机 2.用户名 3.密码
//try运行，试试代码有没有异常
//throw 抛出异常
//catch捕获异常

try{
    $pdo=new PDO("mysql:host=localhost;dbname=0811","root","");
}catch (PDOException $e){
    echo $e->getMessage();
}
$pdo->query("set names utf8");

//一、查
$result=$pdo->query("SELECT * FROM user");

//FETCH_NUM:以索引数组的形式返回结果
//FETCH_ASSOC：以关联数组的形式返回结果
//FETCH_BOTH：又有索引的，又有关联的
print_r($result->fetchAll(PDO::FETCH_BOTH));


//二、增:INSERT INTO新增一个用户
//返回值是插入的行数
echo $pdo->exec("INSERT INTO user(username, password, tel) VALUE ('不帅的人','jajajajava','1345621152')");


//三、改
//返回值是影响的行数
echo $pdo->exec("UPDATE user SET username='更丑的人' WHERE username='不帅的人'");


//删
//返回的是删除的行数
//echo $pdo->exec("DELETE FROM user WHERE username='更丑的人'");