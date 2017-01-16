<div class="clear"></div>
<br />
<div class="post">
<h2 class="sub">随机挑选</h2>
<ul>
<?php
$rand_posts = get_posts('numberposts=15&orderby=rand');
foreach( $rand_posts as $post ) :
?>
<li>[ <?php if (the_category(', '))  the_category(); ?> ] <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
</div>
