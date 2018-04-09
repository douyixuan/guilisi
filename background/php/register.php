<?php
	$zhanghao=$_POST["username"];
	$mima=$_POST["password"];
	$nama=$_POST["nama"];
	$address=$_POST["address"];
	$email=$_POST["email"];
	
		/*
		$servername = "...";
		$username = "..";
		$password = "...";
		$db = "...";
		*/
			
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $db);
	 
	// 检测连接
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "连接成功\n";	// some code  username, password
	
	//set charset
	mysqli_set_charset($conn,'utf8');
		
	// 判断用户名是否提交过
	$sql ="select * from users where username ='".$zhanghao."'";
	$result = mysqli_fetch_array(mysqli_query($conn, $sql));
	if(!empty($result)){
		echo 404;  // 提交失败，用户名已在数据库中存在
	}else{
		//query
		$sql = 'INSERT INTO users(username, password, nama, address, email) VALUES ("'
		.$zhanghao.'","'
		.$mima.'","'
		.$nama.'","'
		.$address.'","'
		.$email.'")'
		;
		//echo "alert(".$sql.");";
		if($zhanghao!="" && $mima!=""){
			mysqli_query($conn, $sql);
			echo 200;
		}
		else echo 0;
	}
	
	mysqli_close($conn);
?>