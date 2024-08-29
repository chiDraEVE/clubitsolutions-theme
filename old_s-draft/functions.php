<?php
/**
 * clubitsolutions-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clubitsolutions-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'clubitsolutions_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function clubitsolutions_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on clubitsolutions-theme, use a find and replace
		 * to change 'clubitsolutions-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'clubitsolutions-theme', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'clubitsolutions-theme' ),
			)
		);
		register_nav_menus(
			array(
				'menu-2' => esc_html__( 'Secondary', 'clubitsolutions-theme' ),
			)
		);
		register_nav_menus(
			array(
				'menu-social' => esc_html__( 'Social', 'clubitsolutions-theme' ),
			)
		);
		register_nav_menus(
			array(
				'menu-footer' => esc_html__( 'Footer', 'clubitsolutions-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'clubitsolutions_theme_custom_background_args',
				array(
					'default-color' => '121517ff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'clubitsolutions_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clubitsolutions_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clubitsolutions_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'clubitsolutions_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clubitsolutions_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'clubitsolutions-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'clubitsolutions-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar2', 'clubitsolutions-theme' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'clubitsolutions-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'clubitsolutions_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clubitsolutions_theme_scripts() {
	wp_enqueue_style('cousine-regular', get_template_directory_uri() . '/cousine.css');
	wp_enqueue_style('crimson-pro', get_template_directory_uri() . '/crimson-pro.css');
	wp_enqueue_style('libre-franklin', get_template_directory_uri() . '/libre-franklin.css');
	wp_enqueue_style('dancing-script', get_template_directory_uri() . '/dancing-script.css');
	
	
	wp_enqueue_style( 'clubitsolutions-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'clubitsolutions-theme-style', 'rtl', 'replace' );

//	wp_enqueue_script( 'clubitsolutions-theme-navigation', get_template_directory_uri() . '/assets/navigation.js', array
//	(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if (strstr($_SERVER['SERVER_NAME'], '.local') && true) {
		wp_enqueue_script( 'clubitsolutions-js', 'http://localhost:8080/index.js', array(),
			wp_get_theme()->get
			( 'Version' ) );
		wp_enqueue_script( 'clubitsolutions-style', 'http://localhost:8080/style.js', array(),
			wp_get_theme()->get
			( 'Version' ) );
	} else {
		wp_enqueue_style('clubitsolutions-style', get_template_directory_uri() . '/assets/style.css');
	}
}
add_action( 'wp_enqueue_scripts', 'clubitsolutions_theme_scripts' );
