<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo wp_specialchars($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript">
   jQuery(document).ready(function($) {  
		$('#slides-cu3er').cycle({
            timeout: 6000,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:      'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...                        
            pause:   0,	  // true to enable "pause on hover"
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
        });
		         
     });
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/cufon-yui.js"></script>

  <?php $twitter_id = get_option('devster_twitter_id');?>
  <script type="text/javascript">
  getTwitters('twitter-code', { 
	  id: '<?php echo $twitter_id;?>', 
	  count: 1, 
	  enableLinks: true, 
	  ignoreReplies: true, 
	  clearContents: true
	});
	</script>
      
</head>
<body>

	<!-- MAIN_CONTAINER -->
		<div id="main_container">
        
        	<!-- FRAME -->
				<div id="frame">
                   	<!-- BEGIN HEADER -->
						<div id="top">
              <div id="logo">
								<div id="pad_logo">
    							 <?php $logo_url  = get_option('devster_logo');?>
    								<a href="<?php bloginfo('url');?>"><img src="<?php if ($logo_url != "") {echo $logo_url;} else { echo bloginfo('template_directory').'/images/logo.gif';}?>" alt="<?php bloginfo('blogname');?>" /></a>
								</div>
							</div>
                <div id="topmenu">
                    <div id="nav">
                        <ul id="menu">
                          <li <?php if (is_home()) echo 'class="current"';?>><a href="<?php bloginfo('url');?>">首页</a></li>
                          <?php $_exclude_pages = get_option('devster_exclude_pages');?>
                          <?php wp_list_pages('title_li=&sort_column=menu_order&depth=1&exclude='.$_exclude_pages);?>      
                        </ul>
                    </div>
                </div>                            							
</div>
            <?php if (is_home()) : ?>
            <div id="head-top">
                <div id="head-title">
                    <h2><?php echo get_option('blogdescription');?></h2><!-- Page title here -->
                </div>
                <div id="rss">
                    <div class="rss-text"><a href="#">订阅本站</a></div>
                    <div class="rss-img"><a href="<?php bloginfo('rss2_url');?>"><img src="<?php bloginfo('template_directory');?>/images/rss.gif" alt="" /></a></div>
           		</div>                            	
            </div>
            <?php endif;?>
                        
					<!-- END OF HEADER -->
                    
          <?php if (is_home()) include (TEMPLATEPATH.'/slideshow.php');?>                                                    
                     <!-- BEGIN CONTENT -->
                     <div id="content">