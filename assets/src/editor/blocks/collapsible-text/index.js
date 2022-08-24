/**
 * Block for inserting collapsible text.
 */

/**
 * WordPress dependencies
 */
 import { __ } from '@wordpress/i18n';

 import { useBlockProps, InspectorControls } from '@wordpress/block-editor';

 import { PanelBody, RichText, SelectControl } from '@wordpress/components';

 import { useState } from '@wordpress/element';

 export const name = 'shiro/collapsible-text';

 export const settings = {
		 apiVersion: 2,
		 title: __( 'Collapsible text', 'shiro-admin' ),
		 icon: 'ellipsis',
		 category: 'wikimedia',
		 attributes: {
			content: {
				type: 'string',
				source: 'html',
				selector: 'h2',
			},
		},


		 edit: ( { attributes, setAttributes, setFocus } ) => {
			 const blockProps = useBlockProps(); // eslint-disable-line react-hooks/rules-of-hooks
			 const [ size, setSize ] = useState( '50%' );
			 return (
				<>
				<InspectorControls>
					<div>
						<p>Set text display size:</p>
					</div>
					<PanelBody>
				 	<SelectControl
						label="Size"
						value={ size }
						options={ [
							{ label: 'Big', value: '100%' },
							{ label: 'Medium', value: '50%' },
							{ label: 'Small', value: '25%' },
						] }
						onChange={ ( newSize ) => setSize( newSize ) }
					/>
					</PanelBody>
			 	</InspectorControls>
					<div { ...blockProps }>
						<div className="">
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
					</div>
				</>
			 );
		 },
		 save: ( attributes ) => {
			 return (
				 <div>
					 <div>
						<RichText.Content tagName="h2" value={ attributes.content } />
					 </div>
				 </div>
			 );
		 },
	 };
