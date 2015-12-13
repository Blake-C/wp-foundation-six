<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wp_foundation_six
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( !function_exists('wp_foundation_six_body_classes') ){
	function wp_foundation_six_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'wp_foundation_six_body_classes' );


/**
 * Remove sticky classes from posts as that class is used by foundation to absolute position elements
 * @link https://wordpress.org/support/topic/remove-classes-from-post_class
 */
if ( !function_exists('wp_foundation_six_post_classes') ){
	function wp_foundation_six_post_classes($classes) {
		$classes = array_diff($classes, array('sticky'));
		$classes[] = 'sticky-post';

		return $classes;
	}
}
add_filter('post_class','wp_foundation_six_post_classes');


/**
 *
 * Custom Post Password Form
 *
 * @package Theme
 */
if ( !function_exists('wp_foundation_six_custom_password_form') ){
	function wp_foundation_six_custom_password_form() {
		global $post;

		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		' . __( "<p>To view this protected post, enter the password below:</p>" ) .
			'<div class="row collapse">'.
				'<div>'.
					'<label class="pass-label" for="' . $label . '">' . __( "Password:" ) . ' </label>'.
				'</div>'.
				'<div class="small-8 columns">'.
					'<input name="post_password" id="' . $label . '" type="password" />'.
				'</div>'.
				'<div class="small-4 columns">'.
					'<input type="submit" name="Submit" class="button expanded" value="' . esc_attr__( "Submit" ) . '" />'.
				'</div>'.
			'</div>'.
		'</form>';

		return $o;
	}
}
add_filter( 'the_password_form', 'wp_foundation_six_custom_password_form' );


/**
 *
 * Custom Nav Walker to add classes to sub ul items
 *
 * @package wp_foundation_six
 * @link http://stackoverflow.com/questions/5034826/wp-nav-menu-change-sub-menu-class-name
 */
if ( !class_exists('UL_Class_Walker') ) {
	class wp_foundation_six_custom_nav_class_walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= $indent . '<ul class="submenu menu">';
		}
	}
}


/**
 *
 * Custom Foundation Menu to add has-submenu class to li that has ul child
 *
 * @package wp_foundation_six
 */
if ( !function_exists('wp_foundation_six_topbar_nav_dropdown') ) {
	function wp_foundation_six_topbar_nav_dropdown($sorted_menu_items, $args) {
		$last_top = 0;

		foreach ($sorted_menu_items as $key => $obj) {
			// it is a top lv item?
			if (0 == $obj->menu_item_parent) {
				// set the key of the parent
				$last_top = $key;
			} else {
				$sorted_menu_items[ $last_top ]->classes['dropdown'] = 'has-submenu';
			}
		}

		return $sorted_menu_items;
	}
}
add_filter('wp_nav_menu_objects', 'wp_foundation_six_topbar_nav_dropdown', 10, 2);


/**
 *
 * Add responsive container to embeds
 *
 * @package wp_foundation_six
 */
if ( !function_exists('wp_foundation_six_embed_video_html') ){
	function wp_foundation_six_embed_video_html( $html ) {
	    return '<div class="flex-video">' . $html . '</div>';
	}
}
add_filter( 'embed_oembed_html', 'wp_foundation_six_embed_video_html', 10, 3 );
add_filter( 'video_embed_html', 'wp_foundation_six_embed_video_html' ); // Jetpack


/**
 *
 * Function similar to wp_link_pages but outputs an ordered list instead and adds a class of current to the current page
 *
 * @package wp_foundation_six
 */
if ( !function_exists('wp_foundation_six_custom_link_pages') ){
	function wp_foundation_six_custom_link_pages( $args = '' ) {
		$defaults = array(
			'before'           => '<p>' . __( 'Pages:' ), 'after' => '</p>',
			'link_before'      => '', 'link_after' => '',
			'next_or_number'   => 'number', 'nextpagelink' => __( 'Next page' ),
			'previouspagelink' => __( 'Previous page' ), 'pagelink' => '%',
			'echo'             => 1
		);

		$r = wp_parse_args( $args, $defaults );
		$r = apply_filters( 'wp_link_pages_args', $r );
		extract( $r, EXTR_SKIP );

		global $page, $numpages, $multipage, $more, $pagenow;

		$output = '';
		if ( $multipage ) {
			if ( 'number' == $next_or_number ) {
				$output .= $before;
				$output .= '<ul class="pagination">';
				for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
					$j = str_replace( '%', $i, $pagelink );
					if ( ( $i == $page )) {
						$output .= '<li class="current"><a href="#">';
					} else {
						$output .= '<li>';
					}
					if ( ( $i != $page ) || ( ( ! $more ) && ( $page == 1 ) ) ) {
						$output .= _wp_link_page( $i );
					}
					$output .= $link_before . $j . $link_after;
					if ( ( $i != $page ) || ( ( ! $more ) && ( $page == 1 ) ) )
						$output .= '</a>';
				}
				$output .= '</li>';
				$output .= $after;
			} else {
				if ( $more ) {
					$output .= $before;
					$i = $page - 1;
					if ( $i && $more ) {
						$output .= _wp_link_page( $i );
						$output .= $link_before . $previouspagelink . $link_after . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$output .= _wp_link_page( $i );
						$output .= $link_before . $nextpagelink . $link_after . '</a>';
					}
					$output .= '</ul>';
					$output .= $after;
				}
			}
		}

		if ( $echo )
			echo $output;

		return $output;
	}
}
