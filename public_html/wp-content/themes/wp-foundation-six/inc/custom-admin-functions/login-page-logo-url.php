<?php
/**
 * Changes login pages logo URL to return to sites home page
 *
 * @link https://thomas.vanhoutte.be/miniblog/add-a-custom-logo-to-wordpress-wp-admin-login-page/
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_login_page_custom_link' ) ) {
	/**
	 * Login page logo URL
	 *
	 * @method wp_foundation_six_login_page_custom_link
	 * @return string - Link to home page
	 */
	function wp_foundation_six_login_page_custom_link() {
		return get_home_url();
	}
}
add_filter( 'login_headerurl','wp_foundation_six_login_page_custom_link' );
