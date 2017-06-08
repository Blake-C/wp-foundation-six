import $ from 'jquery';
import Modernizr from 'modernizr';
import 'jquery-migrate/dist/jquery-migrate';
import './modules/_skip-link-focus-fix';
import './modules/_foundation-scripts';

/**
 * Notes:
 *
 * Although jQuery is imported above, it is not bundulded
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
 * wade through the consfig to find what is being
 * compiled out as its own file.
 *
 * Also if you create another js file keep your scripts
 * within an immediately invoked function expression.
 * This will prevent other plugins or your own chunks
 * of code from conflicting with eachother. More info
 * can be found here:
 *
 * @link: http://benalman.com/news/2010/11/immediately-invoked-function-expression/
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
