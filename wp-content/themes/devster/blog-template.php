<?php
/*
Template Name: Blog
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
                             <?php
                                $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $blog_cat = get_option('devster_news_cid');
                                $blog_num = get_option('devster_blog_num');
                                $numtext = (get_option('devster_blogtext')) ? get_option('devster_blogtext') : 40;
                                query_posts("category_name=$blog_cat&showposts=$blog_num&paged=$page");
                        
                                if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                $wp_query->is_home = false;
                            	?>
                              <div class="blog-post">                     
                              <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>  
                                <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=128&amp;w=128&amp;zc=1" alt="<?php the_title(); ?>" class="alignleft" />
                              <?php } ?>
                              <h4><a href="<?the_permalink();?>"><?php the_title();?></a></h4>
                              <p><?php excerpt($numtext);?></p>
                              <span class="read-more"><a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory');?>/images/read-more.jpg" alt="" /></a></span>                   
                              <div class="blog-posted">
                                  <span class="posted-left"><img src="<?php bloginfo('template_directory');?>/images/comment-icon.png" alt="" class="comment"/> <?php comments_popup_link('0 Comment','1 Comment','% Comments');?> &nbsp; | &nbsp; Posted in <?php the_category(',');?> </span>
                                  <span class="posted-right"><?php the_time('F d, Y');?></span>
                              </div>
                              </div>
                              <?php endwhile; endif;?>
                          </div>
                          <div class="blog-pagination"><!-- page pagination -->                                       	     			<?php 
                				  if (function_exists('wp_pagenavi')) :
                				    wp_pagenavi();
                				  else : 
                				?>
                      		<div class="navigation">
                      			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                      			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                      			<div class="clear"></div>
                      		</div>
                        <?php endif;?>                          
                        </div>
                      </div>
                        <?php wp_reset_query();?>
<?php get_sidebar();?>
<?php get_footer();?>                                  