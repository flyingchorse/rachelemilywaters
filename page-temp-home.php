<?php
/**
 * Template Name: Homepage
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>
		<div class="feature-section">
		<?php>$sticky = 'Fundraising';
$args = array(
	'posts_per_page' => 3,
	'post__in'  => $sticky,
	'ignore_sticky_posts' => 1
);
//query_posts( $args );

	while (have_posts()) : the_post();
	// insert here your stuff...
	?>
			<div class="section-<?php echo $featurecount; ?> feature">
			<a href='<?php the_permalink(); ?>'>
					<?php the_post_thumbnail('feature-posts-thumb');?>
					<h3><?php the_title(); ?></h3>
					<p><?php echo excerpt(15); ?></p>
			</a>		
			</div>
			
			<?php
			$featurecount++;
		endwhile;		
?>			
		<div class="clear-both"></div>	
			
		</div>
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

	<?php		 
	$options = rachelemilywaters_get_theme_options();

//$args = array('cat' => $options['sample_select_options'], 'posts_per_page' => 4, 'ignore_sticky_posts' => 1 );
  //  query_posts($args);
if (have_posts()) : 
?>
<div class="recent-post-section">
<?php
	$i = 1;
	while (have_posts()) : the_post();
	?>
	<div class="recent-post section-<?php echo($i); ?>">
	<a href='<?php the_permalink(); ?>'>
	<?php the_post_thumbnail('recent-posts-thumb');?>
		<h3><?php the_title()?></h3></a>
		<div class="post-date"><?php rachelemilywaters_posted_on(); ?></div>
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
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->


<?php get_footer(); ?>