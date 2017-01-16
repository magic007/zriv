<?php
/*
Plugin Name: 友荐推荐工具
Plugin URI: http://www.ujian.cc
Description: 友荐是一款基于社会化的智能推荐工具，只需添加一行代码，即可为您的网站添加站内智能推荐功能，当用户浏览完网页内容时，自动为他提供最感兴趣的相关内容，有效提升网站PV和用户粘度！<a href="http://www.ujian.cc" target="_blank">点击进入友荐官网</a>。<a href="options-general.php?page=ujian.php">启用插件后，可以点击这里进行配置</a>。
Version: 1.2.3
Author: JiaThis Team.
Author URI: http://www.jiathis.com
*/

load_plugin_textdomain('ujian');

$ujian_view_num = get_option('ujian_view_num'); // 显示数量
$ujian_view_mode = get_option('ujian_view_mode');// 显示模式，文章页和单页面
$ujian_define_pos = get_option('ujian_define_pos');// 自定义显示位置
$ujian_js = get_option('ujian_js'); // JS链接地址
$ujian_uid = get_option('ujian_uid'); // ujian UID
$ujian_picsize = get_option('ujian_picsize'); // 图片默认大小
$ujian_itemtitle = get_option('ujian_itemtitle');// 模块名称
$ujian_bordercolor = get_option('ujian_bordercolor');// 边框颜色
$ujian_defaultpic = get_option('ujian_defaultpic');// 默认显示的图片
$ujian_textcolor = get_option('ujian_textcolor'); // 文字颜色
$ujian_bgcolor = get_option('ujian_bgcolor'); // 默认背景颜色
$ujian_hovertextcolor = get_option('ujian_hovertextcolor'); // 默认滑过文字颜色
$ujian_mouseovercolor = get_option('ujian_mouseovercolor'); // 鼠标悬浮颜色
$ujian_showtype = get_option('ujian_showtype'); // 显示方式 
$ujian_codestyle = get_option('ujian_codestyle'); // 显示位置
//$ujian_showshares = get_option('ujian_showshares'); // 显示分享次数
$ujian_target = get_option('ujian_target'); // 打开方式
$ujian_slide_pos = get_option('ujian_slide_pos'); // 浮窗式位置
$ujian_icon = get_option('ujian_icon'); // 按钮风格
$ujian_feed = get_option('ujian_feed'); // 是否在FEED页面显示

// 显每个选项添加默认值	
if($ujian_view_num == '') {
	update_option('ujian_view_num', '5');
}

if($ujian_view_mode == ''){
	update_option('ujian_view_mode','single');
}
if($ujian_define_pos == ''){
	update_option('ujian_define_pos','no');
}

if($ujian_feed == ''){
	update_option('ujian_feed','no');
}

if($ujian_js == ''){
	update_option('ujian_js','<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js"></script>');
}

if($ujian_picsize == ''){
	update_option('ujian_picsize','96');
}
if($ujian_itemtitle == ''){
	update_option('ujian_itemtitle','您可能喜欢：');
}
if($ujian_bordercolor == ''){
	update_option('ujian_bordercolor','#dddddd');
}
if($ujian_textcolor == ''){
	update_option('ujian_textcolor','#333333');
}
if($ujian_hovertextcolor == ''){
	update_option('ujian_hovertextcolor','#333333');
}

if($ujian_bgcolor == ''){
	update_option('ujian_bgcolor','');
}
if($ujian_mouseovercolor == ''){
	update_option('ujian_mouseovercolor','#E6F3DE');
}
if($ujian_showtype == ''){
	update_option('ujian_showtype','2');
}
if($ujian_codestyle == ''){
	update_option('ujian_codestyle','widge');
}
if($ujian_target == ''){
	update_option('ujian_target','0');
}
if($ujian_slide_pos == ''){
	update_option('ujian_slide_pos','right');
}
if($ujian_icon == ''){
	update_option('ujian_icon','1');
}

$ujian_codestyle =  $ujian_codestyle;
$style_arr = array_filter(explode(',',$ujian_codestyle));

if($ujian_define_pos == 'yes'){ // 如果选择用户自定义显示位置，关联的DIV为空
	$ujian ='';
}else if(in_array('widge',$style_arr)){
	$ujian ='<div class="ujian-hook"></div>';	
}


