<?php
if (!class_exists('UYan')  && empty($_POST['type']) ){
	echo 'UYan plugin hasn\'t been activated.';
	exit;
}
if($_SERVER['HTTP_REFERER'] != $_SERVER['HTTP_HOST']){
	echo '请求来源非法';
	exit;
}else{
	require '../../../wp-load.php';
	require '../../../wp-admin/includes/admin.php';
	do_action('admin_init');
	
	$SNSTypeToPrefix = array(
	  'SINA' => 'http://weibo.com/',
	  'RENREN' => 'http://www.renren.com/profile.do?id=',
	  'TENCENT' => 'http://t.qq.com/', 
	  'QQ' => 'http://qzone.qq.com/',
	  'SOHU' => 'http://t.sohu.com/people?uid=',
	  'NETEASY' => 'http://t.163.com/',
	  'KAIXIN' => 'http://www.kaixin001.com/home/?uid=',
	  'DOUBAN' => 'http://www.douban.com/people/'
	);
	
	global $wpdb;
	$from_type = strtoupper($_POST['from_type']);
	$comment_author_url = $SNSTypeToPrefix[$from_type];
	$comment_author_url .= $_POST['show_id'];
	
	$pos = strrpos($_POST['page'], 'p=');
	$comment_post_ID = substr($_POST['page'], $pos+2);
	$comment_parent = empty($_POST['reply_to_comment_id'])?0:$_POST['reply_to_comment_id'];
	$comment_arr = array(
		'comment_content' => $_POST['content'],
		'comment_post_ID' => $comment_post_ID,
		'comment_author' => $_POST['show_name'],
		'comment_author_url' => $comment_author_url,
		'comment_author_email' => $_POST['comment_author_email'],
		'comment_date' => $_POST['date'],
		'comment_parent' => $comment_parent,
		'comment_date_gmt' => $_POST['date'],
		'comment_agent' => 'YouYan Social Comment System',
		'user_id' => $_POST['user_id']
	);
	$wpdb->insert($wpdb->prefix . "comments", $comment_arr);
}
?>