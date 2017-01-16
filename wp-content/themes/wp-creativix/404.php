<?php get_header(); ?>

<div id="sub-column">

<div id="sub-top">
<?php include(TEMPLATEPATH."/scripts/breadcrumb.php");?>
</div>
<div id="sub-content">
<?php if (have_posts()) : 
while (have_posts()) : the_post();?>

<div class="content">
           
<div class="post">
<h1><?php the_title();?></h1>
<span class="category"><?php the_category(', ') ?></span><span class="date">Published <?php the_time('F j, Y'); ?> at <?php the_time();?></span> <span class="category"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
<?php the_excerpt();?>
<div class="blogpic">
<?php $values = get_post_custom_values("Blog");?>
<?php if(isset($values)) {
?>
<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $values[0];?>&w=610&h=300&zc=1" alt="">
<?php
}
?>
</div>
</div>
<?php endwhile;?>

<?php else: ?>
<div class="content">
<div class="post">
<h1>Error 404 - Page not found </h1>
<p>The page you are looking for is not available, please type in a correct link.</p>
</div>

<?php endif; ?>   

 </div>  

   
           
 <?php get_sidebar(); ?>            

<?php get_footer(); ?>