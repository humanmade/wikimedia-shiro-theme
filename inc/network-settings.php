<?php
/**
 * Additional Network Settings
 *
 * @package shiro
 */

namespace Network_Settings;

/**
 * Bootstrap network functionality.
 */
function bootstrap() {
	add_action( 'network_admin_menu', __NAMESPACE__ . '\\add_menu_and_fields' );
	add_action( 'network_admin_edit_seo_settings_page', __NAMESPACE__ . '\\contest_settings_page_update' );
}

/**
 * Creates the sub-menu page and register the SEO settings.
 */
function add_menu_and_fields() {
	add_submenu_page(
		'settings.php',
		__( 'SEO Settings', 'shiro-seo-admin' ),
		__( 'Search Engine Optimization', 'shiro-seo-admin' ),
		'manage_network_options',
		'seo_settings_page',
		__NAMESPACE__ . '\\render_settings_page'
	);

	add_settings_section(
		'matomo_settings_section',
		__( 'Matomo settings', 'shiro-seo-admin' ),
		__NAMESPACE__ . '\\matomo_settings_section_content',
		'seo_settings_page'
	);

	register_setting( 'seo_settings_page', 'matomo_siteid' );

	add_settings_field(
		'matomo_siteid_field',
		__( 'Enter Matomo Site ID', 'shiro-seo-admin' ),
		__NAMESPACE__ . '\\matomo_siteid_field_content',
		'seo_settings_page',
		'matomo_settings_section'
	);
}

/**
 * Render the settings page.
 */
function render_settings_page() {
	?>

	<?php if ( isset( $_GET['updated'] ) && sanitize_text_field( wp_unslash( $_GET['updated'] ) ) ) : ?>
		<div id="message" class="updated notice is-dismissible">
			<p><?php esc_html_e( 'SEO settings were saved.', 'shiro-seo-admin' ); ?></p>
		</div>
	<?php endif; ?>

	<div class="wrap">

		<h1><?php esc_html_e( 'Search Engine Optimization Settings', 'shiro-seo-admin' ); ?></h1>

		<form method="post" action="edit.php?action=seo_settings_page">
			<?php
			settings_fields( 'seo_settings_page' );
			do_settings_sections( 'seo_settings_page' );
			submit_button();
			?>
		</form>

	</div>
	<?php
}

/**
 * Matomo settings section content.
 */
function matomo_settings_section_content() {
	esc_html_e( 'Use the options below to configure the usage of Matomo', 'shiro-seo-admin' );
}

/**
 * Matomo Site ID field content.
 */
function matomo_siteid_field_content() {

	$matomo_siteid = get_site_option( 'matomo_siteid' );

		?>
		<label>
			<input
				type="number"
				name="matomo_siteid"
				value="<?php echo esc_attr( $matomo_siteid ); ?>"
			>
		</label>
		<?php
}

/**
 * Update the SEO settings.
 */
function seo_settings_page_update() {
	check_admin_referer( 'seo_settings_page-options' );

	$matomo_siteid = sanitize_text_field( $_POST['matomo_siteid'] );
	if ( $matomo_siteid ) {
		update_site_option( 'matomo_siteid', $matomo_siteid );
	}

	wp_safe_redirect( add_query_arg( 'updated', 'true', network_admin_url( 'settings.php?page=seo_settings_page' ) ) );
	exit;
}
