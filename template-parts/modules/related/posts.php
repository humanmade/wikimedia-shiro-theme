<?php
/**
 * Related posts module
 *
 * @package shiro
 */

$template_data = wmf_get_template_data();

if ( empty( $template_data ) || empty( $template_data['posts'] ) ) {
	return;
}

$title            = ! empty( $template_data['title'] ) ? $template_data['title'] : '';
$translated_title = ! empty( $template_data['rand_translation_title'] ) ? $template_data['rand_translation_title'] : '';
$description      = ! empty( $template_data['description'] ) ? $template_data['description'] : '';

?>

<div class="w-100p news-list-container mod-margin-bottom">
	<div class="mw-980">
		<?php if ( ! empty( $title ) ) : ?>
		<h3 class="h3 color-gray uppercase">
			<?php echo esc_html( $title ); ?>
			<?php if ( ! empty( $translated_title ) ) : ?>
				— <span><?php echo esc_html( $translated_title ); ?></span>
			<?php endif; ?>
		</h3>
		<?php endif; ?>

		<?php if ( ! empty( $description ) ) : ?>
		<h2 class="h2">
			<?php echo esc_html( $description ); ?>
		</h2>
		<?php endif; ?>


		<div class="flex flex-medium flex-wrap-reverse">
			<?php
			foreach ( $template_data['posts'] as $post ) :
				setup_postdata( $post );
				wmf_get_template_part(
					'template-parts/modules/cards/card-vertical', array(
						'title'      => get_the_title(),
						'link'       => get_the_permalink(),
						'image_id'   => get_post_thumbnail_id(),
						'authors'    => wmf_byline(),
						'date'       => get_the_date(),
						'excerpt'    => get_the_excerpt(),
						'categories' => get_the_category(),

					)
				);
				wp_reset_postdata();
		endforeach;
			?>
		</div>
	</div>
</div>
