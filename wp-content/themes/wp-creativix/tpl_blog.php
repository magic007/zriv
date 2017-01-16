<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="sub-column">

<div id="sub-top">
<?php include(TEMPLATEPATH."/scripts/breadcrumb.php");?>
</div>
<div id="sub-content">
<div class="content">
<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('showposts=10'.'&paged='.$paged);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="post">
<h1><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h1>
<span class="category"><?php the_category(' ') ?></span><span class="date">Published <?php the_time('F j, Y'); ?> at <?php the_time();?></span> <span class="category"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
<?php the_excerpt();?>
<div class="blogpic">
<?php $values = get_post_custom_values("Blog");
$pathtemp = get_theme_root()."/wp-creativix";
if(is_writeable($pathtemp)) {
if(isset($values)) {
?>
<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $values[0]; ?>&h=300&w=610&zc=1" alt="">		
<?php
} 
} elseif (isset($values)) {
?>
<img src="<?php echo $values[0]; ?>" width="610" height="300" alt="">		
<?php
}
?>
</div>		
</div>

<?php endwhile; ?>

<?php
include(TEMPLATEPATH."/scripts/wp-pagenavi.php");
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
