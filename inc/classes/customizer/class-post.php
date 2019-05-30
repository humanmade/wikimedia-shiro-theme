<?php
/**
 * Post Customizer.
 *
 * @package shiro
 */

namespace WMF\Customizer;

use WP_Customize_Image_Control;

/**
 * Setups the customizer and related settings.
 * Adds new fields to create sections for general post settings
 */
class Post extends Base {

	/**
	 * Add Customizer fields for general pages.
	 */
	public function setup_fields() {
		$section_id = 'wmf_post_content';
		$this->customize->add_section(
			$section_id, array(
				'title'    => __( 'Post Settings', 'shiro' ),
				'priority' => 60,
			)
		);

		$control_id = 'wmf_related_posts_title';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Related', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'       => __( 'Related Posts Section Title', 'shiro' ),
				'description' => __( 'This displays at the bottom of each single post.', 'shiro' ),
				'section'     => $section_id,
				'type'        => 'text',
			)
		);

		$control_id = 'wmf_related_posts_description';
		$this->customize->add_setting(
			$control_id, array(
				'default' => __( 'Read further in the pursuit of knowledge', 'shiro' ),
			)
		);
		$this->customize->add_control(
			$control_id, array(
				'label'   => __( 'Related Posts Section Description', 'shiro' ),
				'section' => $section_id,
				'type'    => 'textarea',
			)
		);
	}

}
