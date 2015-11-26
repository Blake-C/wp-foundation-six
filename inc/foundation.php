<?php

/* Foundation Core */
wp_register_script( 'foundation-core', get_template_directory_uri() . '/js/foundation/foundation.core-min.js', array('jquery'), '21112015', true);

/* Foundation 6 Component Registration */
wp_register_script( 'foundation-abide', get_template_directory_uri() . '/js/foundation/foundation.abide-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-accordion', get_template_directory_uri() . '/js/foundation/foundation.accordion-min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion'), '21112015', true);
wp_register_script( 'foundation-accordionMenu', get_template_directory_uri() . '/js/foundation/foundation.accordionMenu-min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-nest'), '21112015', true);
wp_register_script( 'foundation-drilldown', get_template_directory_uri() . '/js/foundation/foundation.drilldown-min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-nest'), '21112015', true);
wp_register_script( 'foundation-dropdown', get_template_directory_uri() . '/js/foundation/foundation.dropdown-min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-box', 'foundation-util-triggers'), '21112015', true);
wp_register_script( 'foundation-dropdownMenu', get_template_directory_uri() . '/js/foundation/foundation.dropdownMenu-min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-motion', 'foundation-util-box', 'foundation-util-nest'), '21112015', true);
wp_register_script( 'foundation-equalizer', get_template_directory_uri() . '/js/foundation/foundation.equalizer-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-interchange', get_template_directory_uri() . '/js/foundation/foundation.interchange-min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-timerAndImageLoader'), '21112015', true);
wp_register_script( 'foundation-magellan', get_template_directory_uri() . '/js/foundation/foundation.magellan-min.js', array('foundation-core', 'jquery', 'foundation-util-motion'), '21112015', true);
wp_register_script( 'foundation-offcanvas', get_template_directory_uri() . '/js/foundation/foundation.offcanvas-min.js', array('foundation-core', 'jquery', 'foundation-util-motion', 'foundation-util-triggers'), '21112015', true);
wp_register_script( 'foundation-orbit', get_template_directory_uri() . '/js/foundation/foundation.orbit-min.js', array('foundation-core', 'jquery', 'foundation-util-motion', 'foundation-util-timerAndImageLoader', 'foundation-util-keyboard', 'foundation-util-touch'), '21112015', true);
wp_register_script( 'foundation-responsiveMenu', get_template_directory_uri() . '/js/foundation/foundation.responsiveMenu-min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-mediaQuery', 'foundation-accordionMenu', 'foundation-drilldown', 'foundation-dropdownMenu', 'foundation-util-nest'), '21112015', true);
wp_register_script( 'foundation-responsiveToggle', get_template_directory_uri() . '/js/foundation/foundation.responsiveToggle-min.js', array('foundation-core', 'jquery', 'foundation-util-mediaQuery'), '21112015', true);
wp_register_script( 'foundation-reveal', get_template_directory_uri() . '/js/foundation/foundation.reveal-min.js', array('foundation-core', 'jquery', 'foundation-util-box', 'foundation-util-motion', 'foundation-util-triggers', 'foundation-util-mediaQuery'), '21112015', true);
wp_register_script( 'foundation-slider', get_template_directory_uri() . '/js/foundation/foundation.slider-min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-motion', 'foundation-util-keyboard', 'foundation-util-touch'), '21112015', true);
wp_register_script( 'foundation-sticky', get_template_directory_uri() . '/js/foundation/foundation.sticky-min.js', array('foundation-core', 'jquery', 'foundation-util-triggers', 'foundation-util-mediaQuery'), '21112015', true);
wp_register_script( 'foundation-tabs', get_template_directory_uri() . '/js/foundation/foundation.tabs-min.js', array('foundation-core', 'jquery', 'foundation-util-keyboard', 'foundation-util-timerAndImageLoader'), '21112015', true);
wp_register_script( 'foundation-toggler', get_template_directory_uri() . '/js/foundation/foundation.toggler-min.js', array('foundation-core', 'jquery', 'foundation-util-motion'), '21112015', true);
wp_register_script( 'foundation-tooltip', get_template_directory_uri() . '/js/foundation/foundation.tooltip-min.js', array('foundation-core', 'jquery', 'foundation-util-box', 'foundation-util-triggers', 'foundation-util-mediaQuery', 'foundation-util-motion'), '21112015', true);

/* Foundation 6 Utilities */
wp_register_script( 'foundation-util-box', get_template_directory_uri() . '/js/foundation/foundation.util.box-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-keyboard', get_template_directory_uri() . '/js/foundation/foundation.util.keyboard-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-mediaQuery', get_template_directory_uri() . '/js/foundation/foundation.util.mediaQuery-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-motion', get_template_directory_uri() . '/js/foundation/foundation.util.motion-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-nest', get_template_directory_uri() . '/js/foundation/foundation.util.nest-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-timerAndImageLoader', get_template_directory_uri() . '/js/foundation/foundation.util.timerAndImageLoader-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-touch', get_template_directory_uri() . '/js/foundation/foundation.util.touch-min.js', array('foundation-core', 'jquery'), '21112015', true);
wp_register_script( 'foundation-util-triggers', get_template_directory_uri() . '/js/foundation/foundation.util.triggers-min.js', array('foundation-core', 'jquery'), '21112015', true);

/* Uncomment assets needed */
wp_enqueue_script('foundation-abide');
wp_enqueue_script('foundation-accordion');
wp_enqueue_script('foundation-accordionMenu');
wp_enqueue_script('foundation-drilldown');
wp_enqueue_script('foundation-dropdown');
wp_enqueue_script('foundation-dropdownMenu');
wp_enqueue_script('foundation-equalizer');
wp_enqueue_script('foundation-interchange');
wp_enqueue_script('foundation-magellan');
wp_enqueue_script('foundation-offcanvas');
wp_enqueue_script('foundation-orbit');
wp_enqueue_script('foundation-responsiveMenu');
wp_enqueue_script('foundation-responsiveToggle');
wp_enqueue_script('foundation-reveal');
wp_enqueue_script('foundation-slider');
wp_enqueue_script('foundation-sticky');
wp_enqueue_script('foundation-tabs');
wp_enqueue_script('foundation-toggler');
wp_enqueue_script('foundation-tooltip');