<?php include (TEMPLATEPATH . '/header.php'); ?>
	<div id="mainbody">
    	<div id="left">
        	<div class="place">
				&#8216;<?php echo esc_html( get_search_query() ); ?>&#8217; 的搜索结果          </div>
    		<div class="content">

			<?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
				  <div class="post" id="post-<?php the_ID(); ?>">
            		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a><span>发布时间：<?php the_time('Y-m-d'); ?> </span></h2>
					<div class="intro">
						 <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 270,"..."); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">详细内容</a>					<div class="clear"></div>
					</div>
            	</div> <?php endwhile; ?> <?php endif; ?>

            	  <div class='pagination'><?php par_pagenavi(); ?></div>
			</div><!-- #content -->
        </div>
        	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>

		        <div class="rb"></div>
	</div>
           <div class="clear"></div>
	</div><!-- #container -->


<?php get_footer(); ?>