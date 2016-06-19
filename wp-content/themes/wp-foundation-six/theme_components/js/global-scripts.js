/* eslint-disable */
	//=include ../../bower_components/jquery-migrate/jquery-migrate.js
	//=include ./partials/_skip-link-focus-fix.js
/* eslint-enable */

(function($){
	$( document ).ready(function() {
		/* SVG image replacement */
		if(!Modernizr.svg) {
			$('img[src*="svg"]').attr('src', function() {
				return $(this).attr('src').replace('.svg', '.png');
			});
		}

		/* Template part region toggle button */
		$('.regions').click(function(event){
			event.preventDefault();

			$('.placeHolderPosition').slideToggle();
		});

		/* Flex Video */
		$('iframe[src*="player.vimeo.com"],[src*="www.youtube.com"],object[id="flashObj"]').each(function() {
			if (!$(this).parent().hasClass('flex-video')) {
				$(this).wrap("<div class='flex-video widescreen'/>");
			}
		});

		$('#main_menu').fadeIn();

		$(document).foundation();

	});
})(jQuery);
