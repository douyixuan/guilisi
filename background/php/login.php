<?php
	$zhanghao=$_POST["username"];
	$mima=$_POST["password"];
	//echo $text;
	/*
	$servername = "...";
	$username = "..";
	$password = "...";
	$db = "...";
	*/
	$servername = "127.0.0.1";
	$username = "guilisi";
	$password = "SYm3t5i4zr36tFRX";
	$db = "guilisi";	
	
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $db);
	 
	// 检测连接
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo aler("连接成功\n");	// some code  username, password
	
	//select db
		/*if (!mysqli_select_db($conn,'guilisi')) {
			echo 'error('.mysqli_errno($conn).'):'.mysqli_error($conn);
			mysqli_close($conn);
			die;
		}
		else {
			echo "guilisi\n";
		}*/
	
	//set charset
	mysqli_set_charset($conn,'utf8');
	
	//query
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	//the result's status
	//var_dump($result); 
	
	/*
	mysqli_fetch_row：获取一条数据的索引数组
	mysqli_fetch_assoc：获取一条数据的关联数组
	mysqli_fetch_array：获取一条数据的指定数组，
	*/
	$arr = null;
	if ($result && mysqli_num_rows($result)>0) {
		// 输出数据
		$i = 0;
		while($row = mysqli_fetch_assoc($result)) {
			$arr[$row["username"]]=$row["password"];
			//echo $row["username"]." ".$row["password"]."\n";
		}
	}
	
	//json encode
	//echo json_encode($arr);
	//$text = '{"username":"admin","password":"admin"}';
	
	//var_dump($log);
	//print $log->{"password"};
	echo $mima==$arr[$zhanghao]?"uptosky":"downtoground";
	mysqli_close($conn);
?>