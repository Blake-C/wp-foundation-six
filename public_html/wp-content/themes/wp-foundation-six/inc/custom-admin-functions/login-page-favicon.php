<?php

/**
 * Login page favicon
 *
 * @link http://www.kriesi.at/support/topic/adding-favicon-to-wordpress-back-end/
 */
if ( !function_exists('wp_foundation_six_add_login_favicon') ){
	function wp_foundation_six_add_login_favicon() {
		$favicon_path = get_template_directory_uri() . '/assets/icons/favicon.ico';

		echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
	}
}
add_action( 'login_head', 'wp_foundation_six_add_login_favicon' );
add_action( 'admin_head', 'wp_foundation_six_add_login_favicon' );
