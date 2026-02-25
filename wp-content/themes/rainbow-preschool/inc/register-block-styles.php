<?php
/**
 * Block styles.
 *
 * @package rainbow-preschool
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function rainbow_preschool_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'rainbow-preschool-flat-button',
			'label' => __( 'Flat button', 'rainbow-preschool' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/list',
		array(
			'name'  => 'rainbow-preschool-list-underline',
			'label' => __( 'Underlined list items', 'rainbow-preschool' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/group',
		array(
			'name'  => 'rainbow-preschool-box-shadow',
			'label' => __( 'Box shadow', 'rainbow-preschool' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'  => 'rainbow-preschool-box-shadow',
			'label' => __( 'Box shadow', 'rainbow-preschool' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'  => 'rainbow-preschool-box-shadow',
			'label' => __( 'Box shadow', 'rainbow-preschool' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/details',
		array(
			'name'  => 'rainbow-preschool-plus',
			'label' => __( 'Plus & minus', 'rainbow-preschool' ),
		)
	);
}
add_action( 'init', 'rainbow_preschool_register_block_styles' );

/**
 * This is an example of how to unregister a core block style.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 * @see https://github.com/WordPress/gutenberg/pull/37580
 *
 * @since 1.0.0
 *
 * @return void
 */
function rainbow_preschool_unregister_block_style() {
	wp_enqueue_script(
		'rainbow-preschool-unregister',
		get_stylesheet_directory_uri() . '/assets/js/unregister.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		rainbow_preschool_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'rainbow_preschool_unregister_block_style' );
