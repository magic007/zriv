<?php

/* Theme Functions  */
function excerpt($excerpt_length) {
  global $post;
	$content = $post->post_content;
	$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$content = implode(' ', $words);
	endif;
  
  $content = strip_tags($content);
  
	echo $content;

}

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="titlecomment">
			<?php echo get_avatar($comment,$size='48'); ?>
			<strong><?php comment_author_link() ?></strong>
			<span class="datecomment"><?php comment_date('F jS, Y') ?> on <?php comment_time() ?></span>
		</div>
  		<?php if ($comment->comment_approved == '0') : ?>
  		<p>Your comment is awaiting moderation.</p>
  		<?php endif; ?>
  		<?php comment_text() ?>
  		<div class="clear"></div>
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>  			
	   </li>
<?php
}

function mytheme_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<?php echo get_avatar($comment,$size='48'); ?>
      <div class="placecomment">
        <h3><strong><?php comment_author_link() ?></strong>, <?php comment_date('F jS, Y') ?> on <?php comment_time() ?></h3>
        
  			<?php if ($comment->comment_approved == '0') : ?>
  			<p>Your comment is awaiting moderation.</p>
  			<?php endif; ?>
  			<p><?php comment_text() ?></p>
			</div>
      <div class="clear">
    </li>
<?php
}

function devster_add_javascripts() {
  wp_enqueue_scripts('jquery');
  wp_enqueue_script( 'jquery.cycle.all', get_bloginfo('template_directory').'/js/jquery.cycle.all.js', array( 'jquery' ) );    
  wp_enqueue_script( 'twitter', get_bloginfo('template_directory').'/js/twitter.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.jcarousel.pack', get_bloginfo('template_directory').'/js/jquery.jcarousel.pack.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.easing.1.3', get_bloginfo('template_directory').'/js/jquery.easing.1.3.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.fancybox-1.2.6', get_bloginfo('template_directory').'/js/jquery.fancybox-1.2.6.pack.js', array( 'jquery' ) );  
}

if (!is_admin()) {
  add_action( 'wp_print_scripts', 'devster_add_javascripts' ); 
}

add_action('wp_head', 'devster_add_stylesheet');

function devster_add_stylesheet() { ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jcarousel.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/<?php echo get_option('devster_style'); ?>.css" type="text/css" media="screen" />	
<?php 
}

?>