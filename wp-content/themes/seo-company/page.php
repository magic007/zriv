<?php include (TEMPLATEPATH . '/header.php'); ?>
	<div id="mainbody">
    	<div id="left">
        	<div class="place">
				当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > <?php the_title(); ?></div>
        	<div class="content">
			<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            	                <div class="title"><h2><?php the_title(); ?></h2></div>
				<div class="conc">
                	<?php the_content(''); ?>
<div style="margin-bottom:10px"><a class="bshareDiv" target="_blank" href=""http://www.bshare.cn/share">分享&收藏</a><script language="javascript" type="text/javascript" src=""http://www.bshare.cn/button.js"></script></div>  
   <?php endwhile; ?>
      <?php endif; ?>

<div class="clear"></div>
</div>
</div>
</div>


<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
        	
    <div class="rb"></div>
	</div>
           <div class="clear"></div>
	</div><!-- #container -->
<?php get_footer(); ?>