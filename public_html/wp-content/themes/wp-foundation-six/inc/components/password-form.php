<?php

/**
 *
 * Custom Post Password Form
 *
 * @package Theme
 */
if ( ! function_exists( 'wp_foundation_six_custom_password_form' ) ) {
	function wp_foundation_six_custom_password_form() {
		global $post;

		$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );

		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		' . __( '<p>To view this protected post, enter the password below:</p>' ) .
			'<div class="row collapse">' .
				'<div>' .
					'<label class="pass-label" for="' . $label . '">' . __( 'Password:' ) . ' </label>' .
				'</div>' .
				'<div class="small-8 columns">' .
					'<input name="post_password" id="' . $label . '" type="password" />' .
				'</div>' .
				'<div class="small-4 columns">' .
					'<input type="submit" name="Submit" class="button expanded" value="' . esc_attr__( 'Submit' ) . '" />' .
				'</div>' .
			'</div>' .
		'</form>';

		return $o;
	}
}
add_filter( 'the_password_form', 'wp_foundation_six_custom_password_form' );
