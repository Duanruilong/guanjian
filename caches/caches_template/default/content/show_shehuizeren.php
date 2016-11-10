<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>drlcss/women.css">

<!-- num2 -->
	<div class="web_conTop">
		
		<div class="contop_Info fixed">
			
			<span class="webcon_tit"><?php echo $CATEGORYS[$top_parentid]['catname'];?></span>
			<span class="webcon_nav">
			<span>当前位置：</span>
			<a href="<?php echo siteurl($siteid);?>">首页</a>&nbsp;&gt;&nbsp;
			<?php echo catpos($catid);?>
		</div>
	</div>
<!-- num3 -->
	<div class="web_conBom">
		<div class="conbom_info fixed">
			 <div class="webbom_menu">
                     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=41dbeaeb8ed410edf58c0033adc9bfde&action=lists&catid=%24top_parentid&num=20&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$top_parentid,'order'=>'listorder ASC','limit'=>'20',));}?>
                <ul>
                    <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                             <li><a <?php if($v[catid]==$catid) { ?> class="webbom_menuOn" <?php } ?> href="<?php echo $v['url'];?>">·<?php echo $v['title'];?> </a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
                  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=55334d2c6c7a8df529be6ce2bb1bd0fe&action=lists&catid=%24catid&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','limit'=>'20',));}?>
        	<div class="webbom_text">
        		<?php $n=1;if(is_array($data)) foreach($data AS $c) { ?>
					<div class="bomtext_top">
		                <p><?php echo $CATEGORYS[$catid]['catname'];?></p>
		              </div>    
						<div class="content_detail">
							<span id="content">
			                	<?php echo $c['content'];?>
							</span>
						</div>
        		<?php $n++;}unset($n); ?>

        	</div>
        	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</div>
		
	</div>


<?php include template("content","footer"); ?>