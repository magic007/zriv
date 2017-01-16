<?php get_header(); ?>


<div id="sub-column">

<div id="sub-top">
<?php include(TEMPLATEPATH."/scripts/breadcrumb.php");?>
</div>
<div id="sub-content">
<div class="content">
      
<?php if (have_posts()) : 
echo"<h1>"; ?>
				
<?php if (is_day()) { ?>
Archive for <?php the_time('F jS, Y'); ?>
				
<?php } elseif (is_month()) { ?>
Archive for <?php the_time('F, Y'); ?>

<?php } elseif (is_category()) { ?>				
Archive for <?php echo single_cat_title(); ?>

<?php } elseif (is_author()) { ?>
Author Archive
			
<?php } elseif (is_year()) { ?>
Archive for <?php the_time('Y'); ?>
				
<?php } elseif (is_search()) { ?>
Search Results
							
<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
Blog Archives
<?php }
echo"</h1>";
while (have_posts()) : the_post();	?>
			 	
<div class="post">
<span class="meta"><?php echo $punchline; ?></span> 
<h1><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h1>
<span class="category"><?php the_category(' ') ?></span><span class="date">Published <?php the_time('F j, Y'); ?> at <?php the_time();?></span> <span class="category"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>

<?php the_excerpt(__('continue reading...')); ?>
</div>
<?php endwhile; else: ?>

<div class="post">
<h1>Nothing found</h1>
<p>Sorry, no posts matched your criteria.</p>
</div>
	
<?php endif; ?>
</div>      
           
<?php get_sidebar(); ?>            
          	            
<?php get_footer(); ?>