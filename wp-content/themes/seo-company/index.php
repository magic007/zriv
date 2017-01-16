
<?php include (TEMPLATEPATH . '/header.php'); ?>
<div id="mainbody">
    	<div id="left">
        	<div class="banner"><h2><?php if ( get_option('pake_about') ) { ?>
       <?php echo stripslashes(get_option('pake_about')); ?>
		<?php } ?></h2>
        		<p><?php if ( get_option('pake_ad_postbottom') ) { ?>
        	<?php echo stripslashes(get_option('pake_ad_postbottom')); ?>
		<?php } ?></p>
        	</div>
        	<div id="main"><h2>服务内容</h2>
                <ul>
                	<li class="s1"><h3><?php if ( get_option('pake_fuwu1') ) { ?>
       <?php echo stripslashes(get_option('pake_fuwu1')); ?><?php } ?></h3><p><?php if ( get_option('pake_fuwu1_nr') ) { ?>
       <?php echo stripslashes(get_option('pake_fuwu1_nr')); ?><?php } ?></p></li>
                	<li class="s2"><h3><?php if ( get_option('pake_fuwu2') ) { ?>
       <?php echo stripslashes(get_option('pake_fuwu2')); ?><?php } ?></h3><p><?php if ( get_option('pake_fuwu2_nr') ) { ?>
       <?php echo stripslashes(get_option('pake_fuwu2_nr')); ?><?php } ?></p></li>
                	<li class="s3"><h3><?php if ( get_option('pake_fuwu3') ) { ?>
       <?php echo stripslashes(get_option('pake_fuwu3')); ?><?php } ?></h3><p><?php if ( get_option('pake_fuwu3_nr') ) { ?>
       <?php echo stripslashes(get_option('pake_fuwu3_nr')); ?><?php } ?></p></li>
                </ul>
            </div>

            <div class="news">
			
            	<div class="box1">
				<?php if (get_option('home_catid1')) { $catid1 = get_option('home_catid1'); } ?>
				<h4><?php wp_list_categories('include='.$catid1.'&title_li=&style=none'); ?></h4>
                	<ul>
					<?php query_posts('cat='.$catid1.'&showposts=8'); ?><!--输出ID=1的分类最新的8篇文章-->
		            <?php while (have_posts()) : the_post(); ?>
                    <li><span><?php the_time('m-d'); ?></span>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>     
					<?php endwhile; ?>               
					</ul>
                </div>
                <div class="box2">
				<?php if (get_option('home_catid2')) { $catid2 = get_option('home_catid2'); } ?>
				<h4><?php wp_list_categories('include='.$catid2.'&title_li=&style=none'); ?></h4>
                	<ul>
					<?php query_posts('cat='.$catid2.'&showposts=8'); ?><!--输出ID=527的分类最新的8篇文章-->
		            <?php while (have_posts()) : the_post(); ?>
                    <li><span><?php the_time('m-d'); ?></span>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>     
					<?php endwhile; ?>               
					</ul>
                </div>
            </div>
        </div>
        	
<?php include (TEMPLATEPATH . '/qq.php'); ?>


                        <div class="type"><h3>文章分类</h3>
        	<ul>
            		
	<?php wp_list_categories('title_li=&orderby=name&hide_empty=0&show_count=1&depth=1');?>

            </ul>
        </div>
            <div class="sidebox">
        	<h3>最近更新</h3>
			
            <ul>
			<?php global $query_string1;query_posts($query_string1.'&posts_per_page=10&caller_get_posts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
            	<li>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</li>   
				<?php endwhile; ?>   
		</ul>
        </div>
                        <div class="rb"></div>
	</div>
           <div class="clear"></div>
	</div><!-- #container -->
    <div id="links">
    	<h5>友情连接：</h5>
        <ul>
        	<li><?php wp_list_bookmarks('title_li=&title_before=&title_after=&categorize=0&orderby=id&order=ASC'); ?></li> 
        </ul>
    </div>
<?php get_footer(); ?>