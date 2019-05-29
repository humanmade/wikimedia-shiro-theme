<?php
/**
 *
 * Template for displaying search results
 *
 * @package shiro
 */

get_header(); ?>

<?php
$template_args = array(
	/* translators: Query that is currently being searched */
	'h1_title' => sprintf( __( 'Search results for %s', 'shiro' ), get_search_query() ),
);

wmf_get_template_part( 'template-parts/header/page-noimage', $template_args );

?>

<div class="mw-980 mod-margin-bottom flex flex-medium news-card-list">
	<div id="search-results" class="card-list-container">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();

				wmf_get_template_part(
					'template-parts/modules/cards/card-horizontal', array(
						'link'       => get_the_permalink(),
						'image_id'   => get_post_thumbnail_id(),
						'title'      => get_the_title(),
						'authors'    => wmf_byline(),
						'date'       => get_the_date(),
						'excerpt'    => get_the_excerpt(),
						'categories' => get_the_category(),
						'sidebar'    => false,
					)
				);
			endwhile;
			?>

			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>

	<?php
	if ( have_posts() ) {
		# TODO: Filters are hidden for now
		# get_sidebar( 'search' );
	}
	?>
</div>

<div id="pagination">
	<?php
	if ( have_posts() ) :
		get_template_part( 'template-parts/pagination' );
	endif;
	?>
</div>

<?php
get_footer();
