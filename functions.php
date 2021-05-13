<?php
/**
 * rachelemilywaters functions and definitions
 *
 * @package rachelemilywaters
 * @since rachelemilywaters 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since rachelemilywaters 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'rachelemilywaters_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since rachelemilywaters 1.0
 */
function rachelemilywaters_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on rachelemilywaters, use a find and replace
	 * to change 'rachelemilywaters' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rachelemilywaters', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('recent-posts-thumb',220,220, true);
	add_image_size('feature-posts-thumb',150,112, true);
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rachelemilywaters' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // rachelemilywaters_setup
add_action( 'after_setup_theme', 'rachelemilywaters_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since rachelemilywaters 1.0
 */
function rachelemilywaters_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'rachelemilywaters' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array (
		'name' => __( 'Home Page Intro Area', 'powered-by' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional widget area for the custom Home Page template', 'powered-by' ),
		'before_widget' => '<aside id="%1$s" class="intro-widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	

}
add_action( 'widgets_init', 'rachelemilywaters_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function rachelemilywaters_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'rachelemilywaters_scripts' );

/**
 * Implement the Custom Header feature
 */
 
 
 
 
 
 // Just before the header div
function dgtheme_belowmenu() {
    do_action('dgtheme_belowmenu');
} // end thematic_aboveheader


function slideshow() {
global $post;


?><div id="slide-container"><div id="art-slideshow"> <?php
$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
			$attachments = get_posts($args);
			$loopcount = 1;
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'article-header');
				?>
				 <img class="slide-image <?php if ($loopcount == 1) { echo 'active';} ?>" src="<?php echo $imageloader[0]; ?>" width="620" height="306" alt="<?php echo $template_name ?>"/>
				<?php 
				
				$loopcount = $loopcount + 1;
				}
			}


?></div></div><?php
//end action:
}
//now we can add our new action to the appropriate place like so:

add_action('dgtheme_belowmenu', 'slideshow' ,0);

//require( get_template_directory() . '/inc/custom-header.php' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
