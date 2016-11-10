<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>drlcss/jingji.css">
	<script src="<?php echo JS_PATH;?>drljs/jibenxinxi.js"></script>

<!-- num2 -->
	<div class="web_conTop">
		
		<div class="contop_Info fixed">
			
			<span class="webcon_tit"><?php echo $CATEGORYS[$catid]['catname'];?></span>
			<span class="webcon_nav">
			<span>当前位置：</span>
			<a href="<?php echo siteurl($siteid);?>">首页</a>&nbsp;&gt;&nbsp;
			<?php echo catpos($catid);?>&nbsp;<?php echo $CATEGORYS[$top_parentid]['catname'];?>
		</div>
	</div>
<!-- num3 -->
	<div class="web_conBom">
		<div class="conbom_info fixed">
           <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0cd6a674634f9be1f9c0a2395d8075df&action=category&catid=%24top_parentid&num=20&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'order'=>'listorder ASC','limit'=>'20',));}?>
			<div class="webbom_menu">
	            <ul>
              	<?php $i=0?>
               	<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                <?php $i++?>
                <?php if($i==1) { ?>
                  <li>
                     <a  class="webbom_menuOn"  href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?></a>
                        <ul class="bom_submenu">
                          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b491042baeda923b4bf79fce15562384&action=category&catid=%24top_parentid&num=3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'limit'=>'3',));}?>
                          <?php $n=1;if(is_array($data)) foreach($data AS $f) { ?>
                           <li><a href="<?php echo $f['url'];?>">- <?php echo $f['catname'];?></a></li>
                            <?php $n++;}unset($n); ?>
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </ul>
                   </li>
                 <?php } else { ?>
                    <li><a href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?></a></li>
                    	
                      <?php } ?>

                     
                   <?php $n++;}unset($n); ?>   
              	</ul>
		            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		            
	            </ul>
        	</div>


			 <div class="webbom_text">
            <div class="zyyw">
                <p><?php echo $CATEGORYS[$catid]['catname'];?></p>
                </div>
                <div class="hjgc_list">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fc8f726799c233dea9bb98e21083dbcd&action=lists&catid=%24catid&num=10&moreinfo=1&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>

                <ul style="background: transparent none repeat scroll 0% 0%; padding: 0px;" id="hjgcList">
                <?php $n=1;if(is_array($data)) foreach($data AS $c) { ?>
                <li class="fixed">
                  <div class="hjgcImg">
                    <a href="<?php echo $c['url'];?>"><span></span>
                      <img src="<?php echo $c['thumb'];?>">
                    </a>
                  </div>
                  <div class="hjgcInfo">
                    <span class="fixed">
                      <p>
                        <a href=" <?php echo $c['url'];?>"><?php echo $c['title'];?></a>
                      </p>
                    </span>
                    <p class="hjgctext"><?php echo str_cut(strip_tags($c[content]),300,'.');?></p>
                    <!-- <p class="hjgctext"><?php echo str_cut($c[description],400,'.');?></p> -->
                    <br>
                    <p class="hjgctime">承建单位：广州市市政集团</p>
                    <!-- <p class="hjgctime">承建单位：<?php echo $c['description'];?></p> -->
                  </div>
                </li>
               <?php $n++;}unset($n); ?>
                
       
         </ul>
         <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
               <div class="paged" id="setpage"><?php echo $pages;?></div>  
       			
            
          </div>


		</div>
		
	</div>



<?php include template("content","footer"); ?>
