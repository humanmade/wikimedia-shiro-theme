/**
 * Block for inserting links to translated content.
 */

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

import { InnerBlocks, useBlockProps, InspectorControls, useSetting } from '@wordpress/block-editor';

import { PanelBody, ColorPalette } from '@wordpress/components';

/**
 * Internal dependencies
 */

import '../../../js/accordion/toggler';

export const name = 'shiro/accordion';

const CUSTOM_COLORS = [
    {
        color: '#f00',
        name: 'Red',
    },
    {
        color: '#fff',
        name: 'White',
    },
    {
        color: '#00f',
        name: 'Blue',
    },
];

export const settings = {
		apiVersion: 2,
		title: __( 'Accordion', 'shiro-admin' ),
		icon: 'menu',
		category: 'wikimedia',
		supports: {
			align: [ 'center', 'full' ],
		},
		attributes: {
			fontColor: {
				type: 'string',
			},
		},
		edit: ( { attributes, setAttributes } ) => {
			const blockProps = useBlockProps(); // eslint-disable-line react-hooks/rules-of-hooks
			const { fontColor } = attributes;
			return (
				<>
				<InspectorControls>
					<div>
                        <p>Set title font color:</p>
                    </div>
                <PanelBody>
					<ColorPalette
                            value={ fontColor }
                            colors={ [ ...CUSTOM_COLORS, ...useSetting( 'color.palette' ) ] }
                            onChange={ ( value ) => setAttributes( { fontColor: value } ) }
					/>
                </PanelBody>
            </InspectorControls>
				<div { ...blockProps }>
					<div className="accordion-wrapper">
						<InnerBlocks
							allowedBlocks={ [ 'shiro/accordion-item' ] }
						/>
					</div>
				</div>
				</>
			);
		},
		save: () => {
			return (
				<div>
					<div className="accordion-wrapper">
						<InnerBlocks.Content />
					</div>
				</div>
			);
		},
	};
