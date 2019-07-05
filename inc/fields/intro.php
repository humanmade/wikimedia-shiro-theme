<?php
/**
 * Fieldmanager Fields for Page Intro options
 *
 * @package shiro
 */

/**
 * Add intro options.
 */
function wmf_intro_fields() {
	$intro = new Fieldmanager_RichTextArea(
		array(
			'name' => 'page_intro',
		)
	);
	$intro->add_meta_box( __( 'Page Intro', 'shiro' ), array( 'post' ) );
}
add_action( 'fm_post_post', 'wmf_intro_fields', 5 );
