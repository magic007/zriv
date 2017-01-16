<?php include (TEMPLATEPATH . '/header.php'); ?>
	<div id="mainbody">
    	<div id="left">
        	<div class="place">
				<?php /* If this is a category archive */ if (is_category()) { ?>
            <div class="subnavi-l">当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a> > <?php the_category(', ') ?></div>
			
          <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <div class="subnavi-l">搜索到符合 <strong><?php single_tag_title(); ?></strong> 标签的相关文章</div>

          <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <div class="subnavi-l">搜索到 <strong><?php the_time('Y, F jS'); ?></strong> 时间内的文章</div>
          <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <div class="subnavi-l">搜索到 <strong><?php the_time('Y, F'); ?></strong> 时间内的文章</div>
          <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <div class="subnavi-l">搜索到 <strong><?php the_time('Y'); ?></strong> 时间内的文章</div>
          <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <div class="subnavi-l">搜索到该作者的所有文章</div>
          <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <div class="subnavi-l"><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> 存档</div>
          <?php } ?>            </div>
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