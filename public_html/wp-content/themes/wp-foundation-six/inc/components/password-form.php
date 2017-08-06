<?php
/**
 * Custom Post Password Form
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_custom_password_form' ) ) {
	/**
	 * Customizes the password form to have Foundation Six classes
	 *
	 * @method wp_foundation_six_custom_password_form
	 * @return string - Form element
	 */
	function wp_foundation_six_custom_password_form() {
		global $post;

		$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );

		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
			<p>' . __( 'To view this protected post, enter the password below:', 'wp_foundation_six' ) . '</p>' .
			'<div class="row collapse">' .
				'<div>' .
					'<label class="pass-label" for="' . $label . '">' . __( 'Password:', 'wp_foundation_six' ) . ' </label>' .
				'</div>' .
				'<div class="small-8 columns">' .
					'<input name="post_password" id="' . $label . '" type="password" />' .
				'</div>' .
				'<div class="small-4 columns">' .
					'<input type="submit" name="Submit" class="button expanded" value="' . esc_attr_x( 'Submit', 'Button value attribute on password form', 'wp_foundation_six' ) . '" />' .
				'</div>' .
			'</div>' .
		'</form>';

		return $o;
	}
}
add_filter( 'the_password_form', 'wp_foundation_six_custom_password_form' );
