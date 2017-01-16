<?php get_header();?>                     	
                       <div id="content-inner">
                        	<div id="head-top-inner">
                           		<div id="head-title-inner">
                              <?php if ( have_posts() ) :?>
                             	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                             	  <?php /* If this is a category archive */ if (is_category()) { ?>
                            		<h2><?php single_cat_title(); ?></h2>
                             	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                            		<h2>Posts Tagged <?php single_tag_title(); ?></h2>
                             	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                            		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
                             	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                            		<h2>Archive for <?php the_time('F, Y'); ?></h2>
                             	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                            		<h2>Archive for <?php the_time('Y'); ?></h2>
                            	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                            		<h2>Author Archive</h2>
                             	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            		<h2>Blog Archives</h2>
                             	  <?php } ?>
                            	</div>                            	
                      	  </div>                         
                          <div class="maincontent">
                            <?php
                              $numtext = (get_option('devster_blogtext')) ? get_option('devster_blogtext') : 40;
                              while ( have_posts() ) : the_post();
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
                              <?php endwhile; ?>
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
                          <?php endif;?>
                        </div>
<?php get_sidebar();?>
<?php get_footer();?>                                  