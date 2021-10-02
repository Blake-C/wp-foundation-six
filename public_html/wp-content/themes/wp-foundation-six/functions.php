<?php
/**
 * WP Foundation Six functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage#ignoring-files-and-folders
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_foundation_six_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'wp_foundation_six', get_template_directory() . '/languages' );

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
		 *
		 * Ex:
		 * add_image_size( 'unique_name', 490, 240, array( 'center', 'top' ) );
		 */

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'wp_foundation_six' ),
				'footer'  => __( 'Footer Menu', 'wp_foundation_six' ),
			)
		);

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Remove wp_header meta
		 */
		remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds.
		remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed.
		remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link.
		remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
		remove_action( 'wp_head', 'index_rel_link' ); // index link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link.
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Display relational links for the posts adjacent to the current post.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // Injects rel=shortlink into the head if a shortlink is defined for the current page.
		remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version.
	}

	/**
	 * If you don't want to see inline debug code for
	 * what file generated a region of a page, set this
	 * constant to false.
	 */
	define( 'WPFS_INLINE_DEBUG', true );
}
add_action( 'after_setup_theme', 'wp_foundation_six_setup' );


/**
 * Remove wp version meta tag and from rss feed
 *
 * @link https://thomasgriffin.io/hide-wordpress-meta-generator-tag/
 */
add_filter( 'the_generator', '__return_false' );


/**
 * Add callback for custom TinyMCE editor stylesheets.
 *
 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
 */
add_editor_style( 'assets/css/editor-styles.min.css' );


if ( ! function_exists( 'wp_foundation_six_widgets_init' ) ) {
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function wp_foundation_six_widgets_init() {
		register_sidebar(
			array(
				'name'          => __( 'Primary Sidebar', 'wp_foundation_six' ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'wp_foundation_six_widgets_init' );


if ( ! function_exists( 'wp_foundation_six_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function wp_foundation_six_scripts() {
		/* Asset file paths set to variables */
		$global_styles  = get_template_directory_uri() . '/assets/css/global-styles.min.css';
		$global_scripts = get_template_directory_uri() . '/assets/js/bundle.global-scripts.js';

		/* Import CSS (Sass files are in the theme-components folder) */
		wp_enqueue_style( 'wp-foundation-six-style', $global_styles, array(), wpfs_cache_bust( $global_styles ) );

		/* Import Scripts (Keep to a minimum or import into global-scripts.js file) */
		wp_enqueue_script( 'wp-foundation-six-global', $global_scripts, array( 'jquery' ), wpfs_cache_bust( $global_scripts ), true );

		/**
		 * Conditionally add scripts and styles to pages with template tags
		 *
		 * @link https://codex.wordpress.org/Template_Tags
		 *
		 * Ex:
		 * if ( is_front_page() ) {
		 *     $scripts_home = get_template_directory_uri() . '/assets/js/scripts-home-min.js';
		 *     wp_enqueue_script( 'wp-foundation-six-home-scripts', $scripts_home, array('jquery'), wpfs_cache_bust( $scripts_home ), true );
		 * }
		 */
	}
}
add_action( 'wp_enqueue_scripts', 'wp_foundation_six_scripts' );


// Include components.
require get_template_directory() . '/inc/includes.php';


// Custom utility functions.
require get_template_directory() . '/inc/utility-functions.php';
