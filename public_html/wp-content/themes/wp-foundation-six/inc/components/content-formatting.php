<?php
/**
 * Modifies the post content.
 *
 * @package wp_foundation_six
 */

if ( ! function_exists( 'wpfs_content_formatter' ) ) {
	/**
	 * Disable Automatic Formatting Using a Shortcode.
	 *
	 * @param  string $content The post content.
	 * @return string          The formatted post content
	 */
	function wpfs_content_formatter( $content ) {
		$new_content      = '';
		$pattern_full     = '{(\[raw\].*?\[/raw\])}is';
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
		$pieces           = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

		foreach ( $pieces as $piece ) {
			if ( preg_match( $pattern_contents, $piece, $matches ) ) {
				$new_content .= $matches[1];
			} else {
				$new_content .= wptexturize( wpautop( $piece ) );
			}
		}

		return $new_content;
	}
}

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpfs_content_formatter', 12 );

remove_filter( 'widget_text_content', 'wpautop' );
add_filter( 'widget_text_content', 'wpfs_content_formatter', 12 );

remove_filter( 'acf_the_content', 'wpautop' );
add_filter( 'acf_the_content', 'wpfs_content_formatter', 12 );

remove_filter( 'the_content', 'wptexturize' );
