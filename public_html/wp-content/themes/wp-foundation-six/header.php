<?php
/**
 * The header for our theme.
 *
 * @package wp_foundation_six
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php
		/**
		 * Use to prefech dns
		 * https://developer.mozilla.org/en-US/docs/Web/HTTP/Controlling_DNS_prefetching
		 *
		 * Ex:
		 * echo '<meta http-equiv="x-dns-prefetch-control" content="on">';
		 * echo '<link rel="dns-prefetch" href="//use.typekit.net">';
		 * echo '<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">';
		 */
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon.ico">
	<meta name="msapplication-TileColor" content="#232c97">
	<meta name="msapplication-config" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<!-- App Title -->
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link show-for-sr" href="#content"><?php echo esc_html_x( 'Skip to content', 'Link to jump to div with main content', 'wp_foundation_six' ); ?></a>

	<!--[if lt IE 9]><p class=chromeframe>Your browser is <em>not</em> supported. <a href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site.</p><![endif]-->

	<?php if ( is_super_admin() && WPFS_INLINE_DEBUG ) : ?>
		<a href="#" id="theme_debug_regions"><?php echo esc_html_x( 'Show Regions', 'Link to display inline debug for theme files', 'wp_foundation_six' ); ?></a>
	<?php endif; ?>


	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>


	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<div class="row columns" id="main_menu">
			<?php
				$wpfs_blog_name = get_bloginfo( 'name' ) ? '<li class="menu-text">' . get_bloginfo( 'name' ) . '</li>' : '';

				/**
				 * Custom menu
				 *
				 * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
				*/
				$wpfs_menu_args = array(
					'theme_location'  => 'primary',
					'menu'            => '',
					'container'       => 'false',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'main-menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">' . $wpfs_blog_name . '%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				);

				wp_nav_menu( $wpfs_menu_args );
			?>
		</div>
	<?php endif; ?>
