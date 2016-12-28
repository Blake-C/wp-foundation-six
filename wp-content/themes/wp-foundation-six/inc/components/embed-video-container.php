<?php

/**
 *
 * Add responsive container to embeds
 *
 * @package wp_foundation_six
 */
if ( !function_exists('wp_foundation_six_embed_video_html') ){
	function wp_foundation_six_embed_video_html( $html ) {
	    return '<div class="responsive-embed">' . $html . '</div>';
	}
}
add_filter( 'embed_oembed_html', 'wp_foundation_six_embed_video_html', 10, 3 );
add_filter( 'video_embed_html', 'wp_foundation_six_embed_video_html' ); // Jetpack
