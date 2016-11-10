$(function(){
	// 导航
	$('.nav_on').hover(function(){
		$(this).find('.nav_sub').slideDown('slow');
	},function(){
		$(this).find('.nav_sub').hide();
	})


//banner
	var bannerbtn=$('.banner_btn li');
	 var banner=$('.bannertitle a');
	 var bann_size=$('.bannertitle a').size();
	  var ib=0;
	 console.log(bann_size)
	 bannerbtn.first().addClass('banner_hot');
	  bannerbtn.mouseover(function(event){
	  	var index=$(this).index();
	  	ib=index;
		bannerbtn.eq(index).addClass('banner_hot').siblings().removeClass('banner_hot');
		banner.fadeOut().eq(index).fadeIn('slow')
	  })
	  var t_banner=setInterval(move_bann,3000);
	  banner.hover(function(){
	  	clearInterval(t_banner)
	  },function(){
	  	t_banner=setInterval(move_bann,3000)
	  })
	  	
	  function move_bann(){
	  	ib++;
		if (ib==bann_size) {
			ib=0;
			}
	  	banner.hide().eq(ib).fadeIn('slow');
		bannerbtn.eq(ib).addClass('banner_hot').siblings().removeClass('banner_hot');
	  }
	

// 右banner
	// var pic=$('.pic');
	// 	var btnsFocus=$('.num li');
	// 	var clone=$('pic a').first().clone();// 获取第一个克隆
	// 	var size=$('pic a').size();
	// 	var i=0;
	// 	btnsFocus.first().addClass('current');
	// 	// 鼠标划入
	// 	btnsFocus.hover(function(){
	// 		var index=$(this).index(); // 获取当前元素索引值
	// 		i=index;  //修复bug
	// 		banner.stop().animate({left:-index*178},1000);
	// 		btnsFocus.addClass('current').siblings().removeClass('current');
	// 	})



		var bannerFocus = $(".pic")[0];
		var imgFocus=$('img',bannerFocus);
		var imgWFocus=parseInt(getStyle(imgFocus[0],'width'));
		var btnsFocus=$('li',$(".num")[0]);  //注意获取方式
	 	btnsFocus.first().addClass('current');

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
			btnsFocus[i].onmouseover=function(){
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











// 集团要闻
	var hb=$('.hb ul li');
	var bd=$('.bd ul');
	hb.first().addClass('on');
	hb.mouseover(function(){
	 	var index=$(this).index();
		hb.eq(index).addClass('on').siblings().removeClass('on');
		bd.hide().eq(index).fadeIn(300)
	})

//重点发展方向
	


	// var btnMebu=$('.sideMenu h3');
	// console.log(btnMebu);
	// var itemMebu=$('.sideMenu ul');
	// btnMebu.first().addClass('hoot');
	// btnMebu.hover(function(){
	// 	var index1=$(this).index();
	// 	console.log(index1);
	// 	btnMebu.eq(index1).addClass('hoot').siblings().removeClass('hoot');
	// 	itemMebu.hide().eq(index1).show()
	// },function(){
	// 	itemMebu.eq(index1).hide()
	// })

	// var btnMenu=$('.sfqMenu h3');
	// var itemMenu=$('.sfqMenu ul');
	// btnMenu.first().addClass('hoot');
	// btnMenu.hover(function(){
	// 	var index=$(this).index();
	// 	btnMenu.eq(index).addClass('hoot').siblings().removeClass('hoot');
	// 	itemMenu.hide().eq(index).show()
	// })


	var sideMenu = $(".sideMenu")[0];
		var btnMebu=$('h3',sideMenu);
		var itemMebu=$('ul',$(".sideMenu")[0]);  //注意获取方式
	 	

		for (var i =0;i< btnMebu.length ;i++) {
			itemMebu.first().css({display:"block"})
			// Li[i].index=i;
	     	btnMebu[i].onmouseover=(function(aa){
	     		function bb(){
				for (var i =0;i< btnMebu.length ;i++) {
					btnMebu[i].className="";
					itemMebu[i].style.display="none";
				};
					btnMebu[aa].className="hoot";
					itemMebu[aa].style.display="block";
				}
				return bb;
			})(i)	
		};


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

		// 二维码
		$('.toer').hover(function(){
			$('.footerimg').show()
		},function(){
			$('.footerimg').hide()
		})

		// TOP
		$(window).scroll(function(){   //scroll()
			var t=$(this).scrollTop()
			// document.title=t
			if (t>200) {
				$('.TOP').stop().fadeIn()
			}else{
				$('.TOP').stop().fadeOut()
			}
		})
		$('.TOP').click(function(){
			$('body,html').stop().animate({scrollTop:0},500)
		})


})