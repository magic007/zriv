<?php
@include '../wp-content/plugins/youyan-social-comment-system/link.php';
if($_COOKIE['UYEmail'] == '' && $_COOKIE['UYPassword'] == ''){
	@include '../wp-content/plugins/youyan-social-comment-system/uyan_plugin_admin.php';
}else{
?>
<div id="stepTwoWrapper" style=" margin-left:-20px; padding-left:30px; padding-top:50px; ">
<div id="wpEdit" style="display:block;">
    <div class="editFrameTitle">禁用或保留原有WordPress评论</div>
    <div class="editFramContainer" style="margin-top:15px;">
    <label for="UYUseOriginalChoose"  onclick="sel_it('comment_no')">
      <input type="radio" name="UYUseOriginalChoose"  id="comment_no" value="0" checked/>
                  禁用 
      </label> &nbsp;&nbsp;&nbsp;
     <label for="UYUseOriginalChoose" onclick="sel_it('comment_yes')">          
      <input type="radio" name="UYUseOriginalChoose" id="comment_yes" value="1" />
               保留
      </label>            
    </div>
    <script>
    	function sel_it(obj){
			$("#"+obj).attr({"checked":true});
    	}
    	<?php if (get_option('uyan_use_orig') == 0 || get_option('uyan_use_orig') == '') { ?>
  		  $("input[name='UYUseOriginalChoose'][value='0']").attr("checked",true);
    	<?php } else { ?>
  		  $("input[name='UYUseOriginalChoose'][value='1']").attr("checked",true);
    	<?php } ?>
    </script>
    <div class="clear"></div>
    <input class="showCodeBTNApply" type="submit" name="Submit" style="position: inherit; left:0px; top: 0;" value="保存设置" onclick="saveSettings()">
    <div class="clear"></div>

    <div class="imoportIntro">从Wordpress评论导入数据到友言</div>
    <div>
    	<div class="importBTNWrapper" style="width:200px;float:left;">
        	<a class='importBTN' onclick="importComment(this)">导入数据</a>
    	</div>
    	<span id="uyan_runtotal_id" style="width:550px;float:left;display:block;height: 30px;line-height: 36px;"></span>
    </div>
    <div class="clear"></div>
    <div class="imoportIntro">从友言导出数据到Wordpress</div>
        <div class="importBTNWrapper">
        <a class='exportBTN' onclick="exportComment()" style="float:left;">导出数据</a>
        <div id="uyan_export"><div style="width:80px; float:left; margin-left:15px; height:35px; line-height:35px;" class="uyan_export_text"></div></div></div>
        <div class="clear">
    </div>
</div>
</div>
<script>
function exportComment(){
	$("#uyan_export .uyan_export_text").html('正在导入 <img src="../wp-content/plugins/youyan-social-comment-system/images/loading.gif" style="float:right; margin-top:4px; padding-top:4px;" /></div>');
	$.post(
		'../wp-content/plugins/youyan-social-comment-system/uyan_export_wp_comments.php',
		{action:'uyan_export'},
		function (count,status){
			if(status == 'success'){
				$("#uyan_export .uyan_export_text").html('导入成功!');	
			}
		});	
}

function importComment(node, nowpage, alltotal, lowertotal, runtotal){

	if(typeof(nowpage) == "undefined") nowpage = 0;
	if(typeof(alltotal) == "undefined") alltotal = 0;
	if(typeof(lowertotal) == "undefined") lowertotal = 0;
	if(typeof(runtotal) == "undefined") runtotal = 0;
	$node = $(node);
	$node.removeAttr('onclick');
	$("#importNoti").remove();
	$node.css({'background-image':'url(../wp-content/plugins/youyan-social-comment-system/images/importDataPressed.png)','cursor':'default'});
	$node.html('正在导入');

	$.ajax({
		type : 'POST',
		url : '../wp-content/plugins/youyan-social-comment-system/uyan_import_wp_comments.php',
		data : 'action=uyan_import&nowpage='+nowpage+'&alltotal='+alltotal+'&runtotal='+runtotal,
		success : function(msg) {
			var res = msg.split('_FINISH_STATUS_');
			var resArr = res[1].split('_');
			nowpage = parseInt(resArr[0]);
			alltotal = parseInt(resArr[1]);
			runtotal = parseInt(resArr[2]);
			pagesize = parseInt(resArr[3]);
			if(nowpage < alltotal/pagesize) {
				nowpage ++;
				$('#uyan_runtotal_id').html('<img src="../wp-content/plugins/youyan-social-comment-system/images/loading.gif" />&nbsp;导入成功'+runtotal+'条评论，还有'+(alltotal-runtotal)+'条记录没有分析');
				importComment(this, nowpage, alltotal, lowertotal, runtotal);
			} else {
				if(runtotal != 2) {
					$('#uyan_runtotal_id').html('完成导入'+runtotal+'条评论');
				} else {
					$('#uyan_runtotal_id').html('导入完成');
				}
				$('.importBTN').attr('style', '');
				$('.importBTN').html('完成导入');
			}
		}
	});

}

</script>

<?php }?>