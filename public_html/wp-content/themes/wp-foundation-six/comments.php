<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_foundation_six
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php wp_foundation_six_dev_helper( pathinfo( __FILE__, PATHINFO_FILENAME ) ); ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$wpfs_comments_number = get_comments_number();

			if ( 1 === $wpfs_comments_number ) {
				printf(
					/* translators: %s: post title */
					esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'wp_foundation_six' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf( // phpcs:ignore
					esc_html(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$wpfs_comments_number,
							'comments title',
							'wp_foundation_six'
						)
					),
					esc_html( number_format_i18n( $wpfs_comments_number ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<!-- Are there comments to navigate through? -->
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="show-for-sr"><?php echo esc_html_x( 'Comment navigation', 'Screen reader comments navigation title', 'wp_foundation_six' ); ?></h2>

				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( 'Older Comments' ); ?></div>
					<div class="nav-next"><?php next_comments_link( 'Newer Comments' ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
		<?php endif; ?>
		<!-- Check for comment navigation. -->

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<!-- Are there comments to navigate through? -->
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="show-for-sr"><?php echo esc_html_x( 'Comment navigation', 'Screen reader comments navigation title', 'wp_foundation_six' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( 'Older Comments' ); ?></div>
					<div class="nav-next"><?php next_comments_link( 'Newer Comments' ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php endif; ?>
		<!-- Check for comment navigation. -->

	<?php endif; ?>
	<!-- Check for have_comments(). -->

	<!-- If comments are closed and there are comments -->
	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php echo esc_html_x( 'Comments are closed.', 'Comment are closed warning', 'wp_foundation_six' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
