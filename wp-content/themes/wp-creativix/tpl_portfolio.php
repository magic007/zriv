<?php
/*
Template Name: Portfolio
*/
?>

<?php include(TEMPLATEPATH."/header-portfolio.php");?>

<div id="sub-column">

<div id="sub-top">
<?php include(TEMPLATEPATH."/scripts/breadcrumb.php");?>
</div>
<div id="column-content">
<div id="portfolio">
<?php
$portfolio = get_option('port_cat');
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
if (get_option('port_cat')) {
$category = get_option('port_cat');
} else {
$category="0";
}
$wp_query->query('cat='.$category.'&paged='.$paged);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="port-pic">
<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>

 <?php 
$values = get_post_custom_values("Featured");
$pathtemp = get_theme_root()."/wp-creativix";
if(is_writeable($pathtemp)) {
if(isset($values)) {
?>
<a class="bumpbox" href="<?php echo $values[0]; ?>" rev="<?php the_title();?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $values[0];?>&h=130&w=250&zc=1" alt=""></a>
<?php
} else {
?>
<a class="bumpbox" href="<?php bloginfo('template_directory'); ?>/images/add-feat.jpg" rev="<?php the_title();?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/add-feat.jpg&h=130&w=250&zc=1" alt=""></a>		
<?php
} 
} elseif (isset($values)) {
?>
<a class="bumpbox" href="<?php echo $values[0]; ?>" rev="<?php the_title();?>"><img src="<?php echo $values[0]; ?>" width="250" height="130" alt=""> </a>		
<?php
} else {
?>
<a class="bumpbox" href="<?php bloginfo('template_directory'); ?>/images/add-feat.jpg" rev="<?php the_title();?>"><img src="<?php bloginfo('template_directory'); ?>/images/add-feat.jpg" width="250" height="130" alt=""> </a>		
<?php
}
?>
<?php the_excerpt();?>
</div>
<?php endwhile; ?>

<?php
include(TEMPLATEPATH."/scripts/wp-pagenavi.php");
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
?>

</div>
</div>
<?php get_footer(); ?>
