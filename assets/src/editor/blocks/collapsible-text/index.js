/**
 * Block for inserting collapsible text.
 */

/**
 * WordPress dependencies
 */
 import { __ } from '@wordpress/i18n';

 import { InnerBlocks, useBlockProps, InspectorControls, useSetting } from '@wordpress/block-editor';

 import { __experimentalNumberControl as NumberControl } from '@wordpress/components';

 import { PanelBody } from '@wordpress/components';


 export const name = 'shiro/collapisible-text';

 export const settings = {
		 apiVersion: 2,
		 title: __( 'Collapsible text', 'shiro-admin' ),
		 icon: 'menu',
		 category: 'wikimedia',

		 edit: ( { attributes, setAttributes } ) => {
			 const blockProps = useBlockProps(); // eslint-disable-line react-hooks/rules-of-hooks
			 const { fontColor } = attributes;
			 return (
				 <>
				 <InspectorControls>
					 <div>
						 <p>Set how many characters:</p>
					 </div>
				 <PanelBody>
				 <NumberControl
						isShiftStepEnabled={ true }
						onChange={ setValue }
						shiftStep={ 10 }
						value={ value }
					/>
				 </PanelBody>
			 </InspectorControls>
				 <div { ...blockProps }>
					 <div className="">
					 <RichText
						{ ...blockProps }
						tagName="h2" // The tag here is the element output and editable in the admin
						value={ attributes.content } // Any existing content, either from the database or an attribute default
						allowedFormats={ [ 'core/bold', 'core/italic' ] } // Allow the content to be made bold or italic, but do not allow other formatting options
						onChange={ ( content ) => setAttributes( { content } ) } // Store updated content as a block attribute
						placeholder={ __( 'Heading...' ) } // Display this text before any content has been added by the user
					/>
					 </div>
				 </div>
				 </>
			 );
		 },
		 save: () => {
			 return (
				 <div>
					 <div>
					 <RichText.Content { ...blockProps } tagName="h2" value={ attributes.content } />
					 </div>
				 </div>
			 );
		 },
	 };
