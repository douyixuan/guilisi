<?php
	$coin=0;
	$money=0.0;
	$beizhu=0;
	$nama="李文静";
	$op="null";
	$nama=$_POST["nama"];
	$coin=$_POST["coin"];
	$money=$_POST["money"];
	$beizhu=$_POST["beizhu"];
	$op=$_POST["operation"];
		/*
		$servername = "...";
		$username = "..";
		$password = "...";
		$db = "...";
		*/
	$servername = "193.112.54.129";
	$username = "guilisi";
	$password = "SYm3t5i4zr36tFRX";
	$db = "guilisi";		
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password, $db);
	 
	// 检测连接
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "连接成功\n";	// some code  username, password
	
	//set charset
	mysqli_set_charset($conn,'utf8');
	//echo 200;
	
	$sql ='INSERT INTO changes(operation, name, account, jifen) VALUES("'.$op.'","'.$nama.'","'.$money.'","'.$coin.'")';
	//$sql='INSERT INTO changes(operation, name, account, jifen) VALUES("insert","李文静",10000,100)';
								echo $sql;
	echo mysqli_query($conn, $sql);
	
if($op == "insert"){
	// 判断用户名是否提交过
	$sql ="select * from guke where name ='".$nama."'";
	$result = mysqli_fetch_array(mysqli_query($conn, $sql));
	if(!empty($result)){
		echo 404;  // 提交失败，用户名已在数据库中存在
		/*$row = mysqli_fetch_assoc($result);
		$sql = 'UPDATE guke SET'.
		'name="'.$nama.'","'.
		'account="'.$money.'","'.
		'jifen="'.$coin.'","'.
		'beizhu"'.$beizhu.'"'.
		'where name = "'.$row["name"].'"';
		*/
	}else{
		//query
		$sql = 'INSERT INTO guke(name, account, jifen, beizhu) VALUES ("'
		.$nama.'","'
		.$money.',"'
		.$coin.'","'
		.$beizhu.'")'
		;
		//echo "alert(".$sql.");";
		if($nama!=""){
			mysqli_query($conn, $sql);
			echo 200;
		}
		else echo 0;
	}
}

if($op == "update"){
	$sql = 'UPDATE guke SET '.
		'account='.$money.','.
		'jifen='.$coin.','.
		'beizhu="'.$beizhu.'"'.
		' where name="'.$nama.'"';
		//echo  $sql;
	if(mysqli_query($conn, $sql)){
		echo 200;
	}
	else echo 0;
}

if($op == "delete"){
	$sql = 'DELETE FROM guke where name="'.$nama.'"';
		//echo  $sql;
	if(mysqli_query($conn, $sql)){
		echo 200;
	}
	else echo 0;
}

	mysqli_close($conn);
?>