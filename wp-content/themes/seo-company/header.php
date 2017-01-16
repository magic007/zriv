﻿<html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title> <?php if (is_home()||is_search()) { bloginfo('name'); } else { wp_title(''); print " - "; bloginfo('name'); } ?></title> 
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/style.css" type="text/css" media="screen" /> 
<script type="text/javascript" src="<?php bloginfo('template_url');?>/images/base.js"></script> 
<?php
	if(is_single()||is_page()) {
		if($post->post_excerpt) {
			$description = $post->post_excerpt;
		} else {
			$description = mb_strimwidth(strip_tags($post->post_content), 0, 120,"");
		}
		
		$keywords = "";
		$tags = wp_get_post_tags($post->ID);
		
		foreach($tags as $tag) {
		$keywords = $keywords . $tag->name . ", ";
		}
	


} else {
		
	$description = get_option('pake_description');
	$keywords = get_option('pake_keywords');
	

}
	if (is_category()) {
		$description = htmlentities(strip_tags(trim(category_description())),ENT_QUOTES,'UTF-8');
		}
	?>
<meta name="description" content="<?php echo $description?>" />
<meta name="keywords" content="<?php echo $keywords?>" />
<?php wp_head();// For plugins ?>
</head> 
 
<body class="home blog cat-1-id"> 
<div id="wrap"> 
	<div id="header"> 
    	<div id="blog_title"> 
        	<h1><a href="<?php bloginfo('home'); ?>/"><?php bloginfo('name') ?></a></h1> 
        </div> 
		<div id="blog_topad"> 
        	
        </div> 
        <div id="top_r"> 
		
			<span><a href="javascript:AddFavorite()">收藏本站</a> |
			<a href="" rel="nofollow">联系我们</a> | 
			<a href="" rel="nofollow">网站地图</a></span>        	
			<div class="search"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
<input name="s" type="text" id="s" onblur="if (this.value =='') this.value='Search Blog...'" onfocus="this.value=''" onclick="if (this.value=='Search Blog...') this.value=''" value="Search Blog..." class="inputbox" /> 
		<input type="submit"  id="button" value="" class="go" /> 
</form></div> 
        </div> 
        <div id="nav"> 
         <ul class="main_menu">
		 <li><a href="/index.php">首页</a>
<?php wp_list_pages('title_li=&depth=1&sort_column=post_date&sort_order=id');?>

</ul>        	<div class="nav_r"><span>投资服务热线：020-61135888</span></div> 
        </div> 
        <div class="sub"><?php if ( get_option('pake_notice') ) { ?>
<?php echo stripslashes(get_option('pake_notice')); ?><?php } ?></div> 
    </div> 
	