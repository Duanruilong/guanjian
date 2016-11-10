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
            <div class="webbom_menu">
                     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0cd6a674634f9be1f9c0a2395d8075df&action=category&catid=%24top_parentid&num=20&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$top_parentid,'order'=>'listorder ASC','limit'=>'20',));}?>
                <ul>
                    <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                             <li><a <?php if($v[catid]==$catid) { ?> class="webbom_menuOn" <?php } ?> href="<?php echo $v['url'];?>">·<?php echo $v['catname'];?> </a></li>
                    <?php $n++;}unset($n); ?>
                </ul>
                  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
                  
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=349ec6e51df2777796a817b6d661a198&action=lists&catid=%24catid&num=1&page=%24page&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 1;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            
            <div class="webbom_text">
                    <?php $n=1;if(is_array($data)) foreach($data AS $c) { ?>
                    <div class="bomtext_top">
                        <p><?php echo $CATEGORYS[$catid]['catname'];?></p>
                    </div>
                    <div class="bomtext_tit">
                        <img src="<?php echo $c['thumb'];?>" height="175" width="672" alt="">
                    </div>
                 <div class="jtywList">
                    <ul class="fixed">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=afb8a67587721564fc584d42041ef163&action=lists&catid=%24catid&num=4&page=%24page&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 4;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                         <?php $n=1;if(is_array($data)) foreach($data AS $b) { ?>
                        <li>
                            <a href="<?php echo $b['url'];?> "><span><?php echo date("Y-m-d",$b[inputtime]);?></span>·<?php echo $b['title'];?></a>
                        </li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>

                


            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                </div>
                <?php $n++;}unset($n); ?>
            </div>
            <div class="paged" id="setpage">
                 <?php echo $pages;?>
                </div>
        </div>
        
    </div>


<?php include template("content","footer"); ?>