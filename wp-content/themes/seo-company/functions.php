<?php

include 'theme_options.php';
function wp_strimwidth($str ,$start , $width ,$trimmarker ){
	$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
	return $output.$trimmarker;
}

function get_recent_comments() {
	global $wpdb;
	$request = "SELECT ID, comment_ID, comment_content, comment_author FROM $wpdb->posts, $wpdb->comments WHERE $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND (post_status = 'publish' OR post_status = 'static') AND comment_type = ''";
	$request .= "AND post_password ='' AND comment_approved = '1' ORDER BY $wpdb->comments.comment_date DESC LIMIT 9";
	$comments = $wpdb->get_results($request);
	$output = '';
	foreach ($comments as $comment) {
		$comment_author = stripslashes($comment->comment_author);
		$comment_content = strip_tags($comment->comment_content);
		$comment_content = stripslashes($comment_content);
		$comment_excerpt = substr($comment_content,0,80);
		
		$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
		$output .= '<li><a href="'. $permalink .'" title="查看 '. $comment_author .' 的整条评论">'. $comment_author .'</a>: '. $comment_excerpt .'...</li>';
	}
	echo $output;
}





/*PAGINATION*/
function par_pagenavi($range = 4){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";}
	previous_posts_link(' 上一页 ');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link(' 下一页 ');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";}}
}

?>