$ujian_config = get_option('ujian_config');
add_action('wp_footer', 'ujian_end');  // 用ujian_end函数输入JS链接地址到底部

function ujian_end() {

	$jia_tag = strip_tags($tag);
	global $ujian_config,$ujian,$ujian_code,$ujian_view_num,$ujian_bgcolor,$ujian_mouseovercolor,$ujian_textcolor,$ujian_bordercolor,$ujian_picsize,$ujian_defaultpic,$ujian_itemtitle,$ujian_showtype,$ujian_pos,$ujian_js,$ujian_showshares,$ujian_target,$ujian_hovertextcolor;
	//更新ujian_config 到数据库
	update_option('ujian_config',' 
	<script type="text/javascript">
    var ujian_config = {
		\'num\':'.$ujian_view_num.',
		\'showType\':'.$ujian_showtype.',
		\'bgColor\':"'.$ujian_bgcolor.'",
		\'mouseoverColor\':"'.$ujian_mouseovercolor.'",
		\'textColor\':"'.$ujian_textcolor.'",
		\'hoverTextColor\':"'.$ujian_hovertextcolor.'",
		\'borderColor\':"'.$ujian_bordercolor.'",
		\'picSize\':'.$ujian_picsize.',
		\'target\':'.$ujian_target.',
		\'textHeight\':60,
		\'defaultPic\':"'.$ujian_defaultpic.'",
		\'itemTitle\':"'.$ujian_itemtitle.'"
    }</script>
');
	echo get_option('ujian_config');
	if(is_single()){
		echo  "\n".$ujian_js;
	}else if(get_option('ujian_view_mode') == 'all' ){
		echo  "\n".$ujian_js;
	}
}

add_filter('the_tags', 'ujian_tags'); //将当前文章的标签写入库
function ujian_tags($tag){
	$jia_tag = strip_tags($tag);
	$jia_tag = str_replace(' ','',$jia_tag);
	$jia_tag = str_replace('&nbsp','',$jia_tag);
	$jia_tag = str_replace('&nbsp;','',$jia_tag);
	$jia_tag = str_replace('&amp;nbsp;','',$jia_tag);
	$jia_tag = str_replace('&amp;nbsp','',$jia_tag);
	$replace_arr = array('、','`','&middot;','&ampmiddot;',':',';','，','：','；');
	$ujian_tag = '';
	foreach($replace_arr as $key=>$val){
		if($key == 0){
			$ujian_tag = str_replace($val, ',', $jia_tag);
		}else{
			$ujian_tag = str_replace($val, ',', $ujian_tag);
		}
	}
	update_option('ujian_tag', $ujian_tag);
	return $tag;
}

add_filter('wp_title', 'ujian_title'); //将当前文章标题写入库
function ujian_title($title){
	update_option('ujian_title', str_replace(array('&raquo; ',' |',' &laquo;',' '),'',$title));
	return $title;
}

add_filter('the_content', 'ujian');
function ujian($content) {
	global $style_arr,$ujian_uid,$ujian_view_num,$ujian_bgcolor,$ujian_mouseovercolor,$ujian_textcolor,$ujian_bordercolor,$ujian_picsize,$ujian_defaultpic,$ujian_itemtitle,$ujian_showtype,$ujian_pos,$ujian_js,$ujian_showshares,$ujian_target,$ujian,$ujian_hovertextcolor;
	$api_url = 'http://api.ujian.cc/?nojs=1';
	$api_url .= '&url='.urlencode(get_permalink());
	//$api_url .= '&title='.urlencode(get_option('ujian_title'));
	$api_url .= '&dn='.$ujian_view_num;
	$api_url .= '&showtype='.$ujian_showtype;
	$api_url .= '&picsize='.$ujian_picsize;
	$api_url .= '&itemtitle='.urlencode($ujian_itemtitle);
	$api_url .= '&bgcolor='.urlencode($ujian_bgcolor);
	$api_url .= '&mouseovercolor='.urlencode($ujian_mouseovercolor);
	$api_url .= '&textheight=60';
	$api_url .= '&textcolor='.urlencode($ujian_textcolor);
	$api_url .= '&hovertextcolor='.urlencode($ujian_hovertextcolor);
	$api_url .= '&bordercolor='.urlencode($ujian_bordercolor);
	$api_url .= '&target='.$ujian_target;
	$api_url .= '&uid='.$ujian_uid;
	
	$ctx = stream_context_create(array('http'=>array('timeout'=>1)));
	$ujian_html = @file_get_contents($api_url, 0, $ctx);
	if($ujian_html){
		$ujian_html = '<div style="clear:both;">'.$ujian_html.'</div>';
	}
	if(is_single() || is_page() || is_feed()){
		if(in_array('slide',$style_arr)){
			$content =  $content."\n".'<span id="ujian-slide-pos"></span>'."\n";
		}
		if(in_array('widge',$style_arr)){
			$content =  $content."\n".$ujian_html."\n";
		}
	}
	return $content;
}


add_action('plugins_loaded', 'widget_sidebar_ujian');
function widget_sidebar_ujian() {
    function widget_ujian($args) {
        if(is_single() || is_page()) return;
        extract($args);
        echo $before_widget;
        echo $before_title . __('友荐推荐工具', 'ujian') . $after_title;
	    echo '<div style="margin:10px 0">';
	    echo htmlspecialchars_decode(get_option("ujian")) . '</div>';
        echo $after_widget;
    }
    register_sidebar_widget(__('友荐推荐工具', 'ujian'), 'widget_ujian');
}

add_action('admin_menu', 'ujian_menu');
function ujian_menu() {
    add_options_page(__('友荐选项', 'ujian'), __('友荐推荐工具', 'ujian'), 8, basename(__FILE__), 'ujian_options');
}

add_filter('plugin_action_links_ujian/ujian.php','ujianActionLinks', 10, 2);
function ujianActionLinks($links, $file) {
		array_unshift($links, '<a href="options-general.php?page=ujian.php">'.__('Settings').'</a>');
	    return $links;
}

function ujian_options() {
	global $ujian;
	$updated = false;
	if($_POST['updatesubmit']){
		$_POST['ujian_codestyle'] = $_POST['ujian_codestyle_widge'];
		$_POST['ujian_codestyle'] .= ",".$_POST['ujian_codestyle_slide'];
		
		update_option('ujian_view_num',$_POST['ujian_view_num']);
		update_option('ujian_view_mode',$_POST['ujian_view_mode']);
		update_option('ujian_codestyle',$_POST['ujian_codestyle']);
		update_option('ujian_define_pos',$_POST['ujian_define_pos']);
		update_option('ujian_feed',$_POST['ujian_feed']);
		update_option('ujian_uid',$_POST['ujian_uid']);
		update_option('ujian_picsize',$_POST['ujian_picsize']);
		update_option('ujian_itemtitle',$_POST['ujian_itemtitle']);
		update_option('ujian_bordercolor',$_POST['ujian_bordercolor']);
		update_option('ujian_defaultpic',$_POST['ujian_defaultpic']);
		update_option('ujian_textcolor',$_POST['ujian_textcolor']);
		update_option('ujian_hovertextcolor',$_POST['ujian_hovertextcolor']);
		update_option('ujian_bgcolor',$_POST['ujian_bgcolor']);
		update_option('ujian_bordercolor',$_POST['ujian_bordercolor']);
		update_option('ujian_mouseovercolor',$_POST['ujian_mouseovercolor']);
		update_option('ujian_showtype',$_POST['ujian_showtype']);
		update_option('ujian_target',$_POST['ujian_target']);
		update_option('ujian_slide_pos',$_POST['ujian_slide_pos']);
		update_option('ujian_icon',$_POST['ujian_icon']);
		if($_POST['ujian_codestyle_slide']){
			$concat = '&';
			$codestyle = '?type=slide';
			if($_POST['ujian_view_num'] != 5){
				$num = $concat.'num='.$_POST['ujian_view_num'];
			}
			if($_POST['ujian_slide_pos'] == 'left'){
				$pos = $concat.'pos=left';
			}
			if($_POST['ujian_icon'] != 1){
				$icon = $concat."btn=".$_POST['ujian_icon'];
			}
		}else{
			$concat = '?';
			$codestyle = '';
			$num = '';
		}
		$uid = !empty($_POST['ujian_uid'])?''.$concat.'uid='.$_POST['ujian_uid'].'':'';
		update_option('ujian_js','<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js'.$codestyle.$uid.$num.$pos.$icon.'"></script>');
		$updated = true;
	}
include 'ujian_setting.php';
 }
?>