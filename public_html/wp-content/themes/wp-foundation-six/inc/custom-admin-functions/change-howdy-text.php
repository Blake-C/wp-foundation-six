<?php
/**
 * Changes the "Howdy" text on admin pages to "Welcome"
 *
 * @link http://coffeecupweb.com/how-to-change-or-remove-howdy-text-on-wordpress-admin-bar/
 * @link https://developer.wordpress.org/reference/hooks/admin_bar_menu/
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_change_howdy_text_toolbar' ) ) {
	/**
	 * This is the hook used to add, remove, or manipulate admin bar items.
	 *
	 * @method wp_foundation_six_change_howdy_text_toolbar
	 * @param WP_Admin_Bar $wp_admin_bar - WP_Admin_Bar instance, passed by reference.
	 */
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
