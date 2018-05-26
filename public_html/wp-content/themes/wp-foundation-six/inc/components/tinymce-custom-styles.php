<?php
/**
 * TinyMCE is the name of the visual editor that comes with WordPress,
 * which can be used to edit post and page content. It comes with a variety
 * of buttons for standard HTML tags like Strong, Emphasis, Blockquote and
 * Lists. In addition to these defaults, TinyMCE has an API that can be used
 * to define custom styles that can be inserted into post content from the
 * Visual editor.
 *
 * @link https://codex.wordpress.org/TinyMCE_Custom_Styles
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wp_foundation_six_button_format' ) ) {
	/**
	 * Callback function to insert 'styleselect' into the $buttons array
	 *
	 * @param  array $buttons Second-row list of buttons.
	 * @return array          Second-row list of buttons.
	 *
	 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/mce_buttons,_mce_buttons_2,_mce_buttons_3,_mce_buttons_4
	 */
	function wp_foundation_six_button_format( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'wp_foundation_six_button_format' );


if ( ! function_exists( 'wp_foundation_six_insert_formats' ) ) {
	/**
	 * Callback function to filter the MCE settings
	 *
	 * @param  array $init_array An array with TinyMCE config.
	 * @return array             An array with TinyMCE config.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/tiny_mce_before_init/
	 */
	function wp_foundation_six_insert_formats( $init_array ) {
		// Define the style_formats array.
		$style_formats = array(
			/**
			 * Each array child is a format with it's own settings
			 *
			 * @link https://codex.wordpress.org/TinyMCE_Custom_Styles
			 */
			array(
				'title' => 'Buttons',
				'items' => array(
					array(
						'title' => 'Styles',
						'items' => array(
							array(
								'title'    => 'Primary',
								'selector' => 'a',
								'classes'  => 'button primary',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Secondary',
								'selector' => 'a',
								'classes'  => 'button secondary',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Success',
								'selector' => 'a',
								'classes'  => 'button success',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Alert',
								'selector' => 'a',
								'classes'  => 'button alert',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Warning',
								'selector' => 'a',
								'classes'  => 'button warning',
								'wrapper'  => false,
							),
						),
					),
					array(
						'title' => 'Size',
						'items' => array(
							array(
								'title'    => 'Large',
								'selector' => 'a',
								'classes'  => 'large',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Small',
								'selector' => 'a',
								'classes'  => 'small',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Tiny',
								'selector' => 'a',
								'classes'  => 'tiny',
								'wrapper'  => false,
							),
							array(
								'title'    => 'Expanded',
								'selector' => 'a',
								'classes'  => 'expanded',
								'wrapper'  => false,
							),
						),
					),
				),
			),
			array(
				'title' => 'Callouts',
				'items' => array(
					array(
						'title'   => 'Callout Primary',
						'block'   => 'div',
						'classes' => 'callout primary',
						'wrapper' => true,
					),
					array(
						'title'   => 'Callout Secondary',
						'block'   => 'div',
						'classes' => 'callout secondary',
						'wrapper' => true,
					),
					array(
						'title'   => 'Callout Success',
						'block'   => 'div',
						'classes' => 'callout success',
						'wrapper' => true,
					),
					array(
						'title'   => 'Callout Warning',
						'block'   => 'div',
						'classes' => 'callout warning',
						'wrapper' => true,
					),
					array(
						'title'   => 'Callout Alert',
						'block'   => 'div',
						'classes' => 'callout alert',
						'wrapper' => true,
					),
				),
			),
		);

		// Insert the array, JSON ENCODED, into 'style_formats'.
		$init_array['style_formats'] = wp_json_encode( $style_formats );

		return $init_array;
	}
}
// Attach callback to 'tiny_mce_before_init'.
add_filter( 'tiny_mce_before_init', 'wp_foundation_six_insert_formats' );
