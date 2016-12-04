import '../../../node_modules/foundation-sites/js/foundation.core.js';
import '../../../node_modules/foundation-sites/js/foundation.util.mediaQuery.js';
import '../../../node_modules/foundation-sites/js/foundation.responsiveToggle.js';

/**
 * Notes:
 *
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

(function($){
	$(document).foundation();

	// Display menu once scripts have loaded
	$('#main_menu').fadeIn();
})(jQuery);
