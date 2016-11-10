<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

    <link rel="stylesheet" href="<?php echo CSS_PATH;?>drlcss/wenhua.css">
    <script src="<?php echo JS_PATH;?>drljs/jibenxinxi.js"></script>
    
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
     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0cd6a674634f9be1f9c0a2395d8075df&action=category&catid=%24top_parentid&num=20&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'order'=>'listorder ASC','limit'=>'20',));}?>
      <div class="webbom_menu">
          
              <ul>
               <?php $i=0?>
               <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                <?php $i++?>
                 <?php if($i==1) { ?>
                  <li>
                     <a <?php if($v[catid]==$catid) { ?> class="webbom_menuOn" <?php } ?> href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?></a>
                        <ul class="bom_submenu">
                         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b491042baeda923b4bf79fce15562384&action=category&catid=%24top_parentid&num=3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'limit'=>'3',));}?>
                          <?php $n=1;if(is_array($data)) foreach($data AS $f) { ?>
                           <li><a href="<?php echo $f['url'];?>">- <?php echo $f['catname'];?></a></li>
                            <?php $n++;}unset($n); ?>
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </ul>
                   </li>
                      <?php } else { ?>
                    <li><a  <?php if($v[catid]==$catid) { ?> class="webbom_menuOn" <?php } ?> href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?></a></li>
                      <?php } ?>
                  
                    
                     
                    
                   <?php $n++;}unset($n); ?>   
              </ul>
              <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </div>
          <div class="webbom_text">
            <div class="bomtext_top">
                <p><?php echo $CATEGORYS[$catid]['catname'];?></p>
                </div>
                <div class="hjgc_list">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c9919c11a619a811d78bff7d348882bc&action=lists&catid=%24catid&num=4&moreinfo=1&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 4;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>

                <ul style="background: transparent none repeat scroll 0% 0%; padding: 0px;" id="hjgcList">
                <?php $n=1;if(is_array($data)) foreach($data AS $c) { ?>
                <!-- <?php var_dump($c)?> -->
                <li class="fixed">
                    <div class="hjgcInfo" style="padding:20px 0 50px 50px"><?php echo $c['content'];?></div>
                </li>
               <?php $n++;}unset($n); ?>
                
       
         </ul>
         <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
         
            
          </div>
    </div>
  </div>


<?php include template("content","footer"); ?>