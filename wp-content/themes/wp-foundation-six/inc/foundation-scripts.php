<?php

/* Foundation Core */
wp_register_script( 'foundation-core', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.core.min.js', array('jquery'), null, true);

/* Foundation 6 Component Registration */
wp_register_script( 'foundation-abide', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.abide.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-accordion', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.accordion.min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-mediaQuery'), null, true);
wp_register_script( 'foundation-accordionMenu', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.accordionMenu.min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-nest'), null, true);
wp_register_script( 'foundation-drilldown', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.drilldown.min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-nest'), null, true);
wp_register_script( 'foundation-dropdown', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.dropdown.min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-box', 'foundation-util-triggers'), null, true);
wp_register_script( 'foundation-dropdownMenu', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.dropdownMenu.min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-box', 'foundation-util-nest', 'foundation-util-mediaQuery'), null, true);
wp_register_script( 'foundation-equalizer', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.equalizer.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-interchange', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.interchange.min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-timerAndImageLoader'), null, true);
wp_register_script( 'foundation-magellan', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.magellan.min.js', array('foundation-core', 'jquery', 'foundation-util-motion'), null, true);
wp_register_script( 'foundation-offcanvas', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.offcanvas.min.js', array('foundation-core', 'jquery', 'foundation-util-motion', 'foundation-util-triggers'), null, true);
wp_register_script( 'foundation-orbit', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.orbit.min.js', array('foundation-core', 'jquery', 'foundation-util-motion', 'foundation-util-timerAndImageLoader', 'foundation-util-keyboard', 'foundation-util-touch'), null, true);
wp_register_script( 'foundation-responsiveMenu', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.responsiveMenu.min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-mediaQuery', 'foundation-accordionMenu', 'foundation-drilldown', 'foundation-dropdownMenu', 'foundation-util-nest'), null, true);
wp_register_script( 'foundation-responsiveToggle', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.responsiveToggle.min.js', array('foundation-core', 'jquery', 'foundation-util-mediaQuery'), null, true);
wp_register_script( 'foundation-reveal', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.reveal.min.js', array('foundation-core', 'jquery', 'foundation-util-box', 'foundation-util-motion', 'foundation-util-triggers', 'foundation-util-mediaQuery'), null, true);
wp_register_script( 'foundation-slider', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.slider.min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-motion', 'foundation-util-keyboard', 'foundation-util-touch'), null, true);
wp_register_script( 'foundation-sticky', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.sticky.min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-mediaQuery'), null, true);
wp_register_script( 'foundation-tabs', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.tabs.min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-timerAndImageLoader'), null, true);
wp_register_script( 'foundation-toggler', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.toggler.min.js', array('foundation-core', 'jquery', 'foundation-util-motion'), null, true);
wp_register_script( 'foundation-tooltip', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.tooltip.min.js', array('foundation-core', 'jquery', 'foundation-util-box', 'foundation-util-triggers', 'foundation-util-mediaQuery', 'foundation-util-motion'), null, true);

/* Foundation 6 Utilities */
wp_register_script( 'foundation-util-box', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.box.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-keyboard', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.keyboard.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-mediaQuery', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.mediaQuery.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-motion', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.motion.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-nest', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.nest.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-timerAndImageLoader', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.timerAndImageLoader.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-touch', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.touch.min.js', array('foundation-core', 'jquery'), null, true);
wp_register_script( 'foundation-util-triggers', get_template_directory_uri() . '/assets/js/vendors/foundation/foundation.util.triggers.min.js', array('foundation-core', 'jquery'), null, true);

/**
 * Copy the assets wp_enqueue_script into your template if the assets are needed.
 *
 * Alterntivly you can import the files into a single js file and use gulp to
 * create a single HTTP request rather than the 4+ HTTP request needed for the
 * wp_enqueue_script method.
 */
// wp_enqueue_script('foundation-abide');
// wp_enqueue_script('foundation-accordion');
// wp_enqueue_script('foundation-accordionMenu');
// wp_enqueue_script('foundation-drilldown');
// wp_enqueue_script('foundation-dropdown');
// wp_enqueue_script('foundation-dropdownMenu');
// wp_enqueue_script('foundation-equalizer');
// wp_enqueue_script('foundation-interchange');
// wp_enqueue_script('foundation-magellan');
// wp_enqueue_script('foundation-offcanvas');
// wp_enqueue_script('foundation-orbit');
// wp_enqueue_script('foundation-responsiveMenu');
wp_enqueue_script('foundation-responsiveToggle');
// wp_enqueue_script('foundation-reveal');
// wp_enqueue_script('foundation-slider');
// wp_enqueue_script('foundation-sticky');
// wp_enqueue_script('foundation-tabs');
// wp_enqueue_script('foundation-toggler');
// wp_enqueue_script('foundation-tooltip');
