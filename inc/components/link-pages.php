<?php

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
