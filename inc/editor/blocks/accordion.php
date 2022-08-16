<?php
/**
 * Register the shiro/accordion-block block.
 */

namespace WMF\Editor\Blocks\AccordionBlock;

const BLOCK_NAME = 'shiro/accordion-block';

function bootstrap() {
	add_action( 'init', __NAMESPACE__ . '\\register_block' );
}

function register_block() {
	register_block_type(
		BLOCK_NAME,
		[
			'apiVersion' => 2,
			'render_callback' => __NAMESPACE__ . '\\render_block',
			'icon' => 'post',
			'attributes' => [
				'align' => [
					'type' => 'string',
					'default' => 'center',
				]
			]
		]
	);
}

function render_block( $attributes ) {
	$class = 'accordion-block';

	$output = '<div class="' . $class . '">12345</div>';

	return $output;
}
