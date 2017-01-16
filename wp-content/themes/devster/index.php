<?php get_header();?>
                     <!-- BEGIN CONTENT -->
                     	<div id="content1">
                     	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 1')) { ?>
                        <div class="maincontent">
                          <?php
                          $site_title = get_option('devster_site_title');
                          $site_desc = get_option('devster_site_desc');
                          ?>                            
                          <h3><?php echo ($site_title) ? $site_title : "Your Company";?></h3>
                          <?php echo ($site_desc) ? stripslashes($site_desc): 
                        	"<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                          </p>
                          <p>
                          Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus nisi ut aliquid ex ea commodi consequatur.<br/>
                          </p>";?>
                        </div>
                        <?php } ?>
                        </div>
                        <div id="content2">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 2')) { ?>
                        	<div class="maincontent">
                            <h3>我们的业务</h3>
                            <?php
                              $services_page = get_option('devster_services_pid');
                              $servicespid = get_page_by_title($services_page);
                              query_posts('post_type=page&order=ASC&post_parent='.$servicespid->ID);
                              while ( have_posts() ) : the_post();
                          	?>                            
                          	<p>
                            <?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>
                            <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=70&amp;w=75&amp;zc=1" alt="<?php the_title(); ?>" class="imgleft"/>
                            <?php } else { ?>
                            <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php bloginfo('template_directory');?>/images/blank-images/nothumbnail.jpg&amp;h=70&amp;w=75&amp;zc=1" alt="<?php the_title();?>" class="imgleft"/>                     
                            <?php } ?>                            
                            <strong><a href="<?php the_permalink();?>"><?php the_title();?></a></strong><br />
                            <?php the_excerpt(9);?>
                            </p>
                            <?php endwhile;?>
                            </div>
                          <?php } ?>
                        </div>
                        <div id="content3">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 3')) { ?>
                        	<div class="maincontent">
                            <h3>其它</h3>
                            <?php
                              $testimonial_cat = get_option('devster_testimonial_cid');
                              query_posts('showposts=1&category_name='.$testimonial_cat);
                              while ( have_posts() ) : the_post();
                          	?>
                            <blockquote>
                          	<?php the_content();?> 
                            </blockquote>
                            <strong><?php the_title();?></strong>                                                            <?php endwhile;?>            
                          </div>
                          <div class="maincontent">
                                                              
                          </div>
                          <?php } ?>                            
                        </div>                        
<?php get_footer();?>