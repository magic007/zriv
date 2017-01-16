<?php

/* Widgetable Functions  */
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'ID' => 'homepagebox',
   'name'=>'Homepage Box 1',
      'before_widget' => '<div class="widgets">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'ID' => 'homepagebox',
   'name'=>'Homepage Box 2',
      'before_widget' => '<div class="widgets">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'ID' => 'homepagebox',
   'name'=>'Homepage Box 3',
      'before_widget' => '<div class="widgets">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
  ));  
  register_sidebar(array(
    'name'=>'General Sidebar',
    'before_widget' => '<div class="widgets">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

  $pageslist = get_pages('parent=-1');
    foreach ($pageslist as $pagesitem) {
      register_sidebar(array(
       'name'=>get_the_title($pagesitem->ID),
        'before_widget' => '<div class="widgets">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
      ));
  }


/* More About Us Widget */

class SidePage_Widget extends WP_Widget {
  function SidePage_Widget() {
    $widgets_opt = array('description'=>'Display pages in sidebar');
    parent::WP_Widget(false,$name= "Side Page Widget",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $pageid = esc_attr($instance['pageid']);
    $pagetitle = esc_attr($instance['pagetitle']);
    $opt_childpage = esc_attr($instance['opt_childpage']);
    $pageexcerpt = (esc_attr($instance['pageexcerpt'])) ? esc_attr($instance['pageexcerpt']) : 20;
    
		$pages = get_pages();
		$listpages = array();
		foreach ($pages as $pagelist ) {
		   $listpages[$pagelist->ID] = $pagelist->post_title;
		}
  ?>
    <p><label for="abouttitle">Title:
  		<input id="<?php echo $this->get_field_id('pagetitle'); ?>" name="<?php echo $this->get_field_name('pagetitle'); ?>" type="text" class="widefat" value="<?php echo $pagetitle;?>" /></label></p>  
	 <p><small>Please select the page.</small></p>
		<select  name="<?php echo $this->get_field_name('pageid'); ?>">  id="<?php echo $this->get_field_id('pageid'); ?>" >
			<?php foreach ($listpages as $opt => $val) { ?>
		<option value="<?php echo $opt ;?>" <?php if ( $pageid  == $opt) { echo ' selected="selected" '; }?>><?php echo $val; ?></option>
		<?php } ?>
		</select>
		</label></p>
  <p>
		<input class="checkbox" type="checkbox" <?php if ($opt_childpage == "on") echo "checked";?> id="<?php echo $this->get_field_id('opt_childpage'); ?>" name="<?php echo $this->get_field_name('opt_childpage'); ?>" />
		<label for="<?php echo $this->get_field_id('opt_childpage'); ?>"><small>Incude sub pages?</small></label><br />
    </p>
    <p><label for="pageexcerpt">Number of words for excerpt :
  		<input id="<?php echo $this->get_field_id('pageexcerpt'); ?>" name="<?php echo $this->get_field_name('pageexcerpt'); ?>" type="text" class="widefat" value="<?php echo $pageexcerpt;?>" /></label></p>  
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $pageid = apply_filters('pageid',$instance['pageid']);
    $abouttitle = apply_filters('pagetitle',$instance['pagetitle']);
    $opt_childpage = apply_filters('opt_childpage',$instance['opt_childpage']);
    $pageexcerpt = apply_filters('pageexcerpt',$instance['pageexcerpt']);
    echo $before_widget;
    echo $before_title.$abouttitle.$after_title;
    
    $aboutpage = new WP_Query('post_type=page&page_id='.$pageid);
    while ($aboutpage->have_posts()) : $aboutpage->the_post(); ?>       
      <p><?php excerpt($pageexcerpt);?></p>
    <?php
    endwhile;
    
    if ($opt_childpage == "on") {  
      $aboutpagelist = new WP_Query('post_type=page&post_parent='.$pageid);
    	while ($aboutpagelist->have_posts()) : $aboutpagelist->the_post();        
      ?>
       <ul class="about-list">
        <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
       </ul> 
      <?php
      endwhile;
    } 
    echo $after_widget;
    wp_reset_query();
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("SidePage_Widget");'));

/* Latest News Widget */

class LatestNews_Widget extends WP_Widget {
  
  function LatestNews_Widget() {
    $widgets_opt = array('description'=>'Latest News Devster Theme Widget');
    parent::WP_Widget(false,$name= "Devster Latest News Widget",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $catid = esc_attr($instance['catid']);
    $newstitle = esc_attr($instance['newstitle']);
    $numnews = esc_attr($instance['numnews']);
    
    $categories_list = get_categories('hide_empty=0');
    
    $categories = array();
    foreach ($categories_list as $catlist) {
    	$categories[$catlist->cat_ID] = $catlist->cat_name;
    }

  ?>
    <p><label for="newstitle">Title:
  		<input id="<?php echo $this->get_field_id('newstitle'); ?>" name="<?php echo $this->get_field_name('newstitle'); ?>" type="text" class="widefat" value="<?php echo $newstitle;?>" /></label></p>  
	 <p><small>Please select category for <b>News</b>.</small></p>
		<select  name="<?php echo $this->get_field_name('catid'); ?>">  id="<?php echo $this->get_field_id('catid'); ?>" >
			<?php foreach ($categories as $opt => $val) { ?>
		<option value="<?php echo $opt ;?>" <?php if ( $catid  == $opt) { echo ' selected="selected" '; }?>><?php echo $val; ?></option>
		<?php } ?>
		</select>
		</label></p>	
    <p><label for="numnews">Number to display:
  		<input id="<?php echo $this->get_field_id('numnews'); ?>" name="<?php echo $this->get_field_name('numnews'); ?>" type="text" class="widefat" value="<?php echo $numnews;?>" /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $catid = apply_filters('catid',$instance['catid']);
    $newstitle = apply_filters('newstitle',$instance['newstitle']);
    $numnews = apply_filters('numnews',$instance['numnews']);    
    
    if ($numnews == "") $numnews = 3;
    
    echo $before_widget;
    echo '<a href="'.get_bloginfo('rss2_url').'"><img src="'.get_bloginfo('template_directory').'/images/rss.gif" alt="" class="newsfeed" /></a>';
    echo $before_title.$newstitle.$after_title;
    $latestnews = new WP_Query('cat='.$catid.'&showposts='.$numnews);
 
    while ( $latestnews->have_posts() ) : $latestnews->the_post();    
    ?>
    <p><strong><a href="<?php the_permalink();?>"><?php the_title();?></a></strong> [<?php the_time('m.d.y');?>]<br />
      <?php excerpt(14);?>
    </p>    
   <?php
   endwhile;
   wp_reset_query();    
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("LatestNews_Widget");'));


/* Testimonial Widget */
class Testimonial_Widget extends WP_Widget {
  function Testimonial_Widget() {
    $widgets_opt = array('description'=>'Testimonial Devster Theme Widget');
    parent::WP_Widget(false,$name= "Devster Testimonial",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $catid = esc_attr($instance['catid']);
    $testititle = esc_attr($instance['testititle']);
    $numtesti = esc_attr($instance['numtesti']);
    
    $categories_list = get_categories('hide_empty=0');
    
    $categories = array();
    foreach ($categories_list as $catlist) {
    	$categories[$catlist->cat_ID] = $catlist->cat_name;
    }

  ?>
    <p><label for="testititle">Title:
  		<input id="<?php echo $this->get_field_id('testititle'); ?>" name="<?php echo $this->get_field_name('testititle'); ?>" type="text" class="widefat" value="<?php echo $testititle;?>" /></label></p>  
	 <p><small>Please select category for <b>Testimonial</b>.</small></p>
		<select  name="<?php echo $this->get_field_name('catid'); ?>">  id="<?php echo $this->get_field_id('catid'); ?>" >
			<?php foreach ($categories as $opt => $val) { ?>
		<option value="<?php echo $opt ;?>" <?php if ( $catid  == $opt) { echo ' selected="selected" '; }?>><?php echo $val; ?></option>
		<?php } ?>
		</select>
		</label></p>	
    <p><label for="numtesti">Number to display:
  		<input id="<?php echo $this->get_field_id('numtesti'); ?>" name="<?php echo $this->get_field_name('numtesti'); ?>" type="text" class="widefat" value="<?php echo $numtesti;?>" /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $catid = apply_filters('catid',$instance['catid']);
    $testititle = apply_filters('testititle',$instance['testititle']);
    $numtesti = apply_filters('numtesti',$instance['numtesti']);    
    
    if ($numtesti == "") $numtesti = 1;
    
    echo $before_widget;
    echo $before_title.$testititle.$after_title;
    $testis = new WP_Query('cat='.$catid.'&showposts='.$numtesti);
 
    while ( $testis->have_posts() ) : $testis->the_post();    
    ?>
     <blockquote>
     <p><?php excerpt(20);?></p>
     </blockquote>
     <strong><?php the_title();?></strong><br /><br />
     <div class="clr"></div>                        
   <?php
   endwhile;
   wp_reset_query();    
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Testimonial_Widget");'));


/* Post to Homepage Box or Sidebar Box Widget */

class SidePost_Widget extends WP_Widget {
  
  function SidePost_Widget() {
    $widgets_opt = array('class'=>'box','description'=>'Devster Theme Widget for displaying post in sidebar');
    parent::WP_Widget(false,$name= "Devster Side Post",$widgets_opt);  
  }
  
  function form($instance) {
    global $post;
    
    $postid = esc_attr($instance['postid']);
    $check_opt = $instance['check_opt'];
    
		$centitaposts = get_posts('numberposts=-1')
		?>  
	<p><small>Please select post display.</small></p>
			<select  name="<?php echo $this->get_field_name('postid'); ?>">  id="<?php echo $this->get_field_id('postid'); ?>" >
				<?php foreach ($centitaposts as $post) { ?>
			<option value="<?php echo $post->ID;?>" <?php if ( $postid  ==  $post->ID) { echo ' selected="selected" '; }?>><?php echo  the_title(); ?></option>
			<?php } ?>
			</select>
	</label></p>
  <p>
		<input class="checkbox" type="checkbox" <?php if ($check_opt == "on") echo "checked";?> id="<?php echo $this->get_field_id('check_opt'); ?>" name="<?php echo $this->get_field_name('check_opt'); ?>" />
		<label for="<?php echo $this->get_field_id('check_opt'); ?>"><small>Show Image Thumbnail?</small></label><br />
    </p>	
	<?php
  }
  
  function update($new_instance, $old_instance) {				
      return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $postid = apply_filters('postid', $instance['postid']);
    $check_opt = apply_filters('check_opt', $instance['check_opt']);
  
      echo $before_widget;
      $posttitle = "<a href='".get_permalink($postid)."'>".get_the_title($postid)."</a>";
      echo $before_title.$posttitle.$after_title;        
      query_posts('p='.$postid);
      while (have_posts()) : the_post();       
      ?>
      <?php if ($check_opt == "on") { ?>
      <div class="icon">
<?php if (get_post_meta($post->ID,"thumbnail",true)) { ?>
        <img src="<?php bloginfo('template_directory');?>/timthumb.php?src=<?php echo get_post_meta($post->ID,"thumbnail",true);?>&amp;h=80&amp;w=300&amp;zc=1" alt="<?php the_title(); ?>" class="aligncenter" />
        <?php }?>
      </div>
      <?php }?>
      <p><?php excerpt(20);?></p>
      <?php  
      endwhile;
    echo $after_widget;
    wp_reset_query();
  }
}

add_action('widgets_init', create_function('', 'return register_widget("SidePost_Widget");'));

/* Brochure Widget */
class Brochure_Widget extends WP_Widget {
  function Brochure_Widget() {
    $widgets_opt = array('description'=>'Brochure Devster Theme Widget');
    parent::WP_Widget(false,$name= "Devster Brochure",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $brochure_title = esc_attr($instance['brochure_title']);
    $brochure_image_url = esc_attr($instance['brochure_image_url']);
    $brochure_download_url = esc_attr($instance['brochure_download_url']);

  ?>
    <p><label for="brochure_title">Title:
  		<input id="<?php echo $this->get_field_id('brochure_title'); ?>" name="<?php echo $this->get_field_name('brochure_title'); ?>" type="text" class="widefat" value="<?php echo $brochure_title;?>" /></label></p>  
    <p><label for="brochure_image_url">Brochure Image Url:
  		<input id="<?php echo $this->get_field_id('brochure_image_url'); ?>" name="<?php echo $this->get_field_name('brochure_image_url'); ?>" class="widefat" value="<?php echo $brochure_image_url;?>"/></label></p>
    <p><label for="brochure_download_url">Brochure Download Url:
  		<input id="<?php echo $this->get_field_id('brochure_download_url'); ?>" name="<?php echo $this->get_field_name('brochure_download_url'); ?>" class="widefat" value="<?php echo $brochure_download_url;?>"/></label></p>  
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $brochure_title = apply_filters('brochure_title',$instance['brochure_title']);
    $brochure_image_url = apply_filters('brochure_image_url',$instance['brochure_image_url']);
    $brochure_download_url = apply_filters('brochure_download_url',$instance['brochure_download_url']);    
    
    echo $before_widget;
    echo $before_title.$brochure_title.$after_title;
    ?>
    <div class="brochure">
    <?php if ($brochure_image_url !="") { ?>
      <a href="<?php echo $brochure_download_url;?>"><img src="<?php echo $brochure_image_url;?>"
alt="" /></a>
    <?php } else { ?>
      <a href="<?php echo $brochure_download_url;?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/brochure.gif" alt="" /></a>
      <?php } ?>
   	</div>
  <?php 
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Brochure_Widget");'));

/* Newsletter Widget */
class Newsletter_Widget extends WP_Widget {
  function Newsletter_Widget() {
    $widgets_opt = array('description'=>'Newsletter Devster Theme Widget');
    parent::WP_Widget(false,$name= "Devster Newsletter",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $newslettertitle = esc_attr($instance['newslettertitle']);
    $newsletterdesc = esc_attr($instance['newsletterdesc']);

  ?>
    <p><label for="newslettertitle">Title:
  		<input id="<?php echo $this->get_field_id('newslettertitle'); ?>" name="<?php echo $this->get_field_name('newslettertitle'); ?>" type="text" class="widefat" value="<?php echo $newslettertitle;?>" /></label></p>  
    <p><label for="newsletterdesc">Description:
  		<textarea id="<?php echo $this->get_field_id('newsletterdesc'); ?>" name="<?php echo $this->get_field_name('newsletterdesc'); ?>" class="widefat" cols="25" rows="8" ><?php echo $newsletterdesc;?></textarea></label></p>  
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $newslettertitle = apply_filters('newslettertitle',$instance['newslettertitle']);
    $newsletterdesc = apply_filters('newsletterdesc',$instance['newsletterdesc']);    
    
    echo $before_widget;
    echo $before_title.$newslettertitle.$after_title;
    ?>
      <p><img src="<?php bloginfo('template_url');?>/images/icon-rss.png" alt="" class="imgleft" style="padding-top:3px;" /><?php echo $newsletterdesc;?></p>
      <div class="clr"></div>
      <form action="http://feedburner.google.com/fb/a/mailverify" method="post"  onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner_id;?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"  id="newsletter">
      <fieldset>
        <input type="hidden" value="<?php echo $feedburner_id;?>" name="uri"/>
        <input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
        <input type="hidden" name="loc" value="en_US"/>
        <input name="email" type="text" class="inputbox01"  value="enter your email address"  onblur="if(this.value=='') this.value='enter your email address';" onfocus="if(this.value=='enter your email address') this.value='';" />
        <input type="image" src="<?php bloginfo('template_directory');?>/images/but_submit.gif" class="but" />
			</fieldset>
			</form>
  <?php
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Newsletter_Widget");'));

/* Contact Info Widget */
class ContactInfo_Widget extends WP_Widget {
  function ContactInfo_Widget () {
    $widgets_opt = array('description'=>'Contact Info Devster Theme Widget');
    parent::WP_Widget(false,$name= "Devster Contact Info ",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $contact_title = esc_attr($instance['contact_title']);
    $contact_address = esc_attr($instance['contact_address']);
    $contact_phone = esc_attr($instance['contact_phone']);
    $contact_fax = esc_attr($instance['contact_fax']);
    $contact_email = esc_attr($instance['contact_email']);

  ?>
    <p><label for="contact_title">Title:
  		<input id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" class="widefat" value="<?php echo $contact_title;?>" /></label></p>
    <p><label for="contact_address">Address:
  		<textarea id="<?php echo $this->get_field_id('contact_address'); ?>" name="<?php echo $this->get_field_name('contact_address'); ?>" class="widefat" cols="16" rows="8" ><?php echo $contact_address;?></textarea></label></p>        
    <p><label for="contact_phone">Phone:
  		<input id="<?php echo $this->get_field_id('contact_phone'); ?>" name="<?php echo $this->get_field_name('contact_phone'); ?>" class="widefat" value="<?php echo $contact_phone;?>"/></label></p>
    <p><label for="contact_fax">Fax:
  		<input id="<?php echo $this->get_field_id('contact_fax'); ?>" name="<?php echo $this->get_field_name('contact_fax'); ?>" class="widefat" value="<?php echo $contact_fax;?>"/></label></p>  		
    <p><label for="contact_email">Email:
  		<input id="<?php echo $this->get_field_id('contact_email'); ?>" name="<?php echo $this->get_field_name('contact_email'); ?>" class="widefat" value="<?php echo $contact_email;?>"/></label></p>  
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);

    $contact_title = apply_filters('contact_title',$instance['contact_title']);
    $contact_address = apply_filters('contact_address',$instance['contact_address']);
    $contact_phone = apply_filters('contact_phone',$instance['contact_phone']);
    $contact_fax = apply_filters('contact_fax',$instance['contact_fax']);
    $contact_email = apply_filters('contact_email',$instance['contact_email']);
    
    if ($contact_title =="") $contact_title ="Contact Info";
    
    echo $before_widget;
    echo $before_title.$contact_title.$after_title;
    ?>
   <p>
      <strong><?php echo get_bloginfo('blogname');?></strong><br />
      <?php echo $contact_address;?>.<br />
      Phone: <?php echo $contact_phone;?><br />
      Fax: <?php echo $contact_fax;?><br />
      Email: <?php echo $contact_email;?><br />
      <?php 
      $facebook_id = get_option('devster_facebook_id');
      $twitter_id = get_option('devster_twitter_id');
      ?>
      <span class="facebook">                            			
          <span class="social-icon"><a href="http://facebook.com/<?php echo $facebook_id;?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/facebook.png" alt="" /></a></span>
          <span class="social-text"><a href="http://facebook.com/<?php echo $facebook_id;?>">Follow on Facebook</a></span>
 		</span>		
      <span class="twitter">                            			
          <span class="social-icon"><a href="http://twitter.com/<?php echo $twitter_id;?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/twitter.png" alt="" /></a></span>
          <span class="social-text"><a href="http://twitter.com/<?php echo $twitter_id;?>">Follow on Twitter</a></span>
 		</span>	
      </p>    
      <?php $mapimage = get_option('devster_mapimage');?>
      <img src="<?php if ($mapimage) echo $mapimage; else echo get_bloginfo('template_directory')."/images/contact-map.jpg";?>" alt="" class="map" />   
  <?php 
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("ContactInfo_Widget");'));


?>