<?php
/**
 * The template for displaying the footer.
 *
 * @package wp_foundation_six
 */
?>

	<?php dev_helper( pathinfo(__FILE__, PATHINFO_FILENAME) ); ?>

	<?php wp_footer(); ?>
	
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri() ?>/js/rem-min.js"></script>
	<![endif]-->

</body>

</html>