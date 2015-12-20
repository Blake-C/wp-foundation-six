<?php

/**
 * Remove query strings from the end of files
 * Helps with caching
 *
 * Comment this function out if you need the cache busting of query string versions
 * However a butter way to cache bust is to change the name of the file
 *
 * @link http://www.sharepointjohn.com/technology/sharepoint/wordpress-remove-version-query-strings-from-javascript-js-and-css-stylesheet-files/
*/
if ( !function_exists( 'wp_foundation_six_remove_query_strings' ) ) {
	function wp_foundation_six_remove_query_strings( $src ){
		$parts = explode( '?', $src );
		return $parts[0];
	}
}
add_filter( 'script_loader_src', 'wp_foundation_six_remove_query_strings', 15, 1 );
add_filter( 'style_loader_src', 'wp_foundation_six_remove_query_strings', 15, 1 );
