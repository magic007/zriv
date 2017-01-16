<?php get_header(); ?>
<div id="wrapper">
	<div id="slide-wrapper">
      <ul id="slideshow">


	<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if (get_option('feat_cat')) {
	$category = get_option('feat_cat');
	} else {
	$category = 0;
	}
	query_posts("cat=$category&paged=$page");
	while ( have_posts() ) : the_post() ?>

	
	 		<li>
			<h3><a href="<?php the_permalink();?>" title="<?php _e("Permanent Link to"); ?>"><?php the_title();?></a></h3>
			<span><?php $values = get_post_custom_values("Featured"); if(isset($values)) { ?><?php echo $values[0]; ?><?php } else { ?><?php bloginfo('template_directory'); ?>/images/add-feat.jpg<?php }?></span>
                  <p><span class="date">Published <?php the_time('j. F Y'); ?> at  <?php the_time( $d ); ?>  - <?php comments_number('No Comments','One Comment','% Comments'); ?></span><br/><br/>
			<?php $chars = get_option('front-chars');?>
			<?php the_slider_limit(300); ?></p>
			
                  <?php 
			$values = get_post_custom_values("Featured");
			$pathtemp = get_theme_root()."/wp-creativix";
			if(is_writeable($pathtemp)) {
			if(isset($values)) {
			?>
			<a href="<?php the_permalink();?>"><img src="<?php echo $values[0]; ?>" width="100" height="75" alt=""></a>		
			<?php
			} else {
			?>
			<a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory'); ?>/images/add-feat.jpg" width="100" height="75" alt=""></a>		
                  <?php
			} }		
			?>
			
			</li> 	                    	 
                  	  	
      
   <?php endwhile;?>         	 
                  	  	                  	   
               </ul>
      <div id="image-wrapper">
            <div id="full-image">
                  <div id="imgprev" class="imgnav"></div>
                  <div id="imglink"></div>

                  <div id="imgnext" class="imgnav"></div>
                  <div id="image"></div>
                  <div id="text">
                        <h3></h3>
                        <p></p>
                  </div>
            </div>
            <div id="thumbs">
                  <div id="arrowleft"></div>

                  <div id="frontarea">
                        <div id="fronter"></div>
                  </div>
                  <div id="arrowright"></div>
            </div>
      </div>
      <script type="text/javascript">
	$('slideshow').style.display='none';
	$('image-wrapper').style.display='block';
	var slideshow=new SLIDE.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=6;
		slideshow.link="linkhover";
		slideshow.info="text";
		slideshow.thumbs="fronter";
		slideshow.left="arrowleft";
		slideshow.right="arrowright";
		slideshow.scrollSpeed=2;
		slideshow.spacing=20;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}
</script>
</div> </div>
<div id="big-column">
<div id="column-top">
</div>
<div id="column-content">
<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if (get_option('home_cat')) {
	$category = get_option('home_cat');
	} else {
	$category = 0;
	}
query_posts("cat=$category&showposts=2&paged=$page&caller_get_posts=1");
while ( have_posts() ) : the_post() ?>

<div class="feat-post">
<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
<span class="desc"><h3>Published <?php the_time('F j, Y'); ?> at <?php the_time();?> - <?php comments_number('No Comments','1 Comment','% Comments'); ?></h3></span>
<?php the_excerpt();?>
<?php $values = get_post_custom_values("Featured");
$pathtemp = get_theme_root()."/wp-creativix";
if(is_writeable($pathtemp)) {
if(isset($values)) {
?>
<a href="<?php the_permalink();?>"><img src="<?php echo $values[0]; ?>" width="295" height="100" alt=""> </a>		
<?php
}}
?>
</div>
<?php endwhile;?>  



<div class="latest-posts">
<h2><a href="#">Latest Articles</a></h2>
<span class="desc"><h3>Latest Articles from the Blog</h3></span>
<ul class="latest-posts">
<?php $temp_query = $wp_query; ?>
<?php query_posts('cat=0&showposts=8'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $do_not_duplicate[$post->ID] = $post->ID; ?>
<li><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a><span class="date">Published <?php the_time('F j, Y'); ?> at <?php the_time();?></span></li>
<?php endwhile; else: ?>
<?php endif; ?>	
</ul>

</div>

</div>

<?php get_footer(); ?>
