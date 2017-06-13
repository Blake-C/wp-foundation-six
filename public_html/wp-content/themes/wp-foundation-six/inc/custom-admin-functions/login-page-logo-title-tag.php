<?php

/**
 * Login page logo title tag
 *
 * @link http://www.agentwp.com/how-to-replace-the-logo-on-wordpress-login-page
 */
if ( ! function_exists( 'wp_foundation_six_change_title_on_logo' ) ) {
	function wp_foundation_six_change_title_on_logo() {
		return get_bloginfo( 'name' );
	}
}
add_filter( 'login_headertitle', 'wp_foundation_six_change_title_on_logo' );
