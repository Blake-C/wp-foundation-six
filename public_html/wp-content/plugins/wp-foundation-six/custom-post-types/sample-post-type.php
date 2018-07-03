<?php
/**
 * Set up custom post types for project here.
 *
 * Replace any sample text and filenames with appropriate names that best fit
 * your project.
 *
 * @package wp_foundation_six
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resources
 *
 * @link https://www.smashingmagazine.com/2012/01/create-custom-taxonomies-wordpress/
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
*/

if ( ! function_exists( 'wp_foundation_six_custom_post_types' ) ) {
	/**
	 * Fires after WordPress has finished loading but before any headers are sent.
	 *
	 * @link: https://developer.wordpress.org/reference/hooks/init/
	 */
	function wp_foundation_six_custom_post_types() {
		$sample_post_type_labels = array(
			'name'                  => _x( 'Sample Posts', 'Sample Post General Name', 'wp_foundation_six' ),
			'singular_name'         => _x( 'Sample Post', 'Sample Post Singular Name', 'wp_foundation_six' ),
			'menu_name'             => __( 'Sample Posts', 'wp_foundation_six' ),
			'name_admin_bar'        => __( 'Sample Post', 'wp_foundation_six' ),
			'archives'              => __( 'Item Archives', 'wp_foundation_six' ),
			'attributes'            => __( 'Item Attributes', 'wp_foundation_six' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wp_foundation_six' ),
			'all_items'             => __( 'All Items', 'wp_foundation_six' ),
			'add_new_item'          => __( 'Add New Item', 'wp_foundation_six' ),
			'add_new'               => __( 'Add New', 'wp_foundation_six' ),
			'new_item'              => __( 'New Item', 'wp_foundation_six' ),
			'edit_item'             => __( 'Edit Item', 'wp_foundation_six' ),
			'update_item'           => __( 'Update Item', 'wp_foundation_six' ),
			'view_item'             => __( 'View Item', 'wp_foundation_six' ),
			'view_items'            => __( 'View Items', 'wp_foundation_six' ),
			'search_items'          => __( 'Search Item', 'wp_foundation_six' ),
			'not_found'             => __( 'Not found', 'wp_foundation_six' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wp_foundation_six' ),
			'featured_image'        => __( 'Featured Image', 'wp_foundation_six' ),
			'set_featured_image'    => __( 'Set featured image', 'wp_foundation_six' ),
			'remove_featured_image' => __( 'Remove featured image', 'wp_foundation_six' ),
			'use_featured_image'    => __( 'Use as featured image', 'wp_foundation_six' ),
			'insert_into_item'      => __( 'Insert into item', 'wp_foundation_six' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp_foundation_six' ),
			'items_list'            => __( 'Items list', 'wp_foundation_six' ),
			'items_list_navigation' => __( 'Items list navigation', 'wp_foundation_six' ),
			'filter_items_list'     => __( 'Filter items list', 'wp_foundation_six' ),
		);

		$sample_post_type_args = array(
			'label'               => __( 'Sample Post', 'wp_foundation_six' ),
			'description'         => __( 'Sample Post Description', 'wp_foundation_six' ),
			'labels'              => $sample_post_type_labels,
			'show_in_rest'        => true,
			// Features this CPT supports in Post Editor.
			'supports'            => array( 'title', 'revisions' ),
			/**
			 * A hierarchical CPT is like Pages and can have
			 * Parent and child items. A non-hierarchical CPT
			 * is like Posts.
			 */
			'hierarchical'        => false,
			// category, post_tag.
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'           => 'dashicons-admin-post',
			'rewrite'             => array(
				'slug'       => '',
				'with_front' => false,
			),
		);

		register_post_type( 'sample_post', $sample_post_type_args );
	}
}
add_action( 'init', 'wp_foundation_six_custom_post_types', 0 );
