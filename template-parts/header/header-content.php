<?php
/**
 * Common Header partial
 *
 * @package shiro
 */

$page_header_data = wmf_get_template_data();

$h4_link              = ! empty( $page_header_data['h4_link'] ) ? $page_header_data['h4_link'] : '';
$h4_title             = ! empty( $page_header_data['h4_title'] ) ? $page_header_data['h4_title'] : '';
$h2_link              = ! empty( $page_header_data['h2_link'] ) ? $page_header_data['h2_link'] : '';
$h2_title             = ! empty( $page_header_data['h2_title'] ) ? $page_header_data['h2_title'] : '';
$title                = ! empty( $page_header_data['h1_title'] ) ? $page_header_data['h1_title'] : '';
$alt_title            = ! empty( $page_header_data['h1_alt_title'] ) ? $page_header_data['h1_alt_title'] : '';
$meta                 = ! empty( $page_header_data['page_meta'] ) ? $page_header_data['page_meta'] : '';
$allowed_tags         = wp_kses_allowed_html( 'post' );
$allowed_tags['time'] = true;
$button = ! empty( get_post_meta( get_the_ID(), 'intro_button', true ) ) ? get_post_meta( get_the_ID(), 'intro_button', true ) : '';
$extra_height_class = empty($button['title']) ? '' : 'ungrid-extra-height';
$wmf_homedonate_button = get_theme_mod( 'wmf_homedonate_button', __( 'Donate now', 'shiro' ) );
$wmf_homedonate_uri    = get_theme_mod( 'wmf_homedonate_uri', '#' );
$wmf_homedonate_intro    = get_theme_mod( 'wmf_homedonate_intro', 'Protect and sustain Wikipedia' );
$wmf_homedonate_secure    = get_theme_mod( 'wmf_homedonate_secure', 'SECURE DONATIONS' );


$image            = ! empty( $page_header_data['image'] ) ? $page_header_data['image'] : '';
$bg_opts          = wmf_get_background_image();
$bg_color         = $bg_opts['color'] ? 'pink' : 'blue';

$wmf_translation_selected = get_theme_mod( 'wmf_selected_translation_copy', __( 'Languages', 'shiro' ) );
$wmf_translations         = wmf_get_translations();

$single_title = '';
if ( ! empty( $h2_title ) xor ! empty( $title )) {
	$single_title = ! empty( $h2_title ) ? $h2_title : $title;
}
?>

<script type="text/javascript">
  var DIGITAL_CLIMATE_STRIKE_OPTIONS = {
    /**
     * Specify view cookie expiration. After initial view, widget will not be
     * displayed to a user again until after this cookie expires. Defaults to 
     * one day.
     */
    cookieExpirationDays: 1, // @type {number}
    
    /**
     * Set the language of the widget. We currently support:
     * 'en': English
     * 'de': German
     * 'es': Spanish
     * 'cs': Czech
     * 'fr': French
     * 'nl': Dutch
     * 'tr': Turkish
     * Defaults to null, which will obey the nagivator.language setting of the 
     * viewer's browser.
     */
     language: null, // @type {string}
     
    /**
     * Allow you to override the iFrame hostname. Defaults to https://assets.digitalclimatestrike.net  
     */
    iframeHost: 'https://wikimediafoundation-org-preprod.go-vip.net/wp-content/themes/shiro/assets/dist/digital-climate-strike/dist/', // @type {string}

    /**
     * Prevents the widget iframe from loading Google Analytics. Defaults to
     * false. (Google Analytics will also be disabled if doNotTrack is set on
     * the user's browser.)
     */
    disableGoogleAnalytics: true, // @type {boolean}

    /**
     * Always show the widget, even when someone has closed the widget and set the cookie on their device. 
     * Useful for testing. Defaults to false.
     */
    alwaysShowWidget: false, // @type {boolean}

    /**
     * Automatically makes the widget full page. Defaults to false.
     */
    forceFullPageWidget: false, // @type {boolean}
    
    /**
    * For the full page widget, shows a close button "x" and hides the message about the site being 
    * available tomorrow. Defaults to false.
    */
    showCloseButtonOnFullPageWidget: true, // @type {boolean}
    
    /**
     * The date when the sticky footer widget should start showing on your web site.
     * Note: the month is one integer less than the number of the month. E.g. 8 is September, not August.
     * Defaults to new Date(2019, 7, 1) (August 1st, 2019).
     */
    footerDisplayStartDate: new Date(), //@ type {Date object}
    
    /**
     * The date when the full page widget should showing on your web site for 24 hours. 
     * Note: the month is one integer less than the number of the month. E.g. 8 is September, not August.
     * Defaults to new Date(2019, 8, 20) (September 20th, 2019)
     */
    fullPageDisplayStartDate: new Date(2019, 8, 20), //@ type {Date object}
  };
</script>
<script src="/wp-content/themes/shiro/assets/dist/digital-climate-strike/dist/widget.js" async></script>



