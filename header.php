<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package rachelemilywaters
 * @since rachelemilywaters 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/cadeed6e-ed0c-4158-91c3-ba9b3b8511d4.css"/>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span id="logo-span"></span><?php bloginfo( 'name' ); ?></a></h1>			
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'rachelemilywaters' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'rachelemilywaters' ); ?>"><?php _e( 'Skip to content', 'rachelemilywaters' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		<div class="clear-both"></div>
	</header><!-- #masthead .site-header -->
	<?php if (is_front_page()){
	?>	
	<div id="slideshow-welcome">
		<?php  dgtheme_belowmenu();
		?>
	
	<div class="welcome-message">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page Intro Area')) : ?>
							
					<?php endif; ?>				
	</div>
	<div class="clear-both"></div>
	</div>
	<?php	
	} ?>

	<div id="main" class="site-main">
