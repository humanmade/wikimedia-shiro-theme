<?php
/**
 * Block patterns for content editors to quickly create content.
 */

namespace WMF\Editor\Patterns;

/**
 * @var string The slug for the block pattern category to group these into.
 */
const MAIN_CATEGORY_NAME = 'wikimedia';

/**
 * @var string The slug for patterns that are meant for migration to populate
 *             based on a template.
 */
const TEMPLATE_CATEGORY_NAME = 'wikimedia-templates';

/**
 * Hook into WordPress
 */
function bootstrap() {
	add_action( 'after_setup_theme', __NAMESPACE__ . '\\register_pattern' );
}

function register_pattern() {
	register_block_pattern_category( MAIN_CATEGORY_NAME, [
		'label' => __( 'Wikimedia', 'shiro' ),
	] );

	register_block_pattern_category( TEMPLATE_CATEGORY_NAME, [
		'label' => __( 'Wikimedia templates', 'shiro' ),
	] );

	register_block_pattern( FactColumns\NAME, [
		'title' => __( 'Numbered fact columns', 'shiro' ),
		'categories' => [ MAIN_CATEGORY_NAME ],
		'content' => FactColumns\PATTERN,
	] );

	register_block_pattern( TweetColumns\NAME, [
		'title' => __( 'Tweet this columns', 'shiro' ),
		'categories' => [ MAIN_CATEGORY_NAME ],
		'content' => TweetColumns\pattern(),
	] );

	register_block_pattern( LinkColumns\NAME, [
		'title' => __( 'External link columns', 'shiro' ),
		'categories' => [ MAIN_CATEGORY_NAME ],
		'content' => LinkColumns\pattern(),
	] );

	register_block_pattern( CardColumns\NAME, [
		'title' => __( 'Cards' ),
		'categories' => [ MAIN_CATEGORY_NAME ],
		'content' => CardColumns\PATTERN,
	] );

	register_block_pattern( BlogList\NAME, [
		'title' => __( 'Blog list section', 'shiro' ),
		'categories' => [ MAIN_CATEGORY_NAME ],
		'content' => BlogList\PATTERN,
	] );

	register_block_pattern( TemplateLanding\NAME, [
		'title' => __( 'Landing page template', 'shiro' ),
		'categories' => [ TEMPLATE_CATEGORY_NAME ],
		'content' => TemplateLanding\pattern(),
	] );
}
