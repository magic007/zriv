<div class="breadcrumb">
  <?php if (is_home()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a></p>
  <?php } ?>
  <?php if (is_tag() ) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="#" rel="bookmark" title="Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;">Posts Tagged &#8216;
    <?php single_tag_title(); ?>
    &#8217;</a></p>
  <?php } ?>
  <?php if (is_category()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="#" title="<?php single_cat_title(); ?>">
    <?php single_cat_title(); ?>
    </a> </p>
  <?php } ?>
  <?php if (is_page()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo;
    <?php
	global $wp_query;
	if (empty($wp_query->post->post_parent) ) {
		$parent = $wp_query->post->ID;
		echo '';
	} else {
		$parent = $wp_query->post->post_parent;
		echo '<a href="'.get_permalink($parent).'">'.get_the_title($parent).'</a> &raquo;';
	}
?>
    <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
    <?php the_title(); ?>
    </a></p>
  <?php } ?>
  <?php if (is_single()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo;
    <?php the_category(', ') ?>
    &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
    <?php the_title(); ?>
    </a></p>
  <?php } ?>
  <?php if (is_search()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a></p>
  <?php } ?>
  <?php if (is_404()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="#" title="404 Error page">404 Error</a></p>
  <?php } ?>
  <?php if (is_year()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="<?php bloginfo('siteurl'); ?>/archives" title="archives"><span>archives</span></a> &raquo; <a href="#" title="Year">
    <?php the_time('Y'); ?>
    </a></p>
  <?php } ?>
  <?php if (is_month()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="<?php bloginfo('siteurl'); ?>/archives" title="archives"><span>archives</span></a> &raquo; <a href="#" title="Month">
    <?php the_time('F, Y'); ?>
    </a></p>
  <?php } ?>
  <?php if (is_day()) { ?>
  <p> <strong>You are here:</strong> <a href="<?php bloginfo('siteurl'); ?>" title="home"><span>Home</span></a> &raquo; <a href="<?php bloginfo('siteurl'); ?>/archives" title="archives"><span>archives</span></a> &raquo; <a href="#" title="Month">
    <?php the_time('F jS, Y'); ?>
    </a></p>
  <?php } ?>
</div>