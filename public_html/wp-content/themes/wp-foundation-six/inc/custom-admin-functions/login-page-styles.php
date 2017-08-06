<?php
/**
 * Adds stylesheet to admin and login screens
 *
 * @link https://codex.wordpress.org/Customizing_the_Login_Form
 * @link https://css-tricks.com/snippets/wordpress/apply-custom-css-to-admin-area/
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_login_page_styles' ) ) {
	/**
	 * Login page style sheet
	 *
	 * @method wp_foundation_six_login_page_styles
	 */
	function wp_foundation_six_login_page_styles() {
		wp_enqueue_style( 'login_page_styles', get_template_directory_uri() . '/assets/css/login-admin.min.css' );
	}
}
add_action( 'login_enqueue_scripts', 'wp_foundation_six_login_page_styles' );
add_action( 'admin_head', 'wp_foundation_six_login_page_styles' );
