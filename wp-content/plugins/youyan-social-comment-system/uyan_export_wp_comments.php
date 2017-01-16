<?php
if (!class_exists('UYan') && empty($_POST['action'])){
	echo 'UYan plugin hasn\'t been activated.';
	exit;
}

require '../../../wp-load.php';
require '../../../wp-admin/includes/admin.php';
do_action('admin_init');

global $wpdb;
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
  //echo 'herehre' . $SNSTypeToPrefix['TENCENT'];

function insert_one_comment($SNSTypeToPrefix, $comment, $in_reply_to = 0){
  //global $SNSTypeToPrefix;
  global $wpdb;
  $insert_data = array();

  $page_url = $comment['page'];
  $pos = strrpos($page_url, 'p=');
  $post_id = substr($page_url, $pos+2);
  $insert_data['comment_post_ID'] = $post_id;

  $insert_data['comment_date'] = $insert_data['comment_date_gmt'] = $comment['time'];
  $insert_data['comment_content'] = $comment['content'];
  $insert_data['comment_agent'] = 'YouYan Social Comment System';

  $from_type = trim($comment['from_type']);
  /*echo "FROM:  " . $from_type;
  echo $SNSTypeToPrefix['TENCENT'];
  echo $SNSTypeToPrefix[$from_type];*/
  if($from_type == 'wordpress')
    continue;

  if($from_type == 'EMAIL'){
    $insert_data['comment_author'] = $comment['comment_author'];
    $insert_data['comment_author_email'] = $comment['comment_author_email'];
    $insert_data['comment_author_url'] = $comment['comment_author_url'];
    $insert_data['comment_author_IP'] = $comment['IP'];
  }

  else {            // From_TYPE is SNS
    if($from_type == 'QQ'){
      $comment_author_url = $SNSTypeToPrefix['QQ'];
    }
    else{
      $from_type_id = strtolower($from_type) . '_id';
      $comment_author_url = $SNSTypeToPrefix[$from_type] . $comment[$from_type_id];
    }
    $insert_data['comment_author'] = $comment['show_name'];
    $insert_data['comment_author_url'] = $comment_author_url;
  }

  $insert_data['comment_parent'] = $in_reply_to;
 
 $has = $wpdb->get_results('select count(*) as count from  ' . $wpdb->prefix . 'comments where comment_content like \'%'.$comment['comment_content'].'%\' and comment_agent!="YouYan Social Comment System"','ARRAY_A');
 if(!isset($has[0]['count'])){
	  $result = $wpdb->insert($wpdb->prefix . "comments", $insert_data);
 }
  return $wpdb->insert_id;
}

$domain = $_SERVER['HTTP_HOST'];
$URL_BASE = get_settings('home');

$post_data = array(
  'url_base' => $URL_BASE,
  'domain' => $domain
);

$url = 'http://uyan.cc/index.php/youyan_wp_content/export_wp_comments';

if(extension_loaded('curl')){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$output = curl_exec($ch);
}else{
	$string = VisitPage("POST", $url, "url_base=$URL_BASE&domain=$domain");//传入参数
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
			$content .= fgets($fp,4096); // 只写入执行页面返回的结果
		}
		//关闭服务器连接并返回页面的全部数据
		fclose($fp);
		return $content;
	}
	$arr = explode("\r\n\r\n",$string);
	$output = $arr[1];
}
echo $output;
//echo $res;
//$start = strpos($res,'[');
//$output = substr($res,$start,strlen($output));
$data_arr = json_decode($output, true);

foreach($data_arr as $comment_group){
  $parent_comment_id =  insert_one_comment($SNSTypeToPrefix, $comment_group[0]);
  //echo 'id = ' . $parent_comment_id;
  $count = count($comment_group);
  for($i = 1; $i < count($comment_group); $i++){
	 $count--;
    insert_one_comment($SNSTypeToPrefix, $comment_group[$i], $parent_comment_id);
  }
}
echo $count;
?>

