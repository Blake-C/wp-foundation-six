import '../../../node_modules/foundation-sites/js/foundation.core.js';
import '../../../node_modules/foundation-sites/js/foundation.util.mediaQuery.js';
// import '../../../node_modules/foundation-sites/js/foundation.abide.js';
// import '../../../node_modules/foundation-sites/js/foundation.accordion.js';
// import '../../../node_modules/foundation-sites/js/foundation.accordionMenu.js';
// import '../../../node_modules/foundation-sites/js/foundation.drilldown.js';
// import '../../../node_modules/foundation-sites/js/foundation.dropdown.js';
// import '../../../node_modules/foundation-sites/js/foundation.dropdownMenu.js';
// import '../../../node_modules/foundation-sites/js/foundation.equalizer.js';
// import '../../../node_modules/foundation-sites/js/foundation.interchange.js';
// import '../../../node_modules/foundation-sites/js/foundation.magellan.js';
// import '../../../node_modules/foundation-sites/js/foundation.offcanvas.js';
// import '../../../node_modules/foundation-sites/js/foundation.orbit.js';
// import '../../../node_modules/foundation-sites/js/foundation.responsiveMenu.js';
import '../../../node_modules/foundation-sites/js/foundation.responsiveToggle.js';
// import '../../../node_modules/foundation-sites/js/foundation.reveal.js';
// import '../../../node_modules/foundation-sites/js/foundation.slider.js';
// import '../../../node_modules/foundation-sites/js/foundation.sticky.js';
// import '../../../node_modules/foundation-sites/js/foundation.tabs.js';
// import '../../../node_modules/foundation-sites/js/foundation.toggler.js';
// import '../../../node_modules/foundation-sites/js/foundation.tooltip.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.box.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.keyboard.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.motion.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.nest.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.timerAndImageLoader.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.touch.js';
// import '../../../node_modules/foundation-sites/js/foundation.util.triggers.js';

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
