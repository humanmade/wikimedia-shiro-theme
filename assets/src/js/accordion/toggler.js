/**
 * Accordion Item open/close Triggers
 */

/**
 * Toggle an accordion item open or closed.
 *
 * @param {Event} e Click event.
 */
const toggleAccordionItem = e => {
	e.preventDefault();

	closeAllItems(); // closes any opened item.

	const parent = e.target.closest( '.accordion-item' );

	if ( parent.getAttribute( 'aria-expanded' ) === 'true' ) {
		closeItem( parent );
	} else {
		openItem( parent );
	}
};

/**
 * Closes all opened items.
 *
 * @param {Event} e Click event.
 */
const closeAllItems = e => {
	const accordionItems = document.querySelectorAll( '.accordion-item' );

	accordionItems.forEach(
		accordionItem => {
			accordionItem.setAttribute( 'aria-expanded', false );
		}
	);
};

/**
 * Open an accordion item.
 *
 * @param {Element} item Item wrapper element.
 */
const openItem = item => {
	item.setAttribute( 'aria-expanded', true );

	// Find all of our elements and their base scroll height.
	const content = item.querySelector( '.accordion-item__content' );

	item.querySelector( '.accordion-item__content' ).style.height = content.scrollHeight + 'px';
};

/**
 * Close an accordion item.
 *
 * @param {Element} item Item wrapper element.
 */
const closeItem = item => {
	const content = item.querySelector( '.accordion-item__content' );
	content.style.height = 0;

	item.setAttribute( 'aria-expanded', false );
};

/**
 * Add click handlers to accordion item titles.
 *
 * @param {Element} item The concerned element.
 */
const addHandlers = item => {
	const button = item.querySelector( '.accordion-item__title' );

	button.addEventListener( 'click', toggleAccordionItem );
};

/**
 * Initialize Accordion functionality.
 *
 * @returns {void}
 */
const init = () => {
	document.querySelectorAll( '.accordion-wrapper' ).forEach( el => {
		// Hook in click events to each item.
		el.querySelectorAll( '.accordion-item' ).forEach( item => addHandlers( item ) );
	} );
};

document.addEventListener( 'DOMContentLoaded', init );
