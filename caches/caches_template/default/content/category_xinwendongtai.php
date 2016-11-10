<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>drlcss/xinwen.css">
	<script src="<?php echo JS_PATH;?>drljs/jibenxinxi.js"></script>

<!-- num2 -->
	<div class="web_conTop">
		
		<div class="contop_Info fixed">
			
			<span class="webcon_tit"><?php echo $CATEGORYS[$catid]['catname'];?></span>
			<span class="webcon_nav">
			<span>当前位置：</span>
			<a href="<?php echo siteurl($siteid);?>">首页</a>&nbsp;&gt;&nbsp;
			<?php echo catpos($catid);?>&nbsp;<?php echo $CATEGORYS['37']['catname'];?>
		</div>
	</div>
<!-- num3 -->
	<div class="web_conBom">
		<div class="conbom_info fixed">
			<div class="webbom_menu">
	            <ul>
		           <!--  <li><a class="webbom_menuOn" href=" ">·公司简介</a></li> -->
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5a8bb9be1edf9de5712e18edf77a205c&action=category&catid=%24catid&num=25&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$catid,'order'=>'listorder ASC','limit'=>'25',));}?>
					<?php $i=0?>
					<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
					<?php $i++?>
						<?php if($i==1) { ?>
							 <li><a class="webbom_menuOn" href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?></a></li>
							<?php } else { ?>
							 <li><a href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?></a></li>
						<?php } ?>
		           
		            <?php $n++;}unset($n); ?>
		            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	            </ul>
        	</div>
        	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=04acc4b595ab8cc6c618ee1f222051e8&action=lists&num=5&catid=37&moreinfo=0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'37','moreinfo'=>'0','limit'=>'5',));}?>
        	<div class="webbom_text">
        		<?php $j?>
        		<?php $n=1;if(is_array($data)) foreach($data AS $c) { ?>
        		<?php $j++?>
        		<?php if($j==1) { ?>
					<div class="bomtext_top">
		                <p><?php echo $CATEGORYS['37']['catname'];?></p>
		            </div>
				 <div class="jtywList">

	            	<ul class="fixed">
						
						<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                       <li><a <?php if($v[catid]==$catid) { ?> class="webbom_menuOn" <?php } ?> href="<?php echo $v['url'];?>"><span><?php echo date("Y-m-d",$v[inputtime]);?></span>·<?php echo $v['title'];?> </a></li>
                    <?php $n++;}unset($n); ?>

                	</ul>
	            </div>
        		<?php } ?>
        		<?php $n++;}unset($n); ?>


        	</div>
        	<div class="paged" id="setpage">
                 <?php echo $pages;?>
                </div>
        	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
		
	</div>



<?php include template("content","footer"); ?>
