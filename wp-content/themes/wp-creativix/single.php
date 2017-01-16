<?php get_header(); ?>

<div id="sub-column">

<div id="sub-top">
<?php include(TEMPLATEPATH."/scripts/breadcrumb.php");?>
</div>
<div id="sub-content">
<div class="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h1><?php the_title();?></h1>
<span class="category"><?php the_category(' ') ?></span><span class="date">Published <?php the_time('F j, Y'); ?> at <?php the_time();?></span> <span class="category"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
<?php the_content();?>
<?php the_tags( '<p class="meta">Tags: ', ', ', '</p>'); ?>
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
<?php edit_post_link('Edit Post'); ?>
<?php endwhile; endif;?>
<div id="comment-wrap">
<?php comments_template(); ?>
</div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
