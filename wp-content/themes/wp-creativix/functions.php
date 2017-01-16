<?php
if ( function_exists('register_sidebar') )
    register_sidebar();
?>
<?php
//Loading Theme Options Framework
add_action('admin_menu', 'add_welcome_interface');
function add_welcome_interface() {
/* add_theme_page( page_title, menu_title, access_level/capability, file, [function]); */
add_theme_page('WP-Creativix', 'WP-Creativix Options', 'edit_themes', basename(__FILE__), 'editoptions');
}
function editoptions() {
?>
<div class="wrap">
<span style="float: left; margin-top: 50px;">
<img src="<?php bloginfo('template_directory') ?>/images/logo.gif">
</span>
<span style="float: left; margin-left: 150px;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="dennis.nissle@iwebix.de">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="myMag Theme Donation">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="<?php bloginfo('template_directory') ?>/images/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</span>
<h2 style="clear: both; margin-left: 5px; margin-bottom: 20px;">WP-Creativix Theme Settings Page</h2>
<?php 
$pathtemp = get_theme_root()."/wp-creativix";
$imagetemp = get_theme_root()."/wp-creativix/images/logos";
if(!is_writeable($pathtemp)) {
?>
<span style="float: left; margin-left: 10px; margin-top: 10px; background-color: #c03725; color: #FFF; padding: 5px;">Thumbnails not working - Please give write permission to Theme (wp-Creativix) Folder (755 or 777)</span>
<?php
}
?>
<div class="container" style="clear: both; float: left; background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; color: #3b3b3b;">
<?php 
if(!is_writeable($imagetemp)) {
?>
<span style="clear: both; margin-bottom: 10px; float: left; background-color: #c03725; color: #FFF; padding: 5px;">You cannot upload images because the folder "wp-content/themes/wp-creativix/images/logos/ is not writeable please CHMOD this folder to 755 or 777</span>
<?php } ?>
<h3>Custom Logo</h3>
<div style="margin:0;padding:0; float: left;">
<form style="float: left;" action="<?php bloginfo('template_directory') ?>/upload.php" enctype="multipart/form-data" method="post" name="upload">
<input type="file" name="file" /><br />
<input type="hidden" name="url" value="<?php echo get_bloginfo('url');?>"/>
<input type="submit" name="submit" style="margin-top: 10px;" value="Upload" /><br/><br/>
</form>
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Select your Logo to upload. Your Logo should not be higher than 100px. The width can be up to 250px.
</div>
</div>
<form action="options.php" method="post" id="options">
<?php wp_nonce_field('update-options'); ?>

<?php $logo = get_option('logo_pic');?>

<?php if($_GET['pic']) {
$picname = $_GET['pic'];
}
?>
<?php if($_GET['pic'] || get_option('logo_pic')) { ?>
<div class="container" style="clear: both; float: left; background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; color: #3b3b3b;">
<?php } ?>
<?php if($_GET['deleted'] && !$_GET['updated']) {
if($_GET['pic']) {
$file = $pathtemp."/images/logos/".$picname;
} else {
$file = $pathtemp."/images/logos/".$logo;   
}
unlink($file);
unset($logo);
unset($picname);
?>
<span style="float: left; background-color: #4a991a; color: #FFF; margin-left: 10px; padding: 5px;">Don't forget to hit save after <strong>deleting</strong>!</span><br/><br/>
<?php } ?>
<?php if($_GET['pic'] && !$_GET['updated']) { ?>
<span style="float: left; background-color: #4a991a; color: #FFF; padding: 5px;">Don't forget to push save!</span><br/><br/>
<?php } ?>

<?php if(!$_GET['deleted']) {?>   
<?php if($_GET['pic']) {?>
<h3>Current Logo</h3>
<input value="<?php echo $picname;?>" name="logo_pic" type="hidden">
<img src="<?php echo get_bloginfo('template_directory');?>/images/logos/<?php echo $picname;?>" />
<?php
$url = get_bloginfo('url');
$file = get_option('logo_pic');
$admin = "/wp-admin/themes.php?page=functions.php&deleted=true";?>
<br/><br/><a style="background-color: #dedede; border: 1px solid #CCC; padding: 5px;" href="<?php echo $url,$admin;?>">Delete this image</a>
</div>
<?php } else { ?>
<?php if(get_option('logo_pic')) { ?>
<h3>Current Logo</h3>
<img src="<?php echo get_bloginfo('template_directory');?>/images/logos/<?php echo get_option('logo_pic');?>" />
<input value="<?php echo $logo;?>" name="logo_pic" type="hidden">
<?php
$url = get_bloginfo('url');
$file = get_option('logo_pic');
$admin = "/wp-admin/themes.php?page=functions.php&deleted=true";?>
<br/><br/><a style="background-color: #dedede; border: 1px solid #CCC; padding: 5px; float: left; clear: both;" href="<?php echo $url,$admin;?>">Delete this image</a><br/><br/>
<?php } } }?>
<?php if($_GET['pic'] || get_option('logo_pic')) { ?>
<div style="margin:0px; padding:0; float: left;">
Margin Between Logo and Top of the Page<br />
<input value="<?php echo get_option('margin_top'); ?>" name="margin_top">
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
The margin to the top of the page depends on how hight your logo file is. Just type a number like 150 for having an margin of 150px.
</div>
</div>

<?php } ?>

<div class="container" style="clear: both;background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<h3>Navigation Settings</h3>
<div style="margin:0px; padding:0; float: left;">
Exclude Pages from Navigation<br />
<input value="<?php echo get_option('pages_exclude'); ?>" name="pages_exclude">
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Type in Page IDs you would like to exclude from menu (Seperated by comma).
</div>
</div>

<div class="container" style="clear: both;background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<h3>Styling Settings</h3>
<div style="margin: 0; padding:0; float: left;">
Chose your own hightlight color code<br />
<input value="<?php echo get_option('highlight_color'); ?>" name="highlight_color">
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Type your hexadecimal code in here - The color code will be your new hightlight color on your Website - Default is 993399 for purple.
</div>
</div>

<div class="container" style="clear: both;background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<h3>Frontpage Settings</h3>
<div style="margin:0px; padding:0; float: left;">
Slideshow Category ID<br />
<input value="<?php echo get_option('feat_cat'); ?>" name="feat_cat">
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Type in the category you would like to display in the slideshow (Seperate multiple Categories with comma).
</div>
<div style="margin-top: 30px; padding:0; float: left;">
Featured Articles on Frontpage Category ID<br />
<input value="<?php echo get_option('home_cat'); ?>" name="home_cat">
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Select a category ID for the Featured Articles displayed on the bottom of the Frontpage.
</div>
</div>

<div class="container" style="clear: both;background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<h3>Portfolio Settings</h3>
<div style="margin:0;padding:0; float: left;">
Category ID for Portfolio<br />
<input value="<?php echo get_option('port_cat'); ?>" name="port_cat">
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
Select a Category ID whose posts you would like to display. (Seperate multiple categories with comma).
</div>
</div>

<div class="container" style="clear: both;background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<h3>Top Menu Settings</h3>
<div style="margin:0px; padding:0; float: left;">
Link to Contact Page<br />
<input value="<?php echo get_option('contact_link'); ?>" name="contact_link">
</div>
<div style="width: 350px; float: right; margin-right: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
This is the Link to your contact Page - The Icon will be shown in the topmenu.
</div>
<div style="margin-top: 30px; padding:0; float: left; clear: both;">
Link to Imprint Page <br />
<input value="<?php echo get_option('imprint_link'); ?>" name="imprint_link">
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
This is the Link to your imprint Page - The Icon will be shown in the topmenu.
</div>
<div style="margin-top: 30px; padding:0; float: left; clear: both;">
Link to Blog Page<br />
<input value="<?php echo get_option('blog_link'); ?>" name="blog_link">
</div>
<div style="width: 350px; float: right; margin-right: 20px; margin-top: 20px; background-color: #fff0b5; border: 4px solid #FFF; padding: 5px; font-size: 10px;">
This is the Link to your Blog Page - The Icon will be shown in the topmenu.
</div>
</div>
<div class="container" style="clear: both; background-color: #e8e8e8; border: 1px solid #CCC; padding: 10px; font-size: 11px; width: 650px; margin: 10px; float: left; color: #3b3b3b;">
<input type="hidden" value="update" name="action">
<input type="hidden" value="logo_pic, feat_cat,home_cat,pages_exclude,contact_link,imprint_link,blog_link,port_cat,highlight_color,margin_top" name="page_options">
<p class="submit"> <input type="submit" value="<?php _e('Save Changes') ?>" name="Submit"></p>
</form>
</div>
<?php  }  ?>
<?php 
function the_slider_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $slide = get_the_content($more_link_text, $stripteaser, $more_file);
    $slide = apply_filters('the_content', $slide);
    $slide = str_replace(']]>', ']]&gt;', $slide);
    $slide = strip_tags($slide);

   if (strlen($_GET['p']) > 0) {
      echo $slide;
   }
   else if ((strlen($slide)>$max_char) && ($espacio = strpos($slide, " ", $max_char ))) {
        $slide = substr($slide, 0, $espacio);
        $slide = $slide;
        echo $slide;
        echo "...";
   }
   else {
      echo $slide;
   }
}
function new_excerpt_more($more) {
return '<a href="'. get_permalink($post->ID) . '">' . '<br/> read more..' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>