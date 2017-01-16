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
                          </div>
                          <?php endwhile; endif;?>
                        </div>
<?php get_sidebar();?>
<?php get_footer();?>                                  