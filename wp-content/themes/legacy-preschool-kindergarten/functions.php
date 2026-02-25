<?php
if ( ! defined( 'LEGACY_PRESCHOOL_KINDERGARTEN_VERSION' ) ) {
	define( 'LEGACY_PRESCHOOL_KINDERGARTEN_VERSION', '0.0.3' );
}

/**
 * Enqueue scripts and styles.
 */
function legacy_preschool_kindergarten_scripts() {
	wp_enqueue_style( 'legacy-preschool-kindergarten-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/style.css', array(), LEGACY_PRESCHOOL_KINDERGARTEN_VERSION );

	wp_enqueue_style( 'fontawesome', trailingslashit( get_template_directory_uri() ) . 'assets/css/font-awesome/css/all.css', array(), LEGACY_PRESCHOOL_KINDERGARTEN_VERSION );

	wp_enqueue_style( 'owl-carousel-css', trailingslashit( get_template_directory_uri() ) . 'assets/css/owl.carousel.css', array(), LEGACY_PRESCHOOL_KINDERGARTEN_VERSION );
	
	// Enqueue theme JavaScript
	wp_enqueue_script( 'legacy-preschool-kindergarten-theme', trailingslashit( get_template_directory_uri() ) . 'assets/js/theme.js',
	    array( 'jquery' ), LEGACY_PRESCHOOL_KINDERGARTEN_VERSION,true );
	
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

}
add_action( 'wp_enqueue_scripts', 'legacy_preschool_kindergarten_scripts' );

function legacy_preschool_kindergarten_load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'legacy_preschool_kindergarten_load_dashicons_front_end' );

/**
 * Enqueue Editor styles.
 */
function legacy_preschool_kindergarten_enqueue_editor_block_styles() {
	// Enqueue editor styles.
	add_editor_style( trailingslashit( get_template_directory_uri() ) . 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'legacy_preschool_kindergarten_enqueue_editor_block_styles' );

/**
 * Pattern categories.
 */
function legacy_preschool_kindergarten_register_block_pattern_category() {
	register_block_pattern_category(
		'legacy-preschool-kindergarten-banner',
		array(
			'label' => esc_html__( 'Banner', 'legacy-preschool-kindergarten' ),
		)
	);
	
	register_block_pattern_category(
		'legacy-preschool-kindergarten-product',
		array(
			'label' => esc_html__( 'Services', 'legacy-preschool-kindergarten' ),
		)
	);
}
add_action( 'init', 'legacy_preschool_kindergarten_register_block_pattern_category' );

/**
 * Add theme support for various features.
 */
function legacy_preschool_kindergarten_setup() {

	load_theme_textdomain( 'legacy-preschool-kindergarten', get_template_directory() . '/languages' );

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'legacy_preschool_kindergarten_setup' );

/**
 * Upgrade to Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'legacy-preschool-kindergarten-pro/class-customize.php' );

/**
 * Notices
 */
require_once get_parent_theme_file_path( '/activation-notice/class-welcome-notice.php' );

/**getstart*/
require get_template_directory() . '/legacy-preschool-kindergarten-get-theme-info.php';

if ( ! function_exists( 'legacy_preschool_kindergarten_admin_scripts' ) ) :
    function legacy_preschool_kindergarten_admin_scripts($hook) {
        wp_enqueue_style( 'legacy-preschool-kindergarten-get-theme-info-css', get_template_directory_uri() . '/assets/css/legacy-preschool-kindergarten-get-theme-info.css', false ); 
    }
endif;
add_action( 'admin_enqueue_scripts', 'legacy_preschool_kindergarten_admin_scripts' );