<?php
/**
 * Changes the title tag on the login pages logo to the sites name
 *
 * @link http://www.agentwp.com/how-to-replace-the-logo-on-wordpress-login-page
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_change_title_on_logo' ) ) {
	/**
	 * Login page logo title tag
	 *
	 * @method wp_foundation_six_change_title_on_logo
	 * @return string - site name
	 */
	function wp_foundation_six_change_title_on_logo() {
		return get_bloginfo( 'name' );
	}
}
add_filter( 'login_headertitle', 'wp_foundation_six_change_title_on_logo' );
