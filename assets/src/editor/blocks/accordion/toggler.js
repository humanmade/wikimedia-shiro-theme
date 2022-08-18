/**
 * Accordion Item open/close Triggers
 */

/**
 * Find an ancestor element with a particular class.
 *
 * @param {Element} element Element to start search at.
 * @param {string} selector Class name to search for.
 * @returns {*} Ancestor element.
 */
 const findAncestor = ( element, selector ) => {
	// eslint-disable-next-line no-cond-assign
	while ( ( element = element.parentElement ) && ! element.classList.contains( selector ) );

	return element;
};

/**
 * Toggle an accordion item open or closed.
 *
 * @param {Event} e Click event.
 */
const toggleAccordionItem = e => {
	e.preventDefault();

	const button = e.target || e.srcElement;
	const parent = findAncestor( button, 'accordion-item' );

	if ( parent.getAttribute( 'aria-expanded' ) === 'true' ) {
		closeItem( parent );
	} else {
		openItem( parent );
	}
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
