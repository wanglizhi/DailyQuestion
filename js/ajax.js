  function show(item){
	  layer.tips('嗨，<em>朋友</em>，更多效果你自己慢慢发现吧。' , item, 0, 150, 0, ['background-color:#0FA6D8; color:#fff;','#0FA6D8']);
  }

//  function checkLogin(target){
//	  var userName=document.getElementById("userName");
//	  var password=document.getElementById("password");
//	  if(checkUserName(userName)&&checkPassword(password)){
//		  var form_data={
//				  name:userName.value,
//				  password:password.value
//		  };
//		  $.ajax({
//			  type:"POST",
//			  url:target,
//			  data:form_data,
//			  success:function(msg){
//				  document.getElementById("loginPart").innerHTML=msg;
//			  }
//		  });
//	  }
//}
//  function logout(){
//	  $.ajax({
//		  type:"POST",
//		  url:"<?php echo site_url('user/logout');?>",
//		  success:function(msg){
//			  document.getElementById("loginPart").innerHTML=msg;
//		  }
//	  });
//}