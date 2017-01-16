<div id="right">
    	               
                <div class="type"><h3>文章分类</h3>
        	<ul>
            		
	<?php wp_list_categories('title_li=&orderby=name&hide_empty=0&show_count=1&depth=1');?>

            </ul>
        </div>
                <div class="sidebox">
        	<h3>随机文章</h3>
			
            <ul>
            	  <?php 
	  global $query_string3;
	  query_posts($query_string3.'&posts_per_page=10&caller_get_posts=1&orderby=rand'); ?>
	<?php while (have_posts()) : the_post(); ?>
      <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
          </ul></div>
		  
<div class="block comment"><h3>最新评论</h3>
        	<ul>
            	
 <?php get_recent_comments(); ?>
</ul>


        </div><br>
<?php include (TEMPLATEPATH . '/qq.php'); ?>  