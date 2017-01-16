<?php get_header(); ?>

<div id="sub-column">

<div id="sub-top">
<?php include(TEMPLATEPATH."/scripts/breadcrumb.php");?>
</div>
<div id="sub-content">
<div class="content">

<?php if (have_posts()) : ?>
<h1>Search <strong>Results</strong></h2>	

	<?php while (have_posts()) : the_post(); ?>

	<div class="post">	

	<h1><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h1>
	<span class="category"><?php the_category(', ') ?></span><span class="date">Published <?php the_time('F j, Y'); ?> at <?php the_time();?></span> <span class="category"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
	<?php the_excerpt();?>
	</div>
	
<?php endwhile; ?>
</div>
	<?php else: ?>

	<h1>Sorry, no Posts matched your Criteria</h1>
		<?php get_search_form();?>
	</div>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
