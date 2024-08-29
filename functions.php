<?php

	require get_theme_file_path('/inc/portfolio.php');
	require get_theme_file_path('/inc/utilities.php');
	require get_theme_file_path('/inc/to-the-top.php');

/**
 * Twentytwenty-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twentytwenty-child
 */

add_action( 'wp_enqueue_scripts', 'twentytwenty_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function twentytwenty_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'twentytwenty-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'twentytwenty-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentytwenty-style' )
	);

}

	function clubitsolutions_files() {
		wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato');
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

		if (strstr($_SERVER['SERVER_NAME'], 'clubitsolutions.local')) {
			wp_enqueue_script('clubitsolutions-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(),
				true);
//			wp_enqueue_style('clubitsolutions_styles', get_stylesheet_uri(), NULL, microtime());
		} else {
			wp_enqueue_script('clubitsolutions-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '0.1', true);
			wp_enqueue_style('clubitsolutions_styles', get_stylesheet_uri(), NULL,'0.1');
		}
//		wp_localize_script('clubitsolutions-js', 'clubitsolutionsData', array(
//			'root_url' => get_site_url()
//		));
	}

	add_action('wp_enqueue_scripts', 'clubitsolutions_files');

function allow_svgimg_types($mimetype) {
	$mimetype['svg'] = 'image/svg+xml';
	return $mimetype;
}
add_filter('upload_mimes', 'allow_svgimg_types');
