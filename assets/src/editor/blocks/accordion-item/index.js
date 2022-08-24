/**
 * Block for inserting links to translated content.
 */

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

import { InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';

import './style.scss';


export const name = 'shiro/accordion-item';

export const settings = {
	apiVersion: 2,
	title: __( 'Accordion Item', 'shiro-admin' ),
	icon: 'minus',
	category: 'wikimedia',
	supports: {
		align: [ 'center', 'full' ],
	},

	/**
	 * Edit the block.
	 */
		edit: ( {
		attributes,
		setAttributes,
		setFocus,
	} ) => {
		const blockProps = useBlockProps(); // eslint-disable-line react-hooks/rules-of-hooks
		const ALLOWED_BLOCKS = wp.blocks.getBlockTypes().map(block => block.name).filter(blockName => blockName !== 'shiro/accordion-item');
		return (
			<div { ...blockProps }>
				<div aria-expanded className="accordion-item">
					<div className="accordion-item__title">
						<RichText
							className="accordion-item__title-text"
							formattingControls={ [] }
							placeholder={
								'Add Accordion Title...'
							}
							tagName="h3"
							value={ attributes.title }
							onChange={ content => setAttributes( { title: content } ) }
							onFocus={ setFocus }
						></RichText>
					</div>

					<div className="accordion-item__content">
						<InnerBlocks
							allowedBlocks={ ALLOWED_BLOCKS }
						/>
					</div>
				</div>
			</div>
		);
	},

	/**
	 * Save nothing, to allow for server-size rendering.
	 */
		save: ( { attributes } ) => {
		return (
			<div aria-expanded={ false } className="accordion-item">
				<button className="accordion-item__title">
					<RichText.Content
						className="accordion-item__title-text"
						tagName="h3"
						value={ attributes.title }
					/>
				</button>

				<div className="accordion-item__content">
					<InnerBlocks.Content/>
				</div>
			</div>
		);
		}
};
