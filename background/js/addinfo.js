function addinfo() {
	$.ajax({
		type: "POST",
		url:"php/fetchdata.php",
		//dataType:"json",
		success: function (data) {
			//alert(htmltxt);
			//document.getElementById("addinfo").innerHTML=data;
			$('#editable-sample').dataTable().fnClearTable(); //清空表格
			//alert(packagingdatatabledata(data));
			$('#editable-sample').dataTable().fnAddData(packagingdatatabledata(data),true); //刷下表格
			//$("#modal-container-648308").modal("hide");
		}
	});
}

function packagingdatatabledata(datas){
	var data= JSON.parse(datas);
	//alert(data.data);
	var a=[]; //全部行数据的list
	var banddata = data.data;
	//alert(banddata);
 	for(var key in banddata){
		var tempObj=[];  //一行数据的list
		tempObj.push(banddata[key].id);
		tempObj.push(banddata[key].name);
		tempObj.push(banddata[key].jifen);
		tempObj.push(banddata[key].account);
		tempObj.push(banddata[key].op1);
		tempObj.push(banddata[key].op2);
		//a.push(tempObj);
		$('#editable-sample').dataTable().fnAddData(tempObj); //刷下表格
		
		//alert(key);
	}
	return a;
}