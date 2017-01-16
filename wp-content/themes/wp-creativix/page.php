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
<?php the_content();?>
</div>
<?php endwhile; endif;?>

<?php comments_template(); ?>
<div class="linkpages"><?php wp_link_pages('before=<strong>'.__('Pages:').'</strong>&pagelink=<span>'.__('Page %').'</span>'); ?></div>
<?php edit_post_link('Edit Post'); ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>