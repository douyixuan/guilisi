function sub(f) {
	var flag;
	var username=f.username.value;
	var password=f.password.value;
	var password2=f.password2.value;
	var nama=f.nama.value;
	var address=f.address.value;
	var email=f.email.value;
	//alert(username);
	//add some fill warning
	
	//var reg=/^([a-zA-Z0-9_-]);//+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+$/;
	var reg=/^\w+$/;
	if(password != password2){
		alert("两次输入的密码不同! 请重新输入！");
		flag = false;
	}else if(!reg.test(username)){
		alert("用户名只能包含数字、字母和下划线！且不为空");
		flag = false;
	}else if(username=="" || password=="" ||password2==""){
		alert("必填项不能为空！");
	}else{
		regist(f);
		flag = true;
	}
	//alert(flag);
	return false;
}

function regist(f) {
	var username=f.username.value;
	var password=f.password.value;
	var nama=f.nama.value;
	var address=f.address.value;
	var email=f.email.value;

	var datas = {};
	datas["username"]=username;
	datas["password"]=password;
	datas["nama"]=nama;
	datas["address"]=address;
	datas["email"]=email;
	
	$.ajax({
		type: "POST",
		url:"php/register.php",
		data:datas,
		success: function (htmltxt) {
			//alert(data);
			if(htmltxt == 200){
				alert("注册成功");
				window.location.href="login.html";
			}else if(htmltxt == 404){
				alert("用户名已注册！");
			}else{
				alert("注册未成功！网络错误！");	
			}
		}
	});
	
	return false;
}