<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wp_foundation_six
 */


/**
 * Classes
 *
 * Ex:
 * require get_template_directory() . '/inc/classes/name-of-class-file.php';
 */


/**
 * Components
 */
require get_template_directory() . '/inc/components/body-classes.php';
require get_template_directory() . '/inc/components/embed-video-container.php';
require get_template_directory() . '/inc/components/excerpt-length.php';
require get_template_directory() . '/inc/components/excerpt-more.php';
require get_template_directory() . '/inc/components/gform-filters.php';
require get_template_directory() . '/inc/components/password-form.php';
require get_template_directory() . '/inc/components/post-classes.php';
require get_template_directory() . '/inc/components/thumbnail-upscale.php';


/**
 * Template Tags
 */
require get_template_directory() . '/inc/template-tags/categorized-blog.php';
require get_template_directory() . '/inc/template-tags/category-transient-flusher.php';
require get_template_directory() . '/inc/template-tags/entry-footer.php';
require get_template_directory() . '/inc/template-tags/posted-on.php';


/**
 * Customize the admin sceen
 */
require get_template_directory() . '/inc/custom-admin-functions/change-howdy-text.php';
require get_template_directory() . '/inc/custom-admin-functions/login-page-favicon.php';
require get_template_directory() . '/inc/custom-admin-functions/login-page-logo-title-tag.php';
require get_template_directory() . '/inc/custom-admin-functions/login-page-logo-url.php';
require get_template_directory() . '/inc/custom-admin-functions/login-page-styles.php';
