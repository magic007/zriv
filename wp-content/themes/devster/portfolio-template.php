<?php
/*
Template Name: Portfolio
*/
?>							

<?php get_header();?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
		    $('#portfolio-list').jcarousel({
		        vertical: true,
		        scroll: 2,
		        easing: 'easeInOutBack',
        		animation: 800
		    });
			$("a.zoom").fancybox({
				'zoomSpeedIn'		:	500,
				'zoomSpeedOut'		:	500
			});
		});
	</script>                     
	
              <?php if (have_posts()) : ?> 
                <div id="head-top">
                    <div id="head-title">
                       <h2><?php the_title();?></h2><!-- Page title here -->
                    </div>                                                     	
                </div> 
                   <!-- BEGIN CONTENT -->
                   <div id="portofolio-content">          
                   	<ul id="portfolio-list" class="jcarousel-skin-portfolio clearfix">
                <?php
                  global $post;
                  $porto_cat = get_option('devster_portfolio_cid');
                  $counter = 0;
                
                  for($i=0;$i<200;$i++)
                  {
                      $numbers2[$i]=$i*3+1;
                      $numbers[$i]=($i+1)*3;

                  }
                  //$numbers = array(3, 6, 9, 12, 15, 18, 21, 24, 27, 30 ,33 ,36);
                  //$numbers2 = array(1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37);
                  query_posts('category_name='.$porto_cat.'&showposts=-1');
                  while ( have_posts() ) : the_post();
                  $wp_query->is_home = false;
                  $counter++;
                  if (in_array($counter, $numbers2)) {echo '<li>'; } 
                ?>                     									
									<div <?php if (in_array($counter, $numbers)) {echo 'class="portfolio-item-thumb-last"';} else { echo 'class="portfolio-item-thumb"';}?>>
	  						    <?php if (get_post_meta($post->ID,"thumbnail",true))  {?>
                    <a class="zoom" href="<?php echo get_post_meta($post->ID,"thumbnail",true);?>" title="<?php the_title();?>" >							
                    <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=155&amp;w=288&amp;zc=1" alt="<?php the_title(); ?>"/></a>
                    <?php } else { ?>
                    <a class="zoom" title="<?php the_title();?>" href="<?php echo bloginfo('template_directory');?>/images/nothumbnail.jpg"  title="<?php the_title();?>" rel="group">
                    <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo bloginfo('template_directory');?>/images/nothumbnail.jpg&amp;h=155&amp;w=288&amp;zc=1" alt="<?php the_title(); ?>"/></a>
                    <?php } ?>
                    <strong><a href="<?php the_permalink();?>"><?php the_title();?></a></strong><br />
                    <p><?php the_excerpt(17);?></p>
									</div>
								<?php 
                if (in_array($counter, $numbers)) {echo '</li>'; }
                ?>		
              <?php endwhile;?>      				
					</ul>
          <div id="quote">
            <?php
            $contact_pid = get_option('devster_contact_pid');
            $contactpid = get_page_by_title($contact_pid);
            $contact_link = get_page_link($contactpid->ID);
            $getquote_image_url = get_option('devster_getquote_image');
            ?>
          	<div class="quote-button">
              <a href="<?php echo $contact_link;?>"><img src="<?php if ($getquote_image_url) echo $getquote_image_url; else echo bloginfo('template_directory').'/images/button-quote.gif';?>" alt="" /></a>
            <div class="clr"></div>
            </div>
          </div>
          </div>
          <?php endif;?>
          <!-- END OF CONTENT -->                   
<?php get_footer();?>                                  