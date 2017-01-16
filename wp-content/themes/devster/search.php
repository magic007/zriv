<?php get_header();?>                     	
                       <div id="content-inner">
                        	<div id="head-top-inner">
                           		<div id="head-title-inner">
                              <?php if ( have_posts() ) :?>
                            		<h2>Search Result</h2>
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