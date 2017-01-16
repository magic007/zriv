<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<?php $style = get_option('highlight_color');?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.php?style=<?php echo $style;?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/menu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/typeface-0.14.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/juni_regular.typeface.js"></script>
<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/ie.css" type="text/css" media="screen" />
<![endif]-->
<style>
#logo {
margin-top: <?php echo get_option('margin_top');?>px;	
}
</style>
</head>

<body>			

<div id="wrapper">
<div id="topmenu">
<?php
$contact = get_option('contact_link');
$imprint = get_option('imprint_link');
?>

<a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/home.gif"></a>
<?php if (!empty($contact) && $contact==0) {
?>
<a href="<?php echo $contact;?>"><img src="<?php bloginfo('template_directory'); ?>/images/contact.gif"></a>
<?php
}
?>
<?php if (!empty($imprint) && $imprint==0) {
?>
<a href="<?php echo $imprint;?>"><img src="<?php bloginfo('template_directory'); ?>/images/imprint.gif"></a>
<?php
}
?>
</div>
<div id="header">
<div id="logo" class="typeface-js">
<?php if(get_option('logo_pic')) { ?>
<a href="/" title="home"><img src="<?php bloginfo('template_directory'); ?>/images/logos/<?php echo get_option('logo_pic');?>"></a>
<?php } else { ?>
<a href="/" title=""><?php bloginfo('name'); ?></a>
<?php } ?>	
</div>	
<div class="navigation">	
<?php
$exclude = get_option('pages_exclude');
?> 
                <ul id="navbar">
			<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
			<?php wp_list_pages("exclude=$exclude&title_li=&depth=3"); ?>
		    </ul> 
<div id="search">
<form id="searchform" method="get" action="/">
<input type="text" value="" name="s" id="searchbox" />
<input type="submit" id="searchbutton" value="" />
</form>
</div>
    </div>
        </div>
</div>