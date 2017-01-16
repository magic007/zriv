<?php
/*
Template Name: Services
*/
?>	
<?php get_header();?>                     	
                       <div id="content-inner"> 
                        	<div id="head-top-inner">
                           		<div id="head-title-inner">
                                	<h2><?php the_title();?></h2><!-- Page title here -->
                            	</div>                            	
                      	  </div>                         
                          <div class="maincontent">
                            <div class="blog-post">                     
                             <?php
                              $services_page = get_option('devster_services_pid');
                              $servicespid = get_page_by_title($services_page);
                              query_posts('post_type=page&order=ASC&post_parent='.$servicespid->ID);                             while ( have_posts() ) : the_post();
                             	?>
                              <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>  
                                <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=70&amp;w=57&amp;zc=1" alt="<?php the_title(); ?>" class="alignleft" />
                              <?php } ?>
                              <h4><a href="<?the_permalink();?>"><?php the_title();?></a></h4>
                              <p><?php the_excerpt(9);?></p>
                              <span class="read-more"><a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory');?>/images/read-more.jpg" alt="" /></a></span>                   
                              <div class="blog-posted">&nbsp;</div>
                            <?php endwhile;?>
                            </div>
                          </div>                          
                        </div>
                        <?php wp_reset_query();?>
<?php get_sidebar();?>
<?php get_footer();?>                                  