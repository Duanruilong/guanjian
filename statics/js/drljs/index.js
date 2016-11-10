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

		// var navon=$(".nav_on");
		// 	var navh=navon[0].offsetHeight;
		// 	for (var i = 0; i < navon.length; i++) {
		// 		hover(navon[i].function(){
		// 			var navsub=$('.nav_sub',this)[0];
		// 			if (!navsub) {return}
		// 			   var lennav=getChild(navsub).length;
		// 			   animate(navsub,{height:lennav*navh},300)
		// 			},function(){
		// 				var navsub=$('.nav_sub',this)[0];
		// 				if (!navsub) {return};
		// 				animate(navsub,{height:0},300)
		// 			})
		// 	}


		// banner轮播图
		var banner = $(".bannertitle")[0];
		var bannerbox=$(".banner")[0];
		var img=$('a',banner);
		var imgW=parseInt(getStyle(img[0],'width'));  //利用parseInt来得到去出单位的宽度；
		var btns=$('li',$(".banner_btn")[0]);  //注意获取方式
		var time=1000/60; //定义一个可变的运动时间参数
		banner.style.width=img.length*imgW+'px';  //改变最大承载图片容器的width（一个图片的width乘上图片的长度）
		var index=0;   //定义一个下标
		var t=setInterval(move,3000)  //保留进程数，也可以说是一个封装函数
		// var t=setInterval(function(move){}) 
		function move(){
			index++;  
			if (index==img.length) {   //判断当下标的大小等于图片的长度时重新从第一个开始
				index=0;
			}
			animate(banner,{left:-index*imgW},time);  
			//给承载很多图片的容器添加animate动画
			for (var i = 0; i < btns.length; i++) {
				btns[i].className="";  //利用className来改变样式
			};
				btns[index].className="banner_hot"
		}

		 //给按钮添加点击事件
		for (var i = 0; i < btns.length; i++) {
			btns[i].index=i;   //保留i
			btns[i].onclick=function(){
				//点击事件的时候动画的改变
			   animate(banner,{left:-this.index*imgW},time)
			   for (var i = 0; i < btns.length; i++) {
			      btns[i].className="";
			   };
			      this.className="banner_hot";
			     index=this.index;     //对应下标，很重要的！！！
			}
		}
		bannerbox.onmouseover=function(){
			clearInterval(t)
		}
		bannerbox.onmouseout=function(){
			t=setInterval(move,3000)
		}


