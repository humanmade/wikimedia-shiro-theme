/**
 * Block for inserting links to translated content.
 */

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

export const
	name = 'shiro/accordion-block',
	settings = {
		apiVersion: 2,
		title: __( 'Accordion', 'shiro-admin' ),
		icon: 'post',
		category: 'wikimedia',
		supports: {
			align: [ 'center', 'full' ],
		},
		/**
		 * Edit the block.
		 */
		 edit: function () {
			return <p> Hello world (from the editor)</p>;
		},
		/**
		 * Save nothing, to allow for server-size rendering.
		 */
		 save: function () {
			return <p> Hola mundo (from the frontend) </p>;
		},
	};
