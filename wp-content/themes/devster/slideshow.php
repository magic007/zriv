            <!-- SLIDES_CONTAINER -->
						<div id="slides_container">
            	<div id="slides-cu3er">
            	 <?php
        					 global $post;
        					 $featured_cat = get_option('devster_featured_cat');
        					 $featured_num = get_option('devster_featured_number');
        					 $featured_slide = new WP_Query('category_name='.$featured_cat.'&showposts='.$featured_num);
        					 while ($featured_slide->have_posts()): $featured_slide->the_post();
                ?>            	
                <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>
                <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=265&amp;w=630&amp;zc=1" alt="<?php the_title(); ?>" />
                <?php } else { ?>
                <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/blank-images/nothumbnail.jpg&amp;h=265&amp;w=630&amp;zc=1" alt="<?php the_title();?>"/>                     
                <?php } ?>
                <?php endwhile;?>
              </div>
              <div id="slides-text">
                <?php
            		  $slide_title  = get_option('devster_slide_title');
            		  $slide_desc  = get_option('devster_slide_desc');
                ?>              
                <h1><?php echo ($slide_title) ? stripslashes($slide_title) : "Slide Title Here";?></h1>
                <?php echo ($slide_desc) ? stripslashes($slide_desc) : "
                <h3>We are creative web design &amp;<br /> 
                development agency with a passion<br />
                for web standards.</h3>
                <p> 
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>";?>
                <?php
                  $about_page = get_option('devster_about_pid');
                  $aboutpid = get_page_by_title($about_page);
                ?>                
                <span class="more-button"><a href="<?php echo get_page_link($aboutpid->ID);?>"><img src="<?php bloginfo('template_directory');?>/images/get-to-know.png" alt="" /></a></span>							
           </div>                            
          </div>
					<!-- END OF SLIDES_CONTAINER -->
