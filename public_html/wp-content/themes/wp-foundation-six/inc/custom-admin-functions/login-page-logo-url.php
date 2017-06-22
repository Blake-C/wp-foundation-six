<?php

/**
 * Login page logo URL
 *
 * @link https://thomas.vanhoutte.be/miniblog/add-a-custom-logo-to-wordpress-wp-admin-login-page/
 */
if ( ! function_exists( 'wp_foundation_six_login_page_custom_link' ) ) {
	function wp_foundation_six_login_page_custom_link() {
		return get_home_url();
	}
}
add_filter( 'login_headerurl','wp_foundation_six_login_page_custom_link' );
