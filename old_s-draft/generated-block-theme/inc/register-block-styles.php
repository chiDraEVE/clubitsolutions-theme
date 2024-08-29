<?php
/**
 * Block styles.
 *
 * @package clubitsolutions-theme
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function clubitsolutions_theme_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'clubitsolutions-theme-flat-button',
			'label' => __( 'Flat button', 'clubitsolutions-theme' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'clubitsolutions-theme-shadow-button',
			'label' => __( 'Button with shadow', 'clubitsolutions-theme' ),
		)
	);
}
add_action( 'init', 'clubitsolutions_theme_register_block_styles' );
