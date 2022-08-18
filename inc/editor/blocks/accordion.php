<?php
/**
 * Register the shiro/accordion block.
 */

namespace WMF\Editor\Blocks\Accordion;

const BLOCK_NAME = 'shiro/accordion';

function bootstrap() {
	add_action( 'init', __NAMESPACE__ . '\\register_block' );

	// Frontend functionality.
	//add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\register_accordion_toggler' );
	// Frontend styles.
	//add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\register_shared_style' );
	//add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\register_frontend_style' );
	// Backend styles.
	//add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\register_shared_style' );
	//add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\register_editor_style' );

	//add_filter( 'wp_kses_allowed_html', __NAMESPACE__ . '\\filter_kses_post_allowed_html', 10, 2 );
}

function register_block() {
	register_block_type(
		BLOCK_NAME,
		[
			'apiVersion' => 2,
			'render_callback' => __NAMESPACE__ . '\\render_block',
			'icon' => 'menu',
			'attributes' => [
				'align' => [
					'type' => 'string',
					'default' => 'center',
				]
			]
		]
	);
}

/**
 * Register the shared styles for the Accordion.
 *
 * This function is hooked both into the frontend and the backend enqueuing hooks.
 */
function register_shared_style() {
	wp_enqueue_style(
		'wuest-accordion-shared',
		plugin_dir_url( __FILE__ ) . 'shared.css',
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'shared.css' )
	);
}

/**
 * Register the frontend styles for the Accordion.
 */
function register_frontend_style() {
	wp_register_style(
		'wuest-accordion',
		plugin_dir_url( __FILE__ ) . 'frontend.css',
		[
			'wuest-accordion-shared',
		],
		filemtime( plugin_dir_path( __FILE__ ) . 'frontend.css' )
	);
}

/**
 * Register the backend styles for the Accordion.
 */
function register_editor_style() {
	wp_register_style(
		'wuest-accordion-editor',
		plugin_dir_url( __FILE__ ) . 'editor.css',
		[
			'wuest-accordion-shared',
		],
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
	);
}

/**
 * Register the script to handle opening and closing items on the frontend.
 */
function register_accordion_toggler() {
	wp_register_script(
		'wuest-accordion',
		plugin_dir_url( __FILE__ ) . 'toggler.js',
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'toggler.js' ),
		true
	);
}

/**
 * Filter kses for post context.
 *
 * Add support for aria-expanded to ensure block validation doesn't fail.
 *
 * @param  array  $tags    KSES Tags.
 * @param  string $context Context e.g. post.
 * @return array  Filtered KSES Tags.
 */
function filter_kses_post_allowed_html( array $tags, string $context ) : array {
	if ( $context !== 'post' ) {
		return $tags;
	}

	$tags['div']['aria-expanded'] = true;

	return $tags;
}
