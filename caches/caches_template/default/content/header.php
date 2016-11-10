<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">

	<script type="text/javascript" src="<?php echo JS_PATH;?>drljs/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>drlcss/index.css">
	<script src="<?php echo JS_PATH;?>drljs/function.js"></script>
	<script src="<?php echo JS_PATH;?>drljs/animate.js"></script>
	<script src="<?php echo JS_PATH;?>drljs/jquery-1.12.4.min.js"></script>
	<script src="<?php echo JS_PATH;?>drljs/indexjq.js"></script>
	
</head>

<body>
<div class="max" >


	<!--頂部-->
	<div class="header">
		<div class="header_info">
			<div class="logo">
				<a href="<?php echo siteurl($siteid);?>"></a>
			</div>
			<div class="menu">
				<div class="search fixed">
					<a class="language" href="#">ENGLISH</a>
					<input type="submit" class="submit" value="" name="">
					<input type="" class="search1" onfocus="if(this.value==this.defaultValue){this.value='';this.className='search2'}" onblur="if(this.value==''){this.value='请输入关键字';this.className='search1'}"  value="请输入关键字" name="keywords">
				</div>
				<div class="nav">
					<ul id="nav">
						<li class="nav_1 nav_on1 ">
							<a href="<?php echo siteurl($siteid);?>" style="background:url(<?php echo IMG_PATH;?>drlimg/nav.gif) no-repeat 15px -30px;"></a>
						</li>
						<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=34f41a2f71fbaddd09c776baa0d17b3c&action=category&catid=0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','limit'=>'20',));}?>
						<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>

						<li class="nav_2 nav_on" id="li-1">
						<a <?php if($v[catid]==$top_parentid) { ?> style="color:blue" <?php } ?> href="<?php echo $v['url'];?>" ><span class="tabs-hide">|</span><?php echo $v['catname'];?></a>
							
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8c36ba9b013735a9ce69325f4cc0188b&action=category&catid=%24v%5Bcatid%5D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$v[catid],'limit'=>'20',));}?>
							
							<ul class="nav_sub nav_subpos" >
							<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
							<!-- <?php var_dump ($r)?> -->
								<li><a href="<?php echo $r['url'];?>" ><?php echo $r['catname'];?></a></li>
							
							<?php $n++;}unset($n); ?>
							</ul>
							
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						</li>
						<?php $n++;}unset($n); ?>
						
					</ul>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
				
			</div>
		</div>
	</div>	
	
