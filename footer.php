<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package rachelemilywaters
 * @since rachelemilywaters 1.0
 */
?>

	</div><!-- #main .site-main -->
	<div class="clear-both"></div>
	</div><!-- #page -->
<div class="clear-both"></div>
<footer id="colophon" role="contentinfo">
		<div id="footer-columns">
			<?php		 
	$options = rachelemilywaters_get_theme_options();

$args = array('cat' => $options['sample_select_options'], 'posts_per_page' => 3, 'ignore_sticky_posts' => 1 );
    query_posts($args);
if (have_posts()) : 
?>
<div class="recent-post-section">
<div class="recent-post section-0">
<img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/logo-small_212px.png" alt="logo-small_212px" width="212" height="45" />
<h3>About Rachel</h3>
</div>
<?php
	$i = 2;
	while (have_posts()) : the_post();
	?>
	<div class="recent-post section-<?php echo($i); ?>">
		<h3><?php the_title()?></h3>
		<?php the_excerpt(); ?>
</div><?php
			$i++;
	endwhile;

	?>
</div>
<?php
endif; 
wp_reset_query();

?>

			<div class="clear-both"></div>
		</div>
	</footer><!-- #colophon -->



<?php wp_footer(); ?>

</body>
</html>