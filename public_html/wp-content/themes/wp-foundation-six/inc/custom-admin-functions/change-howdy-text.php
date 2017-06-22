<?php

/**
 * Change Howdy Text
 *
 * @link http://coffeecupweb.com/how-to-change-or-remove-howdy-text-on-wordpress-admin-bar/
 */
if ( ! function_exists( 'wp_foundation_six_change_howdy_text_toolbar' ) ) {
	function wp_foundation_six_change_howdy_text_toolbar( $wp_admin_bar ) {
		$getgreetings = $wp_admin_bar->get_node( 'my-account' );

		$rpctitle = str_replace( 'Howdy', 'Welcome', $getgreetings->title );

		$wp_admin_bar->add_node(
			array(
				'id' => 'my-account',
				'title' => $rpctitle,
			)
		);
	}
}
add_filter( 'admin_bar_menu', 'wp_foundation_six_change_howdy_text_toolbar' );
