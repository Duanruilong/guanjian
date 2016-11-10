<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

    <link rel="stylesheet" href="<?php echo CSS_PATH;?>drlcss/chuangxin.css">
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
            <div class="webbom_menu">
                     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0cd6a674634f9be1f9c0a2395d8075df&action=category&catid=%24top_parentid&num=20&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'order'=>'listorder ASC','limit'=>'20',));}?>
                <ul>
                    <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                             <li><a <?php if($v[catid]==$catid) { ?> class="webbom_menuOn" <?php } ?> href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?> </a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
                  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
                  

           

                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c9919c11a619a811d78bff7d348882bc&action=lists&catid=%24catid&num=4&moreinfo=1&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 4;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                 <div class="webbom_text">
               
                    <div class="bomtext_top">
                        <p><?php echo $CATEGORYS[$catid]['catname'];?></p>
                      </div> 
                         <div class="jtywList">
                            <ul>
                             <?php $n=1;if(is_array($data)) foreach($data AS $c) { ?>
                                <li><?php echo $c['content'];?></li>
                              <?php $n++;}unset($n); ?>
                            </ul>
                        </div>
                         <div class="paged" id="setpage"><?php echo $pages;?></div>  
            </div>
           
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

            </div>
        </div>
        
    </div>


<?php include template("content","footer"); ?>