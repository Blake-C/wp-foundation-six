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

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/manifest.json">
	<link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/browserconfig.xml">
	<meta name="theme-color" content="#1c2185">

	<!-- App Title -->
	<meta name="apple-mobile-web-app-title" content="<?php echo esc_attr( get_bloginfo( 'name' ), 'wp_foundation_six' ); ?>">
	<meta name="application-name" content="<?php echo esc_attr( get_bloginfo( 'name' ), 'wp_foundation_six' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link show-for-sr" href="#content"><?php echo esc_html_x( 'Skip to content', 'Link to jump to div with main content', 'wp_foundation_six' ); ?></a>

	<?php if ( get_bloginfo( 'name' ) ) : ?>
		<h1 class="show-for-sr"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
	<?php endif; ?>

	<?php if ( is_front_page() ) : ?>
		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<p class="show-for-sr"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<!--[if lt IE 9]><p class=chromeframe>Your browser is <em>not</em> supported. <a href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site.</p><![endif]-->

	<?php if ( is_super_admin() && INLINE_DEBUG ) : ?>
		<a href="#" class="regions"><?php echo esc_html_x( 'Show Regions', 'Link to display inline debug for theme files', 'wp_foundation_six' ); ?></a>
	<?php endif; ?>


	<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>


	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<div class="row columns" id="main_menu">
			<?php
				$blog_name = get_bloginfo( 'name' ) ? '<li class="menu-text">' . esc_html( get_bloginfo( 'name' ) ) . '</li>' : '';

				/**
				 * Custom menu
				 *
				 * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
				*/
				$menu_args = array(
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
					'items_wrap'      => '<ul id="%1$s" class="%2$s">' . $blog_name . '%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				);

				wp_nav_menu( $menu_args );
			?>
		</div>
	<?php endif; ?>
