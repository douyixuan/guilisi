function fillcheck(f) {
	var flag=false;
	var username=f.username.value;
	var password=f.password.value;
	//alert(username);
	//add some fill warning
	if(username != "" && password != "" && username != null && password != null){
		if(valid(f)){
			flag = true;
		}
	}
	return flag;
}

function valid(f) {
	var username=f.username.value;
	var password=f.password.value;
	var data = {};
	data["username"]=username;
	data["password"]=password;
	
	
	$.ajax({
		type: "POST",
		url:"php/login.php",
		data:data,
		timeout:2000,
		cache:true,
		success: function (data) {
			//alert(data);
			if(data == "uptosky") window.location.href="dashboard.html";
			else alert("账号或密码错误");
		}
	});
	return false;
}