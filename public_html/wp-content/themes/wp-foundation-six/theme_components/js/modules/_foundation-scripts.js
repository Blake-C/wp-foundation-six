import $ from 'jquery'
import { browser } from './_browser-version'

// Uncomment a module to load it
// import { Abide } from 'foundation-sites/js/foundation.abide'
// import { AccordionMenu } from 'foundation-sites/js/foundation.accordionMenu'
// import { Drilldown } from 'foundation-sites/js/foundation.drilldown'
// import { Dropdown } from 'foundation-sites/js/foundation.dropdown'
// import { DropdownMenu } from 'foundation-sites/js/foundation.dropdownMenu'
// import { Equalizer } from 'foundation-sites/js/foundation.equalizer'
// import { Interchange } from 'foundation-sites/js/foundation.interchange'
// import { Magellan } from 'foundation-sites/js/foundation.magellan'
// import { OffCanvas } from 'foundation-sites/js/foundation.offcanvas'
// import { Orbit } from 'foundation-sites/js/foundation.orbit'
// import { ResponsiveMenu } from 'foundation-sites/js/foundation.responsiveMenu'
// import { ResponsiveToggle } from 'foundation-sites/js/foundation.responsiveToggle'
// import { Reveal } from 'foundation-sites/js/foundation.reveal'
// import { Slider } from 'foundation-sites/js/foundation.slider'
// import { SmoothScroll } from 'foundation-sites/js/foundation.smoothScroll'
// import { Sticky } from 'foundation-sites/js/foundation.sticky'
// import { Toggler } from 'foundation-sites/js/foundation.toggler'
// import { Tooltip } from 'foundation-sites/js/foundation.tooltip'

async function get_accordion() {
	const Foundation = await import(/* webpackChunkName: "foundation" */ 'foundation-sites/js/foundation.core')
	const Accordion = await import(/* webpackChunkName: "accordion" */ 'foundation-sites/js/foundation.accordion')

	Foundation.Foundation.addToJquery($)
	Foundation.Foundation.plugin(Accordion.Accordion, 'Accordion')
	$(document).foundation()
}

if ($('[data-accordion]').length && browser.name !== 'ie') {
	get_accordion()
}

async function get_tabs() {
	const Foundation = await import(/* webpackChunkName: "foundation" */ 'foundation-sites/js/foundation.core')
	const Tabs = await import(/* webpackChunkName: "tabs" */ 'foundation-sites/js/foundation.tabs')

	Foundation.Foundation.addToJquery($)
	Foundation.Foundation.plugin(Tabs.Tabs, 'Tabs')
	$(document).foundation()
}

if ($('.tabs').length && browser.name !== 'ie') {
	get_tabs()
}

async function get_responsive_accordion_tabs() {
	const Foundation = await import(/* webpackChunkName: "foundation" */ 'foundation-sites/js/foundation.core')
	const AccordionTabs = await import(
		/* webpackChunkName: "accordion-tabs" */ 'foundation-sites/js/foundation.responsiveAccordionTabs'
	)

	Foundation.Foundation.addToJquery($)
	Foundation.Foundation.plugin(AccordionTabs.ResponsiveAccordionTabs, 'ResponsiveAccordionTabs')
	$(document).foundation()
}

if ($('[data-responsive-accordion-tabs]').length && browser.name !== 'ie') {
	get_responsive_accordion_tabs()
}
