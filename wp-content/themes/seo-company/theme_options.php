<?php
$themename = "SE0-Company";

function pake_add_option() {

	global $themename;

	//create new top-level menu under Presentation
	add_theme_page($themename." 主题设置", "".$themename." 主题设置", 'administrator', basename(__FILE__), 'pake_form');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {

	//register our settings
	
	register_setting( 'pake-settings', 'pake_description');
	register_setting( 'pake-settings', 'pake_notice');
	register_setting( 'pake-settings', 'home_catid1');
	register_setting( 'pake-settings', 'home_catid2');
	register_setting( 'pake-settings', 'pake_about');
	register_setting( 'pake-settings', 'pake_keywords');
    register_setting( 'pake-settings', 'pake_ad_postbottom');
	register_setting( 'pake-settings', 'pake_footer');
	register_setting( 'pake-settings', 'pake_fuwu1');
	register_setting( 'pake-settings', 'pake_fuwu2');
	register_setting( 'pake-settings', 'pake_fuwu3');
	register_setting( 'pake-settings', 'pake_fuwu1_nr');
	register_setting( 'pake-settings', 'pake_fuwu2_nr');
	register_setting( 'pake-settings', 'pake_fuwu3_nr');
}

function pake_form() {

	global $themename;

?>
<!-- Options Form begin -->
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br/></div>
	<h2><?php echo $themename; ?>设置</h2>
    <ul class="subsubsub" style=" margin-top:15px;">
    	<li><a href="#pake_bs"><strong>基本设置</strong></a> |</li>
         <li><a href="#pake_ad"><strong>简介设置</strong></a> |</li>
		 <li><a href="#pake_ad1"><strong>服务内容设置</strong></a> |</li>
        <li><a href="#pake_ft"><strong>底部设置</strong></a></li>
    </ul>
	<form method="post" action="options.php">
		<?php settings_fields('pake-settings'); ?>
		<table class="form-table">
			<tr valign="top">
            	<td><h3 id="pake_bs">基本设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站描述<span class="description">(文本)</span></label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="pake_description"><?php echo get_option('pake_description'); ?></textarea>
                    <br />
                    <span class="description">设置网站的描述信息 (显示在首页源代码中, 有利于搜索优化)<br /></span>
                </td>
        	</tr>
		
            
            <tr valign="top">
                <th scope="row"><label>网站关键字<span class="description">(文本)</span></label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="pake_keywords"><?php echo get_option('pake_keywords'); ?></textarea>
                    <br />
                    <span class="description"> 设置网站优化关键字(多个关键词请用英文"'"逗号隔开. 显示在首页源代码中, 有利于搜索优化)<br /></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>网站公告<span class="description">(文本)</span></label></th>
                <td>
                    <textarea style="width:35em; height:5em;" name="pake_notice"><?php echo get_option('pake_notice'); ?></textarea>
                    <br />
                    <span class="description">设置网站的公告</strong></span>
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>指定首页显示分类的ID<span class="description">(数值)</span></label></th>
                <td>
                    <input class="regular-text" style="width:5em;" type="text" name="home_catid1" value="<?php echo get_option('home_catid1'); ?>" />
					<input class="regular-text" style="width:5em;" type="text" name="home_catid2" value="<?php echo get_option('home_catid2'); ?>" />
                    <br />
                    <a title="如何查看分类ID" href="http://www.wpyou.com/how-to-find-the-category-id.html" target="_blank">如何获取分类ID</a></span>
                </td>
        	</tr>
            <tr valign="top">
            	<td><h3 id="pake_ad">简介设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>标题：<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="pake_about"><?php echo get_option('pake_about'); ?></textarea>
                    <br />
                  
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>简介内容<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="pake_ad_postbottom"><?php echo get_option('pake_ad_postbottom'); ?></textarea>
                    <br />
                   
                </td>
        	</tr>
 <tr valign="top">
            	<td><h3 id="pake_ad1">服务内容设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>标题1：<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="pake_fuwu1"><?php echo get_option('pake_fuwu1'); ?></textarea>
                    <br />
                  
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>服务内容1<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="pake_fuwu1_nr"><?php echo get_option('pake_fuwu1_nr'); ?></textarea>
                    <br />
                   
                </td>
        	</tr>
			 <tr valign="top">
                <th scope="row"><label>标题2：<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="pake_fuwu2"><?php echo get_option('pake_fuwu2'); ?></textarea>
                    <br />
                  
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>服务内容2<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="pake_fuwu2_nr"><?php echo get_option('pake_fuwu2_nr'); ?></textarea>
                    <br />
                   
                </td>
        	</tr>
			 <tr valign="top">
                <th scope="row"><label>标题3：<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:2em;" name="pake_fuwu3"><?php echo get_option('pake_fuwu3'); ?></textarea>
                    <br />
                  
                </td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>服务内容3<span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="pake_fuwu3_nr"><?php echo get_option('pake_fuwu3_nr'); ?></textarea>
                    <br />
                   
                </td>
        	</tr>
			
            <tr valign="top">
            	<td><h3 id="pake_ft">底部设置</h3></td>
        	</tr>
            <tr valign="top">
                <th scope="row"><label>统计代码 <span class="description"></span></label></th>
                <td>
                    <textarea style="width:35em; height:10em;" name="pake_footer"><?php echo get_option('pake_footer'); ?></textarea>
                    <br />
                    <span class="description">统计代码 （支持HTM）</span>
                </td>
        	</tr>
		</table>
		<p class="submit">
		<input type="submit" name="save" id="button-primary" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
        <p style="margin-bottom:60px;">本主题由<a href="http://wwww.pakelab.com/" target="_blank">帕克实验室</a>开发设计</p>
	</form>
    <style type="text/css"> .form-table th{ text-align:right;} span.description{ font-style:normal;} .form-table h3{ padding:5px 10px 4px; color:#FFF; background-color:#21759B;}</style>
</div>
<!-- Options Form begin -->

<?php } 
	// create custom plugin settings menu
	add_action('admin_menu', 'pake_add_option');
?>