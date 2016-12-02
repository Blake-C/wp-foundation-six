import '../../bower_components/jquery-migrate/jquery-migrate.js';
import './modules/_skip-link-focus-fix.js';

/*************** Foundation Scripts ***************/
/**
 * Read the foundation docs on what to include for different
 * foundation components
 *
 * @link http://foundation.zurb.com/sites/docs/javascript.html
 *
 * If you need a components for a single page then create another JS file,
 * inlude it within the scripts-list.js file and import the needed assets.
 * Then use the wp_enqueue_script to inlude it on the page you need through
 * the functions.php file.
 *
 * Also, consider code splitting for keeping the initial size of the JS
 * loaded on the page down:
 *
 * @link https://webpack.github.io/docs/code-splitting.html
 */
import '../../node_modules/foundation-sites/js/foundation.core.js';
import '../../node_modules/foundation-sites/js/foundation.util.mediaQuery.js';
import '../../node_modules/foundation-sites/js/foundation.responsiveToggle.js';

(function($){
	$(document).foundation();

	// Display menu once scripts have loaded
	$('#main_menu').fadeIn();
})(jQuery);

/*************** Other Global Scripts ***************/
(function($){
	$( document ).ready(function() {
		/*************** SVG image replacement ***************/
		if(!Modernizr.svg) {
			$('img[src*="svg"]').attr('src', function() {
				return $(this).attr('src').replace('.svg', '.png');
			});
		}

		/*************** Template part region toggle button ***************/
		$('.regions').click(function(event){
			event.preventDefault();

			$('.placeHolderPosition').slideToggle();
		});

		/*************** Flex Video ***************/
		$('iframe[src*="player.vimeo.com"],[src*="www.youtube.com"],object[id="flashObj"]').each(function() {
			if (!$(this).parent().hasClass('flex-video')) {
				$(this).wrap('<div class="flex-video widescreen"/>');
			}
		});
	});
})(jQuery);
