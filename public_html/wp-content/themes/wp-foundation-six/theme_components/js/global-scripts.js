import $ from 'jquery'
import 'jquery-migrate'
import './modules/_skip-link-focus-fix'
import './modules/_foundation-scripts'
import { browser } from './modules/_browser-version'

/**
 * Notes:
 *
 * Although jQuery is imported above, it is not bundled
 * with the transpiled assets. jQuery needs to be global
 * on the website.
 *
 * All imports belong at the top of the file.
 *
 * Webpack only outputs this one script file, if you need
 * another file then add it to the scripts-list.js file as
 * another line in the scripts_list object.
 *
 * The scripts_list const is imported into the webpack
 * config. I've done this so that you do not have to
 * wade through the config to find what is being
 * compiled out as its own file.
 *
 * When importing node modules that are not ES6 modules,
 * you do not need to path them as '../../node_modules/'.
 * Gulp knows about the node_modules directory, so all you need
 * to do is path them as if you were already in the node_modules
 * directory
 *
 * Instead of:
 * import '../../node_modules/jquery-migrate/dist/jquery-migrate';
 *
 * Use:
 * import 'jquery-migrate/dist/jquery-migrate';
 *
 */

$('html').removeClass('no-js')
$('html').addClass('js')

// Give IE user an unoptimized experience.
if (browser.name === 'ie') {
	var script = document.createElement('script')
	script.src = '/wp-content/themes/wp-foundation-six/assets/js/bundle.ie-scripts.js'
	document.getElementsByTagName('head')[0].appendChild(script)
}

/*************** Template part region toggle button ***************/
$('#theme_debug_regions').on('click', function (event) {
	event.preventDefault()

	$('.placeHolderPosition').slideToggle()
})
