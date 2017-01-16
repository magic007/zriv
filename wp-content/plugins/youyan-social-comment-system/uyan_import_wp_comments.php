<?php
if (!class_exists('UYan')  && empty($_POST['action'])){
	echo 'UYan plugin hasn\'t been activated.';
	exit;
}
require '../../../wp-load.php';
require '../../../wp-admin/includes/admin.php';
do_action('admin_init');

global $wpdb;

$page = '';
$page_url = '';
$domain = $_SERVER['HTTP_HOST'];

$URL_BASE = get_settings('home');
$nowpage = isset($_POST['nowpage']) ? $_POST['nowpage'] : 0;
$pagesize = isset($_POST['pagesize']) ? $_POST['pagesize'] : 10;
$pagestart = $nowpage * $pagesize;
$alltotal = isset($_POST['alltotal']) ? $_POST['alltotal'] : 0;
$runtotal = isset($_POST['runtotal']) ? $_POST['runtotal'] : 0;

if($alltotal == 0) {
	$allTotalArr = $wpdb->get_results('select count(*) as count from  ' . $wpdb->prefix . 'comments where comment_approved=1 and comment_agent!="YouYan Social Comment System"', 'ARRAY_A');
	$alltotal = isset($allTotalArr[0]['count']) ? $allTotalArr[0]['count'] : 0;
}

$comments = $wpdb->get_results('select comment_ID, comment_content, comment_post_ID, comment_author, comment_author_url, comment_author_email, comment_author_IP, comment_date, comment_parent from  ' . $wpdb->prefix . 'comments where comment_approved=1 and comment_agent!="YouYan Social Comment System" order by comment_date ASC limit ' . $pagestart . ', ' . $pagesize, 'ARRAY_A');

$post_data = array(
'comments' => json_encode($comments),
'url_base' => $URL_BASE,
'domain' => $domain,
'nowpage' => $nowpage
);
$url = 'http://uyan.cc/index.php/youyan_wp_content/import_wp_to_uyan_comments_v2';
if(extension_loaded('curl')){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$output = curl_exec($ch);
}else{
	
	$string = VisitPage("POST", $url, "url_base=$URL_BASE&domain=$domain&nowpage=$nowpage&comments=".json_encode($comments)."");//传入参数
	function VisitPage($method, $path, $query){
		$content = '';
		//获取主机地址
		$array = explode("/", $path);
		if($array[0] != "http:")
		{
			return false;
		}
		$host = $array[2];
		//构造页面访问请求	
		$post = "$method $path HTTP/1.1\r\n";
		$post.= "Host: $host\r\n";
		$post.= "Content-type: application/x-www-form-urlencoded\r\n";
		$post.= "Content-length: ".strlen($query)."\r\n";
		$post.= "Connection: close\r\n\r\n";
		$post.= $query;
		//使用fsockopen连接页面并将请求信息提交
		$fp = fsockopen($host,80,$errno,$errstr,30);
		$result = fwrite($fp, $post);
		//循环读取页面内容并返回
		while(!feof($fp)){
			// $content .= fgets($fp,4096); // 所有写到里面的值都泛返回
			$content = fgets($fp,4096); // 只写入执行页面返回的结果
		}
		//关闭服务器连接并返回页面的全部数据
		fclose($fp);
		return $content;
	}
	$arr = explode("\r\n\r\n",$string);
	$output = $arr[1];
	
}

$lowertotal = 0;
$runtotal = $pagestart<$alltotal ? $pagestart : $alltotal;
if(is_numeric($output)) {
echo '_FINISH_STATUS_' . $output . '_' . $alltotal . '_' . $runtotal . '_' . $pagesize;
} else {
echo '_FINISH_STATUS_' . $nowpage . '_' . $alltotal . '_' . $runtotal . '_' . $pagesize;
}
exit;

?>