<?php
/**
 * Contact Customizer.
 *
 * @package shiro
 */

namespace WMF\Customizer;

/**
 * Setups the customizer and related settings.
 * Adds new fields to create sections for the contact details
 */
class Connect extends Base {

	/**
	 * Add Customizer fields for header section.
	 */
	public function setup_fields() {
		$panel_id = 'wmf_connect';
		$this->customize->add_panel(
			$panel_id, array(
				'title'    => __( 'Connect', 'shiro' ),
				'priority' => 70,
			)
		);

		// Headings.
		$section_id = 'wmf_contact_headings';
		$this->customize->add_section(
			$section_id, array(
				'title'    => __( 'Main Headings', 'shiro' ),
				'priority' => 70,
				'panel'    => $panel_id,
			)
		);

		$control_id = 'wmf_connect_pre_heading';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Connect', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Pre Heading', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		$control_id = 'wmf_connect_heading';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Stay up-to-date on our work.', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Heading', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		// Subscribe Box.
		$section_id = 'wmf_contact_subscribe';
		$this->customize->add_section(
			$section_id, array(
				'title'    => __( 'Subscribe Box', 'shiro' ),
				'priority' => 70,
				'panel'    => $panel_id,
			)
		);

		$control_id = 'wmf_subscribe_heading';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Subscribe to our newsletter', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Heading', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		$control_id = 'wmf_subscribe_content';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			new Rich_Text_Control(
				$this->customize,
				$control_id,
				array(
					'label'   => __( 'Content', 'shiro' ),
					'section' => $section_id,
				)
			)
		);

		$control_id = 'wmf_subscribe_action';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Subscribe form action URL', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		$control_id = 'wmf_subscribe_additional_fields';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Subscribe form additional fields', 'shiro' ),
				'section' => $section_id,
				'type'    => 'textarea',
			)
		);

		$control_id = 'wmf_subscribe_placeholder';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Email address', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Email Placeholder', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		$control_id = 'wmf_subscribe_button';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Subscribe', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Button Text', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		// Contact box.
		$section_id = 'wmf_contact_contact';
		$this->customize->add_section(
			$section_id, array(
				'title'    => __( 'Contact Box', 'shiro' ),
				'priority' => 70,
				'panel'    => $panel_id,
			)
		);

		$control_id = 'wmf_contact_heading';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Heading', 'shiro' ),
				'section' => $section_id,
				'type'    => 'text',
			)
		);

		$control_id = 'wmf_contact_content';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			new Rich_Text_Control(
				$this->customize,
				$control_id,
				array(
					'label'   => __( 'Content', 'shiro' ),
					'section' => $section_id,
				)
			)
		);

		$control_id = 'wmf_contact_link';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			$control_id, array(
				'label'       => __( 'Link', 'shiro' ),
				'description' => __( 'This can be a URI or email address.', 'shiro' ),
				'section'     => $section_id,
				'type'        => 'text',
			)
		);

		$control_id = 'wmf_contact_link_text';
		$this->customize->add_setting( $control_id );
		$this->customize->add_control(
			$control_id, array(
				'label'       => __( 'Link Text', 'shiro' ),
				'description' => __( 'If this is empty, the Link value will be used automatically.', 'shiro' ),
				'section'     => $section_id,
				'type'        => 'text',
			)
		);
	}

}
