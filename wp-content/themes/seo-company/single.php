
<?php include (TEMPLATEPATH . '/header.php'); ?>
	<div id="mainbody"> 
    	<div id="left"> 
        	<div class="place"> 
				
             <div class="subnavi-l">当前位置: <a href="<?php echo get_settings('home'); ?>">首页</a>&raquo; <?php the_category(', ') ?>&raquo; <?php the_title()?></div>
                
			</div> 
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        	<div class="content"> 
        		            	<div class="post" id="post-27"> 
            		<h2><?php the_title(); ?></h2> 
					<div class="info"> 
                    							<span class="addcomment"><a href="#respond">发表评论</a></span> 
						                    	<span class="comments"><?php comments_popup_link('0 条', '1 条', '% 条'); ?> 条评论</span> 
						<span class="author">发布：<?php the_author(); ?></span> 
                    	<span class="date">发表时间：<?php the_time('Y-m-d'); ?></span> 
                    	<span class="tags">标签：<?php the_tags(' ',' ,',''); ?></span> 
						<div class="clear"></div> 
					</div> 
					<div class="con" id="a27"> 
						　<?php the_content(); ?>
<div style="margin-bottom:10px"><a class="bshareDiv" target="_blank" href="http://www.bshare.cn/share">分享&收藏</a><script language="javascript" type="text/javascript" src="http://www.bshare.cn/button.js"></script></div>						<div class="clear"></div> 
					</div> 
                	<div class="under"> 
						<p>文章作者：<?php the_author(); ?><br />本文地址：<a href="<?php the_permalink(); ?>" target="_blank"><?php the_permalink(); ?></a><br />版权所有 &copy; 转载时必须以链接形式注明作者和原始出处！</p> 
					</div> 
            	</div> 
            	<div id="postnavi"> 
					<span class="prev">&laquo; <?php previous_post_link('%link'); ?></span> 
					<span class="next"><?php next_post_link('%link'); ?> &raquo;</span> 
					<div class="clear"></div> 
				</div> 
				<?php endwhile; ?>
				<?php endif; ?>
            	<div class="like"> 
            	<h4>或许你会感兴趣的文章</h4><ul> 
<?php
$cats = wp_get_post_categories($post->ID);
if ($cats) {
$cat = get_category( $cats[0] );
$first_cat = $cat->cat_ID;
$args = array(
'category__in' => array($first_cat),
'post__not_in' => array($post->ID),
'showposts' => 6,
'orderby' => rand,
'caller_get_posts' => 1);
query_posts($args);
if (have_posts()) :
while (have_posts()) : the_post(); update_post_caches($posts); ?>
<li><span><?php the_time('Y-m-j H:i'); ?></span><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute();
?>"><?php the_title(); ?></a></li>
<?php endwhile; else : ?>
<li>暂无相关文章</li>
<?php endif; wp_reset_query(); } ?>
</ul> 
            	</div> 
            	            	<div class="comment_box"> 
            	<?php comments_template(); ?>          	</div> 
        	</div> 
        </div> 
        	<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
        	
    <div class="rb"></div>
	</div>
           <div class="clear"></div>
	</div><!-- #container -->
<?php get_footer(); ?>