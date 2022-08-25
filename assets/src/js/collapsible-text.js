/**
 * Expand/collapse functionality for the shiro/collapsible-text block.
 */

/**
 * Handle a click event on the collapsible area's toggle button.
 *
 * @param {Event} Click event.
 * @returns {HTMLElement} Target element.
 */
const toggleCollapsibleArea = ( { target } ) =>
	target.closest( '.collapsible-text' ).classList.toggle( 'expanded' );

/**
 * Attach listeners to any collapsible area triggers.
 *
 * @returns {HTMLElement[]} All toggle buttons on the current page.
 */
const init = () => {
	[ ...document.querySelectorAll( '.collapsible-text__toggle' ) ].forEach(
		button => button.addEventListener( 'click', toggleCollapsibleArea )
	);
};

document.addEventListener( 'DOMContentLoaded', init );
