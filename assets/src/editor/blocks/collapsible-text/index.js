/**
 * Block for inserting collapsible text.
 */

/**
 * WordPress dependencies
 */
 import { __ } from '@wordpress/i18n';

 import { useBlockProps, InspectorControls } from '@wordpress/block-editor';

 import { PanelBody, SelectControl, RichText } from '@wordpress/components';

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
							{ label: 'Big', value: '75%' },
							{ label: 'Medium', value: '50%' },
							{ label: 'Small', value: '25%' },
						] }
						onChange={ ( newSize ) => setSize( newSize ) }
					/>
					</PanelBody>
			 	</InspectorControls>
					<div { ...blockProps }>
						<div class="collapsible-text__wrapper">
							<div class="collapsible-text" onclick="this.classList.add('expanded')">
								<div class="collapsible-text__content">
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>
								</div>
								<span class="trigger">+ Read more</span>
							</div>
						</div>
					</div>
				</>
			 );
		 },
		 save: ( attributes ) => {
			 return (
				<div class="collapsible-text__wrapper">
					<div class="collapsible-text" onclick="this.classList.add('expanded')">
						<div class="collapsible-text__content">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>
						</div>
						<span class="trigger">+ Read more</span>
					</div>
			  	</div>
			 );
		 },
	 };
