<?php
/**
 * wp_foundation_six functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_foundation_six
 */

if ( !function_exists( 'wp_foundation_six_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_foundation_six_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Custom thumbnail sizes.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_image_size/
		 */
		// add_image_size( 'unique_name', 490, 240, array('center', 'top') );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'theme' ),
			'footer' => __( 'Footer Menu', 'theme' )
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Remove wp_header meta
		 */
		remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
		remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
		remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
		remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
		remove_action( 'wp_head', 'index_rel_link' ); // index link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Display relational links for the posts adjacent to the current post.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
		remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
	}
}
add_action( 'after_setup_theme', 'wp_foundation_six_setup' );


/**
 * remove wp version meta tag and from rss feed
 *
 * @link https://thomasgriffin.io/hide-wordpress-meta-generator-tag/
 */
add_filter( 'the_generator', '__return_false' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( !function_exists( 'wp_foundation_six_widgets_init' ) ) {
	function wp_foundation_six_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Primary Sidebar' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'wp_foundation_six_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
if ( !function_exists( 'wp_foundation_six_scripts' ) ) {
	function wp_foundation_six_scripts() {
		/* Import CSS (Sass files are in the theme-components folder) */
		wp_enqueue_style( 'wp-foundation-six-style', get_template_directory_uri() . '/assets/css/global-styles.min.css' );

		/* Register jQuery, Utility Function */
		wp_foundation_six_get_jquery_cdn(
			array(
				'modern_jquery_cdn' 	=> 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js',
				'modern_jquery_local' 	=> '/assets/js/vendors/jquery/jquery.min.js',
				'legacy_jquery_cdn' 	=> 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js'
			)
		);


		/* Import Scripts (Keep to a minimum or import into scripts file) */
		wp_enqueue_script( 'wp-foundation-six-global', get_template_directory_uri() . '/assets/js/bundle.global-scripts.js', array('jquery'), null, true );
		wp_enqueue_script( 'wp-foundation-six-modernizr', get_template_directory_uri() . '/assets/js/vendors/bundle.modernizr.js', null, null, true );


		/**
		 * Conditionally add scripts and styles to pages with template tags
		 *
		 * @link https://codex.wordpress.org/Template_Tags
		*/
		// if ( is_home_page() ) {
		// 	wp_enqueue_script( 'wp-foundation-six-home-scripts', get_template_directory_uri() . '/assets/js/scripts-home-min.js', array('jquery'), '21112015', true );
		// }
	}
}
add_action( 'wp_enqueue_scripts', 'wp_foundation_six_scripts' );


// Include components
require get_template_directory() . '/inc/includes.php';


// Custom utility functions
require get_template_directory() . '/inc/utility-functions.php';
