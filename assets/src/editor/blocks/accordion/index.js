/**
 * Block for inserting links to translated content.
 */

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

import './style.scss';

import './toggler';

export const name = 'shiro/accordion';

export const settings = {
	apiVersion: 2,
	title: __( 'Accordion', 'shiro-admin' ),
	icon: 'menu',
	category: 'wikimedia',
	supports: {
		align: [ 'center', 'full' ],
	},
	edit: () => {
		const blockProps = useBlockProps(); // eslint-disable-line react-hooks/rules-of-hooks

		return (
			<div { ...blockProps }>
				<div className="accordion-wrapper">
					<InnerBlocks
						allowedBlocks={ [ 'shiro/accordion-item' ] }
					/>
				</div>
			</div>
		);
	},
	save: () => {
		return (
			<div className="accordion-wrapper">
				<InnerBlocks.Content />
			</div>
		);
	},
};
