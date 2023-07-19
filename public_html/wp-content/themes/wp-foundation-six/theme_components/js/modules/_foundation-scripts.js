import $ from 'jquery'
import { browser } from './_browser-version.js'

// Uncomment a module to load it
// import { Abide } from 'foundation-sites/js/foundation.abide.js'
// import { AccordionMenu } from 'foundation-sites/js/foundation.accordionMenu.js'
// import { Drilldown } from 'foundation-sites/js/foundation.drilldown.js'
// import { Dropdown } from 'foundation-sites/js/foundation.dropdown.js'
// import { DropdownMenu } from 'foundation-sites/js/foundation.dropdownMenu.js'
// import { Equalizer } from 'foundation-sites/js/foundation.equalizer.js'
// import { Interchange } from 'foundation-sites/js/foundation.interchange.js'
// import { Magellan } from 'foundation-sites/js/foundation.magellan.js'
// import { OffCanvas } from 'foundation-sites/js/foundation.offcanvas.js'
// import { Orbit } from 'foundation-sites/js/foundation.orbit.js'
// import { ResponsiveMenu } from 'foundation-sites/js/foundation.responsiveMenu.js'
// import { ResponsiveToggle } from 'foundation-sites/js/foundation.responsiveToggle.js'
// import { Reveal } from 'foundation-sites/js/foundation.reveal.js'
// import { Slider } from 'foundation-sites/js/foundation.slider.js'
// import { SmoothScroll } from 'foundation-sites/js/foundation.smoothScroll.js'
// import { Sticky } from 'foundation-sites/js/foundation.sticky.js'
// import { Toggler } from 'foundation-sites/js/foundation.toggler.js'
// import { Tooltip } from 'foundation-sites/js/foundation.tooltip.js'

async function get_accordion() {
	const Foundation = await import(/* webpackChunkName: "foundation" */ 'foundation-sites/js/foundation.core.js')
	const Accordion = await import(/* webpackChunkName: "accordion" */ 'foundation-sites/js/foundation.accordion.js')

	Foundation.Foundation.addToJquery($)
	Foundation.Foundation.plugin(Accordion.Accordion, 'Accordion')
	$(document).foundation()
}

if ($('[data-accordion]').length && browser.name !== 'ie') {
	get_accordion()
}

async function get_tabs() {
	const Foundation = await import(/* webpackChunkName: "foundation" */ 'foundation-sites/js/foundation.core.js')
	const Tabs = await import(/* webpackChunkName: "tabs" */ 'foundation-sites/js/foundation.tabs.js')

	Foundation.Foundation.addToJquery($)
	Foundation.Foundation.plugin(Tabs.Tabs, 'Tabs')
	$(document).foundation()
}

if ($('.tabs').length && browser.name !== 'ie') {
	get_tabs()
}

async function get_responsive_accordion_tabs() {
	const Foundation = await import(/* webpackChunkName: "foundation" */ 'foundation-sites/js/foundation.core.js')
	const AccordionTabs = await import(
		/* webpackChunkName: "accordion-tabs" */ 'foundation-sites/js/foundation.responsiveAccordionTabs.js'
	)

	Foundation.Foundation.addToJquery($)
	Foundation.Foundation.plugin(AccordionTabs.ResponsiveAccordionTabs, 'ResponsiveAccordionTabs')
	$(document).foundation()
}

if ($('[data-responsive-accordion-tabs]').length && browser.name !== 'ie') {
	get_responsive_accordion_tabs()
}
