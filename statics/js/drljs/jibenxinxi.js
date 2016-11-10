window.onload=function(){

		// 导航

	var navon=$('.nav_on');
		var h=navon[0].offsetHeight;  //获取一个元素的高度
		for (var i = 0; i < navon.length; i++) { //遍历下拉框的个数
		hover(navon[i],function(){   //添加hover鼠标移入移出事件
				var navsub=$('.nav_sub',this)[0];
				if (!navsub) {   //判断有没有下拉框，如果没有的话就返回去不执行
					return
				};
				var len=getChild(navsub).length;
				animate(navsub,{height:len*h},300)
			},function(){
				var navsub=$('.nav_sub',this)[0];
				if (!navsub) {return	}
				animate(navsub,{height:0},300)
			})
		}
		
	// 二维码
		var toer=$(".toer")[0];
		var footerimg=$(".footerimg")[0];
		toer.onmouseover=function(){
			footerimg.style.display="block"
		}
		toer.onmouseout=function(){
			footerimg.style.display="none"
		}
		// **********************************

		
		// TOP
		var totop=$(".TOP")[0];
		totop.onclick=function(){
			topobj=document.body.scrollTop==0?document.documentElement:document.body;
			animate(topobj,{scrollTop:0})
		}
		var flag=true;
		window.onscroll=function(){
			var topobj=document.body.scrollTop==0?document.documentElement:document.body;
			if (topobj.scrollTop>100) {
				if (flag) {
					flag=false;
				animate(totop,{opacity:1})
				};
			}else{
				flag=true;
				animate(totop,{opacity:0})
			}
		}



		// ***************************************
}