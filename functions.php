<?php
/**
 * Setup theme
 */
function starter_theme_setup() {

	register_nav_menus(
		array(
			'main-menu'      => __( 'Main Menu', 'theme-starter' ),
			'secondary-menu' => __( 'Secondary Menu Left', 'theme-starter' ),
			'copyright-menu' => __( 'Copyright Menu', 'theme-starter' ),
		)
	);

	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	// Add theme support for WooCommerce (if applicable).
	if ( class_exists( 'WooCommerce' ) ) :
		add_theme_support( 'woocommerce' );
	endif;

	add_post_type_support( 'page', 'excerpt' );

	// Optional: Add a custom image size if needed.
	//add_image_size( 'custom-size', 1400, 770, array( 'center', 'center' ) );

}

add_action( 'after_setup_theme', 'starter_theme_setup' );

/**
 * Register our sidebars and widgetized areas.
 */
function starter_theme_footer_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Footer',
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-footer">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		),
	);

}

add_action( 'widgets_init', 'starter_theme_footer_widgets_init' );


if ( ! function_exists( 'starter_theme_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions dig_theme_enqueue_styles() and twentytwentytwo_editor_styles() above.
	 */
	function starter_theme_get_font_face_styles() {

		return "
			@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
		";

	}

endif;

if ( ! function_exists( 'starter_theme_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 */
	function starter_theme_preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'starter_theme_preload_webfonts' );

/**
 * Enqueue styles and scripts
 */
function starter_theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Register Theme main style.
	wp_register_style( 'theme-styles', get_template_directory_uri() . '/dist/css/main.css', array(), $theme_version );
	// Add styles inline.
	wp_add_inline_style( 'theme-styles', starter_theme_get_font_face_styles() );
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'theme-styles' );

	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), $theme_version, true );
	/*if ( is_page_template( 'page-templates/page-kontakt.php' ) || is_admin() ) :
		wp_enqueue_script( 'google-map-settings', get_stylesheet_directory_uri() . '/assets/js/google-maps.js', array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCB2RShyxiN7xPsQy1QI_SbqXXjW5p08S0&callback=initMap', array(), $theme_version, true );
	endif;*/
}

add_action( 'wp_enqueue_scripts', 'starter_theme_enqueue_styles' );

/**
 * Initializes Google Maps API key for ACF.
 *
 * @return void
 */
function starter_theme_google_map_init() {
	if ( is_admin() ) :
		acf_update_setting( 'google_api_key', 'AIzaSyCB2RShyxiN7xPsQy1QI_SbqXXjW5p08S0' );
	endif;
}

add_action( 'acf/init', 'starter_theme_google_map_init' );

/**
 * Remove <p> Tag From Contact Form 7.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );


/**
 * Lowers the metabox priority to 'core' for Yoast SEO's metabox.
 *
 * @param string $priority The current priority.
 *
 * @return string $priority The potentially altered priority.
 */
function starter_theme_lower_yoast_metabox_priority( $priority ) {
	return 'core';
}

add_filter( 'wpseo_metabox_prio', 'starter_theme_lower_yoast_metabox_priority' );


/**
 * Print data to the browser console for debugging.
 *
 * @param mixed ...$data The data to log to the console.
 * @return void
 */
function console_log( ...$data ) {
	// Only log in local environment.
	if ( defined( 'WP_ENVIRONMENT_TYPE' ) && WP_ENVIRONMENT_TYPE === 'local' ) :
		// Ensure the data is safely encoded into JSON format.
		$json = wp_json_encode( $data );

		// Check if encoding was successful.
		if ( false === $json ) :
			return; // If encoding fails, do nothing.
		endif;

		// Use output buffering to safely add the console log to the footer.
		add_action(
			'wp_footer',
			function() use ( $json ) {
				// Escape the JSON string before inserting into JavaScript.
				$escaped_json = esc_js( $json );
				// Output the JavaScript snippet.
				echo "<script>console.log({$escaped_json});</script>";
			}
		);
	endif;
}

// Theme custom template tags.
require get_template_directory() . '/inc/theme-template-tags.php';

// The theme admin settings.
require get_template_directory() . '/inc/theme-admin-settings.php';

// The theme custom menu walker settings.
require get_template_directory() . '/inc/theme-walker.php';
