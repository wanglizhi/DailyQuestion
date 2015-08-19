<script type="text/javascript">
function checkLogin(){
	  var userName=document.getElementById("userName");
	  var password=document.getElementById("password");
	  if(checkUserName(userName)&&checkPassword(password)){
		  var form_data={
				  name:userName.value,
				  password:password.value
		  };
		  $.ajax({
			  type:"POST",
			  url:"<?php echo site_url('user/login');?>",
			  data:form_data,
			  success:function(msg){
				  document.getElementById("loginPart").innerHTML=msg;
			  }
		  });
	  }
}
function checkVote(val,id){
	if(checkUser()){
		var form_data={
				question_id:id
		};
		$.ajax({
			  type:"POST",
			  url:"<?php echo site_url("question/vote");?>",
			  data:form_data,
			  async:false,
			  success:function(msg){
				  val.innerHTML=msg;
			  }
		  });
	}
	return false;
}
function checkVote2(val,id){
	if(checkUser()){
		var form_data={
				answer_id:id
		};
		$.ajax({
			  type:"POST",
			  url:"<?php echo site_url("question/vote2");?>",
			  data:form_data,
			  async:false,
			  success:function(msg){
				  val.innerHTML=msg;
			  }
		  });
	}
	return false;
}
function checkUser(){
	var flag=false;
	$.ajax({
		type:"POST",
		async:false,
		url:"<?php echo site_url('user/checkUser');?>",
		success:function(msg){
			if(msg=="true"){
				flag=true;
			}else{
				layer.msg('请登录', 2, -1);
				flag=false;
			}
		}
	});
	return flag;
}
function logout(){
	  $.ajax({
		  type:"POST",
		  url:"<?php echo site_url('user/logout');?>",
		  success:function(msg){
			  document.getElementById("loginPart").innerHTML=msg;
		  }
	  });
}
function checkTag(e){
	var keynum;
	var keychar;
	keynum=window.event?e.keyCode:e.which;
	keychar=String.fromCharCode(keynum);
	var value=document.getElementById("tagInput").value.trim();
	if(keynum==32 && value!=""){
		var form_data={
				tag:value
		};
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('tag/selectTag');?>",
			data:form_data,
			success:function(msg){
				document.getElementById("questionTags").innerHTML=msg;
				document.getElementById("tagInput").value="";
			}
		});
		
	}
	if(value!=""){
		var value=document.getElementById("tagInput").value.trim();
		var form_data={
			userInput:value
		};
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('tag/inputSearch');?>",
			data:form_data,
			success:function(msg){
				document.getElementById("tagRec").innerHTML=msg;
			}
		});
	}
}
function addTag(val){
	var form_data={
			tag:val.innerHTML
	};
	$.ajax({
		type:"POST",
		url:"<?php echo site_url('tag/selectTag');?>",
		data:form_data,
		success:function(msg){
			document.getElementById("questionTags").innerHTML=msg;
		}
	});
}
function deleteTag(val){
	var form_data={
			tag:val.innerHTML
	};
	$.ajax({
		type:"POST",
		url:"<?php echo site_url('tag/deleteTag');?>",
		data:form_data,
		success:function(msg){
			document.getElementById("questionTags").innerHTML=msg;
		}
	});
}
function checkTitle(){
	var title=document.getElementById("questionTitle");
	var flag=false;
	if(title.value==""){
		 layer.tips('请输入标题' , '#questionTitle', 5, 150, 1, ['background-color:#0FA6D8; color:#fff;','#0FA6D8']);
		  return false;
	}
	if(checkUser()){
		$.ajax({
			type:"POST",
			async:false,
			url:"<?php echo site_url('question/checkScore');?>",
			success:function(msg){
				if(msg=="success"){
					flag=true;
				}else if(msg=="full"){
					layer.msg("今天问题已满", 2, -1);
					flag=false;
				}else if(msg=="null"){
					layer.msg("积分不足", 2, -1);
					flag=false;
				}
			}
		});
	}else{
		return false;
	}
	return flag;
}
function checkUserName(item){
	  if(item.value==""){
		  layer.tips('请输入用户名' , item, 5, 150, 1, ['background-color:#0FA6D8; color:#fff;','#0FA6D8']);
		  return false;
	  }else{
//		  layer.close(layer.index);
	  }
	  return true;
}
function checkPassword(item){
	  if(item.value==""){
		  layer.tips('请输入密码' , item, 5, 150, 1, ['background-color:#0FA6D8; color:#fff;','#0FA6D8']);
		  return false;
	  }else{
//		  layer.closeAll();
	  }
	  return true;
}
</script>