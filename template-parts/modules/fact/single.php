<?php
/**
 * Handles page fact module for a single fact.
 *
 * @package shiro
 */

$template_args = wmf_get_template_data();

if ( empty( $template_args['image'] ) && empty( $template_args['heading'] ) && empty( $template_args['content'] ) ) {
	return;
}

$image = ! empty( $template_args['image'] ) ? $template_args['image'] : '';
$image = is_numeric( $image ) ? wp_get_attachment_image_url( $image, 'large' ) : $image;

?>

<div class="fact-container fact-full-width mw-1360-bg bg-img--turquoise-dark mod-margin-bottom">

	<?php if ( ! empty( $image ) ) : ?>
	<div class="bg-img-container">
		<div class="bg-img" style="background-image: url(<?php echo esc_url( $image ); ?>);"></div>
	</div>
	<?php endif; ?>

	<?php if ( ! empty( $template_args['heading'] ) || ! empty( $template_args['content'] ) ) : ?>
	<div class="fact-inner">
		<div class="fact-text-wrap">
			<?php if ( ! empty( $template_args['heading'] ) ) : ?>
			<h2 class="fact-number color-white mar-bottom"><?php echo esc_html( $template_args['heading'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $template_args['content'] ) ) : ?>
			<h3 class="fact fact-foreign-language"><?php echo esc_html( $template_args['content'] ); ?></h3>
			<?php endif; ?>
		</div>

		<?php

		$template_args = array(
			'message'  => sprintf( '%1$s - %2$s', $template_args['heading'], $template_args['content'] ),
			'services' => array( 'twitter' ),
			'title'    => '',
		);
		wmf_get_template_part( 'template-parts/modules/social/share', $template_args, 'vertical' );
		?>
	</div>
	<?php endif; ?>

</div>
