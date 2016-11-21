<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/10/31
 * Time: 上午10:48
 */
header("Content-type:text/html;charset=utf8");
//1.连接数据库
//参数：主机名，用户名，密码
$mysql=mysql_connect("localhost","root","");
if($mysql){
    echo "数据库连接成功";
}else{
    die("连接失败");
}
//2.选择使用哪一个库
$db=mysql_select_db("0811");
if($db){
    echo "连接0811成功";
}else{
    die("xxx失败");
}
//设置显示中文
mysql_query("set names utf8");
//一、查找
//3.sql语句，查找user表中的所有字段
//$sql="SELECT * FROM user";
//$sql="SELECT * FROM user WHERE id<3 AND username='刘老头'";


//获取个数
//$sql="SELECT * FROM user LIMIT 4";

//排序
//DESC 倒叙
//ASC正序
$sql="SELECT * FROM user ORDER BY tel ASC";

//几种选择放在一起写，先写条件，然后排序，最后限制数量
$sql="SELECT * FROM user WHERE  id<3 ORDER BY password ASC LIMIT 1";


//query查找
$result=mysql_query($sql);

//只获取结果的个数
echo mysql_num_rows($result);
echo "<br>";
//每次只能取一条数据
//$row=mysql_fetch_row($result);


//因为每次只能取一条数据，所以使用while循环来获取所有的行
//返回的是索引数组
while ($row=mysql_fetch_row($result)){
    print_r($row);
    echo "<br>";
}



//返回的是关联数组
//while ($row=mysql_fetch_assoc($result)){
//    print_r($row);
//}
//echo "<br>";



////返回的是对象数组
//while ($row=mysqli_fetch_object($result)){
//    print_r($row);
//}




//二、添加  INSERT：插入
$sql="INSERT INTO user(id,username,password,tel) VALUES (NULL ,'李维','521','438438438'),(NULL,'李嘉诚','521','438438438')";
mysql_query($sql);
//插入成功后，返回插入的那一行的id
echo mysql_insert_id();
echo "<br>";


//三、修改   UPDATE：更新
$sql="UPDATE user SET username='李敏镐' WHERE id=5";
mysql_query($sql);
//更新之后，返回更新的行数
echo mysql_affected_rows();
echo "<br>";

//删除
$sql="DELETE FROM user WHERE id=16";
mysql_query($sql);
echo "<br>";
echo mysql_affected_rows();


