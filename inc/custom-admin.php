<?php
/**
 * Login & Admin page customizations that act independently of the theme templates
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_foundation_six
 */


/**
 * Login page style sheet
 *
 * @link https://codex.wordpress.org/Customizing_the_Login_Form
 * @link https://css-tricks.com/snippets/wordpress/apply-custom-css-to-admin-area/
 */
if ( !function_exists('wp_foundation_six_login_page_styles') ){
	function wp_foundation_six_login_page_styles() {
		wp_enqueue_style( 'login_page_styles', get_template_directory_uri() . '/login/login.css' );
	}
}
add_action( 'login_enqueue_scripts', 'wp_foundation_six_login_page_styles' );
add_action('admin_head', 'wp_foundation_six_login_page_styles');


/**
 * Login page logo URL
 *
 * @link https://thomas.vanhoutte.be/miniblog/add-a-custom-logo-to-wordpress-wp-admin-login-page/
 */
if ( !function_exists('wp_foundation_six_login_page_custom_link') ){
	function wp_foundation_six_login_page_custom_link() {
		return site_url();
	}
}
add_filter( 'login_headerurl','wp_foundation_six_login_page_custom_link' );


/**
 * Login page logo title tag
 *
 * @link http://www.agentwp.com/how-to-replace-the-logo-on-wordpress-login-page
 */
if ( !function_exists('wp_foundation_six_change_title_on_logo') ){
	function wp_foundation_six_change_title_on_logo() {
		return get_bloginfo( 'name' );
	}
}
add_filter( 'login_headertitle', 'wp_foundation_six_change_title_on_logo' );


/**
 * Login page favicon
 *
 * @link http://www.kriesi.at/support/topic/adding-favicon-to-wordpress-back-end/
 */
if ( !function_exists('wp_foundation_six_add_login_favicon') ){
	function wp_foundation_six_add_login_favicon() {
		$favicon_path = get_template_directory_uri() . '/icons/favicon.ico';

		echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
	}
}
add_action( 'login_head', 'wp_foundation_six_add_login_favicon' );
add_action( 'admin_head', 'wp_foundation_six_add_login_favicon' );


/**
 * Change Howdy Text
 *
 * @link http://coffeecupweb.com/how-to-change-or-remove-howdy-text-on-wordpress-admin-bar/
 */
if ( !function_exists('wp_foundation_six_change_howdy_text_toolbar') ){
	function wp_foundation_six_change_howdy_text_toolbar($wp_admin_bar) {
		$getgreetings = $wp_admin_bar->get_node('my-account');
		$rpctitle = str_replace('Howdy','Welcome',$getgreetings->title);
		$wp_admin_bar->add_node(array("id"=>"my-account","title"=>$rpctitle));
	}
}
add_filter('admin_bar_menu','wp_foundation_six_change_howdy_text_toolbar');
