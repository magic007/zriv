<div id="footer">
<?php
$contact = get_option('contact_link');
$imprint = get_option('imprint_link');
$blog = get_option('blog_link');
?>
<div class="wordpress-icon">
<a href="http://www.wordpress.org/"><img src="<?php bloginfo('template_directory'); ?>/images/wp-icon.png" /></a> 
</div>
<p>
COPYRIGHT BY <a href="/" title=" <?php bloginfo('name'); ?>" target="_blank"><?php bloginfo('name'); ?></a> DESIGNED BY <a href="http://www.aesthetic-clinic-duesseldorf.de/schoenheitsoperation/brustvergroesserung-duesseldorf/" title="brustvergrößerung düsseldorf" target="_blank">Brustvergrößerung Düsseldorf</a>
</p>
<p class="footer-right">
<a href="/" title="home">Home</a>
<?php if (!empty($blog) && $blog==0) {
?>
<a href="<?php echo $blog;?>">Blog</a>
<?php
}
?>
<?php if (!empty($imprint) && $imprint==0) {
?>
<a href="<?php echo $imprint;?>">Imprint</a>
<?php
}
?>
<a href="/"><?php bloginfo('description'); ?></a>
</p>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
