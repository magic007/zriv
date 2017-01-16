<?php get_header();?>                     	
                       <div id="content-inner">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                        	<div id="head-top-inner">
                           		<div id="head-title-inner">
                                	<h2><?php the_title();?></h2><!-- Page title here -->
                            	</div>                            	
                      	  </div>                         
                          <div class="maincontent">
                            <?php the_content();?> 
                            <div class="blog-posted">
                                <span class="posted-left"><img src="<?php bloginfo('template_directory');?>/images/comment-icon.png" alt="" class="comment"/> <?php comments_popup_link('0 Comment','1 Comment','% Comments');?> &nbsp; | &nbsp; Posted in <?php the_category(',');?> </span>
                                <span class="posted-right"><?php the_time('F d, Y');?></span>
                            </div>
                            <div class="clr"></div>
                          <?php comments_template('', true); ?>                                    
                          </div>
                          <?php endwhile; endif;?>
                        </div>
<?php get_sidebar();?>
<?php get_footer();?>                                  