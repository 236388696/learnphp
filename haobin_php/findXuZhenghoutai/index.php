<?php
	$connect = mysql_connect("localhost","root","");
	mysql_query("set names utf8");
	mysql_select_db("mysjk");
	$prize=@$_GET["prize"];
	$name=@$_GET["name"];
	$tele=@$_GET["tele"];
	$msg = "";
	$sql = "SELECT * FROM huojiang WHERE name='{$name}' AND telephone='{$tele}'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)<=0){
		$sql = "INSERT INTO huojiang (id,prize,name,telephone) VALUE (NULL,'{$prize}','{$name}','{$tele}')";
//		数据库中没有
		$result1 = mysql_query($sql);
		if(mysql_affected_rows()>0){
			//添加成功
			$msg = "我们已经收到了你的信息";
		}
	}else{
		$msg="提交信息失败，或我们已经保存过你的信息";
	}
	$arr = array("name"=>$name,"msg"=>$msg);
	$str = JSON_encode($arr);
	echo $str;
?>