<div class="header-content">

	<!-- Top back link -->
	<?php if ( ! empty( $h4_title ) ) : ?>
	<h2 class="h4 eyebrow">
		<?php if ( ! empty( $h4_link ) ) : ?>
		<a class="back-arrow-link" href="<?php echo esc_url( $h4_link ); ?>">
		<?php endif; ?>
			<?php echo esc_html( $h4_title ); ?>
		<?php if ( ! empty( $h4_link ) ) : ?>
		</a>
		<?php endif; ?>
	</h2>
	<?php endif; ?>

	<!-- Blog home  -->
	<?php if ( is_home() && ! empty( $h2_title ) ) { ?>
		<h2 class="h1 eyebrow"><?php echo esc_html( $h2_title ); ?></h2>
	<?php } ?>

	<!-- Site front page -->
	<?php if ( is_front_page() ) { ?>
		<?php if ( ! empty( $title ) ) : ?>
			<div class="header-animation">
				<div class="header-bg-img">

				</div>
				<div class="mw-980">
					<div class="vision_container">
						<?php get_template_part( 'template-parts/header/vision'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php } ?>

	<?php if ( ! is_front_page() && ! is_home() ) { ?>
		<!-- h2 or title as heading -->
		<?php if ( ! empty( $single_title ) ) { ?>
			<h2 class="h2 eyebrow">
				<?php echo wp_kses( $single_title, array( 'span' => array( 'class' ) ) ); ?>
			</h2>
			<?php if ( !empty( $image ) ) { ?>
				<img src="<?php echo esc_url($image)?>" alt="">
			<?php } ?>
		<?php } ?>

		<!-- h2 and title, without image -->
		<?php if ( empty( $image) && !empty($h2_title) && !empty($title)) { ?>
			<h2 class="h2 eyebrow">
				<?php echo esc_html( $h2_title ); ?>
			</h2>
			<div class="flex flex-medium page-landing fifty-fifty">
				<div class="module-mu w-50p">
					<h1><?php echo wp_kses( $title, array( 'span' => array( 'class' ) ) ); ?></h1>
				</div>
				<div class="page-intro-text module-mu w-50p">
					<!-- No content here -->
				</div>
			</div>
		<?php } ?>

		<!-- h2 and title, with image -->
		<?php if ( !empty( $image) && !empty($h2_title) && !empty($title)) { ?>
			<div class="ungrid <?php echo esc_attr($extra_height_class); ?>">
				<div class="mw-980">
					<?php if ( !empty( $image) && !empty($h2_title) && !empty($title)) { ?>
						<div class="flex flex-medium page-landing fifty-fifty">
							<div class="module-mu w-50p">
								<h2 class="h2 eyebrow">
									<?php echo esc_html( $h2_title ); ?>
								</h2>
								<h1><?php echo wp_kses_post( $title ); ?></h1>
								<?php wmf_get_template_part( 'template-parts/modules/intro/button', $button ); ?>
							</div>
							<div class="page-intro-text module-mu w-50p" >
								<div class="bg-img" style="background-image: url(<?php echo esc_url( $image ); ?>);">

								</div>
							</div>
						</div>
						<div class="content">
							<?php the_content(); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	<?php } ?>

	<?php if ( ! empty( $alt_title ) ) : ?>
		<h2 class="h1 mar-bottom"><?php echo wp_kses( $alt_title, array( 'span' => array( 'class' ) ) ); ?></h2>
	<?php endif; ?>

	<?php if ( ! empty( $meta ) ) : ?>
	<div class="post-meta h4">
		<?php echo wp_kses( $meta, $allowed_tags ); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_front_page() ) : ?>
		<div class="page-intro wysiwyg">
			<div>
				<div class="page-intro-text flex flex-medium">
					<div class="w-68p">
						<?php the_content(); ?>
						<br>
					</div>
					<div class="w-32p">
						<div>
                            <?php echo esc_html( $wmf_homedonate_intro ); ?>
                        </div>
						<a class="btn btn-blue" href="<?php echo esc_url( $wmf_homedonate_uri ); ?>"><?php echo esc_html( $wmf_homedonate_button ); ?></a>
						<span class="secure">
							<img src="/wp-content/themes/shiro/assets/src/svg/lock.svg" alt="">
							<?php echo esc_html( $wmf_homedonate_secure ); ?>
						</span>
					</div>
				</div>

			</div>
		</div>
	<?php endif; ?>
</div>

<?php if ( is_front_page() ) : ?>
	<?php if ( false !== $wmf_translations ) : ?>
		<div class="translation-bar">
		<div class="translation-bar-inner mw-980">
			<ul class="list-inline">
			<?php foreach ( $wmf_translations as $wmf_index => $wmf_translation ) : ?>
				<?php if ( 0 !== $wmf_index ) : ?>
				<li class="divider">&middot;</li>
				<?php endif; ?>
				<li>
					<?php if ( $wmf_translation['selected'] ) : ?>
					<span><?php echo esc_html( $wmf_translation['name'] ); ?></span>
					<?php else : ?>
					<span lang="<?php echo esc_attr( $wmf_translation['shortname'] ); ?>"><a href="<?php echo esc_url( $wmf_translation['uri'] ); ?>"><?php echo esc_html( $wmf_translation['name'] ); ?></a></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
			</ul>

			<?php if ( count( $wmf_translations ) > 10 ) : ?>
			<div class="arrow-wrap">
				<span>
					<span class="elipsis">...</span>
					<?php wmf_show_icon( 'trending', 'icon-turquoise material' ); ?>
				</span>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>