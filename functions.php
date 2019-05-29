<?php
/**
 * Wikimedia Foundation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shiro
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wmf_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shiro, use a find and replace
	 * to change 'shiro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shiro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for Custom Header.
	 *
	 * @link https://codex.wordpress.org/Custom_Headers
	 */
	add_theme_support( 'custom-header' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header'            => esc_html__( 'Header', 'shiro' ),
			'footer-under-text' => esc_html__( 'Footer Under Text', 'shiro' ),
			'footer-projects'   => esc_html__( 'Footer Projects', 'shiro' ),
			'footer-affiliates' => esc_html__( 'Footer Movement Affiliates', 'shiro' ),
			'footer-legal'      => esc_html__( 'Footer Legal', 'shiro' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background', apply_filters(
			'wmf_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_image_size( 'profile_thumb', '206', '257', true );
	add_image_size( 'image_4x3_small', '400', '300', true );
	add_image_size( 'image_4x3_large', '800', '600', true );
	add_image_size( 'image_4x5_small', '400', '500', true );
	add_image_size( 'image_4x5_large', '800', '1000', true );
	add_image_size( 'image_16x9_large', '1200', '675', true );
	add_image_size( 'image_16x9_small', '600', '338', true );
	add_image_size( 'image_square_medium', '250', '250', true );
}
add_action( 'after_setup_theme', 'wmf_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wmf_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shiro' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wmf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wmf_scripts() {
	wp_enqueue_style( 'shiro-style', get_stylesheet_uri(), array(), '1.0' );

	if ( get_theme_mod( 'wmf_enable_rtl' ) ) {
		wp_enqueue_style( 'shiro-style-rtl', get_stylesheet_directory_uri() . '/rtl.css', array(), '1.0' );
	}

	wp_enqueue_script( 'shiro-flickity', get_stylesheet_directory_uri() . '/assets/dist/flickity-min.js', array( 'jquery' ), '0.0.1', true );
	wp_enqueue_script( 'shiro-svg4everybody', get_stylesheet_directory_uri() . '/assets/dist/svg4everybody.min.js', array( 'jquery' ), '0.0.1', true );
	wp_enqueue_script( 'shiro-stickyfill', get_stylesheet_directory_uri() . '/assets/dist/stickyfill.min.js', array( 'jquery' ), '0.0.1', true );
	wp_enqueue_script( 'shiro-script', get_stylesheet_directory_uri() . '/assets/dist/scripts.min.js', array( 'jquery', 'shiro-flickity', 'shiro-stickyfill', 'shiro-svg4everybody' ), '0.0.1', true );

	wp_localize_script(
		'shiro-script', 'shiro', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_localize_script(
		'shiro-script', 'wmfrtl', array(
			'enable' => get_theme_mod( 'wmf_enable_rtl' ) ? true : false,
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wmf_scripts' );

/**
 * Adds Piwik Analytics to the footer of each page.
 */
function wmf_add_piwik_analytics() {
	?>
	<!-- Matomo -->
<script type="text/javascript">
var _paq = _paq || [];
/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
var u="//piwik.wikimedia.org/";
_paq.push(['setTrackerUrl', u+'piwik.php']);
_paq.push(['setSiteId', '17']);
var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();
</script>
<!-- End Matomo Code -->
	<?php
}
add_action( 'wp_footer', 'wmf_add_piwik_analytics' );

/**
 * Adds publicly querable option to page so it can be filtered
 *
 * @param array  $args      List of Post type args.
 * @param string $post_type Current Post Type name.
 * @return array Filtered args.
 */
function wmf_edit_page_post_type( $args, $post_type ) {
	if ( 'page' === $post_type ) {
		$args['publicly_queryable'] = true;
	}

	return $args;
}
add_filter( 'register_post_type_args', 'wmf_edit_page_post_type', 10, 2 );

/**
 * Enqueue admin scripts and styles.
 */
function wmf_admin_scripts() {
	wp_enqueue_style(
		'shiro-editor',
		get_stylesheet_directory_uri() . '/assets/dist/admin/admin.css',
		array(),
		filemtime( trailingslashit( get_stylesheet_directory() ) . 'assets/dist/admin/admin.css' )
	);

	wp_enqueue_script(
		'shiro-editor-js',
		get_stylesheet_directory_uri() . '/assets/src/admin/post-meta.js',
		array( 'jquery' ),
		filemtime( trailingslashit( get_stylesheet_directory() ) . 'assets/src/admin/post-meta.js' ),
		true
	);

	wp_enqueue_script(
		'shiro-media-js',
		get_stylesheet_directory_uri() . '/assets/src/admin/media.js',
		array( 'jquery' ),
		filemtime( trailingslashit( get_stylesheet_directory() ) . 'assets/src/admin/media.js' ),
		true
	);
}
add_action( 'admin_enqueue_scripts', 'wmf_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions to handle translation.
 */
require get_template_directory() . '/inc/template-translations.php';

/**
 * Ajax related functions
 */
require get_template_directory() . '/inc/ajax.php';

/**
 * Adjustments to queries.
 */
require get_template_directory() . '/inc/queries.php';

/**
 * Class autoloader.
 */
require get_template_directory() . '/inc/classes/class-autoload.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/classes/customizer/class-base.php';

/**
 * Custom Fields functions.
 */
require get_template_directory() . '/inc/fields.php';

/**
 * Custom Taxonomies.
 */
require get_template_directory() . '/inc/taxonomies.php';

/**
 * Add Custom Post Types.
 */
require get_template_directory() . '/inc/post-types/profile.php';

/**
 * Add Template Data Helper.
 */
require get_template_directory() . '/inc/classes/class-wmf-template-data.php';

/**
 * Add Cache related functions.
 */
require get_template_directory() . '/inc/cache.php';

/**
 * Safe Redirect mods.
 */
require get_template_directory() . '/inc/safe-redirect.php';
