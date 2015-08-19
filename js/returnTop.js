window.onscroll=function(){
	var retTop=document.getElementById("returnTop");
	retTop.style.transition="bottom 1s ease-in-out";
				//alert(document.documentElement.scrollTop);
	var scrollTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
	if(scrollTop>10){
					//alert("wangfulin");
		retTop.style.bottom="180px";
	}else{
		retTop.style.bottom="-90px";
	}
				//alert("wangfulin");
}
window.onload=function(){
	var retTop=document.getElementById("returnTop");
	if(retTop.addEventListener){
		retTop.addEventListener("click",function(){
			if(document.documentElement.scrollTop){
				document.documentElement.scrollTop=0;
			}else{
				document.body.scrollTop=0;
			}
		},false);
	}else if(retTop.attachEvent){
		retTop.attachEvent("onclick",function(){
			if(document.documentElement.scrollTop){
				document.documentElement.scrollTop=0;
			}else{
				document.body.scrollTop=0;
			}
		});
	}else{
		retTop.onclick=function(){
			if(document.documentElement.scrollTop){
				document.documentElement.scrollTop=0;
			}else{
				document.body.scrollTop=0;
			}
		}
	}
}