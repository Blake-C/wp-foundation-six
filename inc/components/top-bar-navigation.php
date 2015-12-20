<?php

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
