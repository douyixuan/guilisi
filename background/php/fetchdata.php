<?php
		/*
		$servername = "...";
		$username = "..";
		$password = "...";
		$db = "...";
		*/
	$servername = "193.112.54.129";
	$username = "root";
	$password = "261316";
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
	// 判断用户名是否提交过
	
	$sql ="select * from guke";
	$result = mysqli_query($conn, $sql);
	//var_dump ($result);
	$datas["data"]=array();
	$arr = null;
	if ($result && mysqli_num_rows($result)>0) {		
		while($row = mysqli_fetch_assoc($result)) {
			$arr=null;
			//json
			$arr["id"]=$row["id"];
			$arr["name"]=$row["name"];
			$arr["jifen"]=$row["jifen"];
			$arr["account"]=$row["account"];
			$arr["op1"]='<a class="edit" href="javascript:;">编辑</a>';
			$arr["op2"]='<a class="delete" href="javascript:;">删除</a>';
			//echo $arr;
			array_push($datas['data'], $arr);
		}
		echo json_encode($datas);
	}
	/*
	if ($result && mysqli_num_rows($result)>0) {
			// 输出数据
			echo "<thead>
			<tr>
				<th>序号</th>
				<th>姓名</th>
				<th>积分</th>
				<th>余额</th>
				<th>编辑</th>
				<th>详情</th>
			</tr>
			</thead>
			<tbody>";
			
			while($row = mysqli_fetch_assoc($result)) {
				echo 
				'<tr class="" >'.
					'<td>'.$row["id"].'</td>'.
					'<td>'.$row["name"].'</td>'.
					'<td>'.$row["jifen"].'</td>'.
					'<td class="center">'.$row["account"].'</td>'.
					'<td><a class="edit" href="javascript:;">'.编辑.'</a></td>'.
					'<td><a class="delete" href="javascript:;">'.删除.'</a></td>'.
				'</tr>';
			}
			echo "</tbody>";
	}*/


	mysqli_close($conn);
?>