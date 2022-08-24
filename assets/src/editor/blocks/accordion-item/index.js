/**
 * Block for inserting links to translated content.
 */

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';

import './style.scss';


export const name = 'shiro/accordion-item';

export const settings = {
	apiVersion: 2,
	title: __( 'Accordion Item', 'shiro-admin' ),
	icon: 'minus',
	category: 'wikimedia',
	parent: [ 'shiro/accordion' ],
	supports: {
		align: [ 'center', 'full' ],
	},

	attributes: {
		fontColor: {
			type: 'string',
		},
		title: {
			type: 'string',
			source: 'html',
			selector: 'h3',
		}
	},

	usesContext: [ 'accordion/fontColor' ],

	/**
	 * Edit the block.
	 */
	edit: ( {
		isSelected,
		attributes,
		setAttributes,
		context,
	} ) => {
		const blockProps = useBlockProps(); // eslint-disable-line react-hooks/rules-of-hooks
		const fontColor = context['accordion/fontColor'];

		if ( fontColor !== attributes.fontColor ) {
			console.log( 'setting color attribute' );
			setTimeout( () => setAttributes( { fontColor } ) );
		}

		console.log ( fontColor );
		return (
			<div { ...blockProps }>
				<div className="accordion-item" { ...{ 'aria-expanded': isSelected } } >
					<div className="accordion-item__title">
						<RichText
							className="accordion-item__title-text"
							formattingControls={ [] }
							placeholder={ __( 'Add Accordion Title...', 'shiro-admin' ) }
							tagName="h3"
							value={ attributes.title }
							onChange={ title => setAttributes( { title } ) }
							style={ fontColor && { color: fontColor } }
						></RichText>
					</div>

					<div className="accordion-item__content">
						<InnerBlocks />
					</div>
				</div>
			</div>
		);
	},

	/**
	 * Save block markup.
	 */
	save: ( { attributes, context } ) => {
		const { fontColor, title } = attributes;

		return (
			<div aria-expanded={ false } className="accordion-item">
				<button className="accordion-item__title" style={ fontColor && { color: fontColor } } >
					<RichText.Content
						className="accordion-item__title-text"
						tagName="h3"
						value={ title }
					/>
				</button>

				<div className="accordion-item__content">
					<InnerBlocks.Content/>
				</div>
			</div>
		);
	}
};