//       要闻  动态
	var Hb = $(".hb")[0];
	var Li=$('li',Hb);
	var Ul=$('ul',$(".bd")[0]);  //注意获取方式
	for (var i =0;i< Li.length ;i++) {
		// Li[i].index=i;
     	Li[i].onmouseover=(function(aa){
     		function bb(){
			for (var i =0;i< Li.length ;i++) {
				Li[i].className="";
				Ul[i].style.display="none";
			};
				Li[aa].className="on";
				Ul[aa].style.display="block";
			}
			return bb;
		})(i)	
	};

	// 图片新闻
	// var bannerFocus = $(".pic")[0];
	// var boxFocus=$(".mF_YSlider_wrap")[0];
	// var iwFocus=getChild(bannerFocus)[0].offsetWidth;
	// var twen=setInterval(moveFocus,200)
	// 	function moveFocus(){
	// 		animate(bannerFocus,{left:-iwFocus},800,
	// 			function(){
	// 				bannerFocus.appendChild(getFirst(bannerFocus));
	// 				bannerFocus.style.left=0;
	// 			})
	// 	}
	// 	boxFocus.onmouseover=function(){
	// 		clearInterval(twen)
	// 	}
	// 	boxFocus.onmouseout=function(){
	// 		twen=setInterval(moveFocus,2000)
	// 	}


		var bannerFocus = $(".pic")[0];
		var imgFocus=$('img',bannerFocus);
		var imgWFocus=parseInt(getStyle(imgFocus[0],'width'));
		var btnsFocus=$('li',$(".num")[0]);  //注意获取方式
		console.log(btnsFocus);

		var boxFocus=$(".mF_YSlider_wrap")[0];

		var timee=2000/60; //定义一个可变的运动时间参数

		 bannerFocus.style.width=imgFocus.length*imgWFocus+'px';  //改变最大承载图片容器的width（一个图片的width乘上图片的长度）
		var indexx=0;   //定义一个下标
		var twen=setInterval(movee,3000)  //保留进程数，也可以说是一个封装函数
		// var t=setInterval(function(move){}) 
		function movee(){
			indexx++;  
			if (indexx==imgFocus.length) {   //判断当下标的大小等于图片的长度时重新从第一个开始
				indexx=0;
			}
			animate( bannerFocus,{left:-indexx*imgWFocus},timee);  
			//给承载很多图片的容器添加animate动画
			for (var i = 0; i < btnsFocus.length; i++) {
				btnsFocus[i].className="";  //利用className来改变样式
			};
				btnsFocus[indexx].className="current"
		}

		for (var i = btnsFocus.length - 1; i >= 0; i--) {
			btnsFocus[i].indexx=i;
			btnsFocus[i].onclick=function(){
				animate(bannerFocus,{left:-indexx*imgWFocus},timee)
				for (var i = 0; i < btnsFocus.length; i++) {
					btnsFocus[i].className="";
				};
				this.className="current";
				// indexx=this.index;
			}
		};

		boxFocus.onmouseover=function(){
			clearInterval(twen)
		}
		boxFocus.onmouseout=function(){
			twen=setInterval(movee,3000)
		}



		// 重点发展方向
		var sideMenu = $(".sideMenu")[0];
		var btnMebu=$('h3',sideMenu);
		var itemMebu=$('ul',$(".sideMenu")[0]);  //注意获取方式
		for (var i =0;i< btnMebu.length ;i++) {
			// Li[i].index=i;
	     	btnMebu[i].onmouseover=(function(aa){
	     		function bb(){
				for (var i =0;i< btnMebu.length ;i++) {
					btnMebu[i].className="";
					itemMebu[i].style.display="none";
				};
					btnMebu[aa].className="on";
					itemMebu[aa].style.display="block";
				}
				return bb;
			})(i)	
		};
		// 下面三个
		var sfqMenu = $(".sfqMenu")[0];
		var btnMenu=$('h3',sfqMenu);
		var itemMenu=$('div',$(".sfqMenu")[0]);  //注意获取方式
		for (var i =0;i< btnMenu.length ;i++) {
			// Li[i].index=i;
	     	btnMenu[i].onmouseover=(function(aa){
	     		function bb(){
				for (var i =0;i< btnMenu.length ;i++) {
					btnMenu[i].className="";
					itemMenu[i].style.display="none";
				};
					btnMenu[aa].className="on";
					itemMenu[aa].style.display="block";
				}
				return bb;
			})(i)	
		};

		var sfqMenu1 = $(".sfqMenu")[1];
		var btnMenu1=$('h3',sfqMenu1);
		var itemMenu1=$('div',$(".sfqMenu")[1]);  //注意获取方式
		for (var i =0;i< btnMenu1.length ;i++) {
			// Li[i].index=i;
	     	btnMenu1[i].onmouseover=(function(aa){
	     		function bb(){
				for (var i =0;i< btnMenu1.length ;i++) {
					btnMenu1[i].className="";
					itemMenu1[i].style.display="none";
				};
					btnMenu1[aa].className="on";
					itemMenu1[aa].style.display="block";
				}
				return bb;
			})(i)	
		};

		var sfqMenu2 = $(".sfqMenu")[2];
		var btnMenu2=$('h3',sfqMenu2);
		var itemMenu2=$('div',$(".sfqMenu")[2]);  //注意获取方式
		for (var i =0;i< btnMenu2.length ;i++) {
			// Li[i].index=i;
	     	btnMenu2[i].onmouseover=(function(aa){
	     		function bb(){
				for (var i =0;i< btnMenu2.length ;i++) {
					btnMenu2[i].className="";
					itemMenu2[i].style.display="none";
				};
					btnMenu2[aa].className="on";
					itemMenu2[aa].style.display="block";
				}
				return bb;
			})(i)	
		};
		// ******************************************


		// ------------------------------------

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

	

