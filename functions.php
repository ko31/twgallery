<?php
/**
 * twgallery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twgallery
 */

if ( ! function_exists( 'twgallery_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twgallery_setup() {

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
		register_nav_menus( array(
			'menu-header' => esc_html__( 'ヘッダーメニュー', 'twgallery' ),
			'menu-footer' => esc_html__( 'フッターメニュー', 'twgallery' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'twgallery_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'twgallery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twgallery_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twgallery_content_width', 640 );
}

add_action( 'after_setup_theme', 'twgallery_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twgallery_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'googleapis', 'https://fonts.googleapis.com/css?family=Noto+Serif+JP' );
	wp_enqueue_style( 'twgallery', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri().'/vendor/jquery/jquery.min.js', array() );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js', array() );
	wp_enqueue_script( 'quicksearch', get_stylesheet_directory_uri().'/assets/js/jquery.quicksearch.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'script', get_stylesheet_directory_uri().'/assets/js/script.js', array( 'quicksearch' ) );
}

add_action( 'wp_enqueue_scripts', 'twgallery_scripts' );

/**
 * Include custom library for this theme.
 */
foreach ( [ 'inc', 'inc/plugins' ] as $dir_name ) {
	$dir = __DIR__ . '/' . $dir_name;
	if ( is_dir( $dir ) ) {
		foreach ( scandir( $dir ) as $file ) {
			if ( preg_match( '#^[^._].*\.php$#u', $file ) ) {
				require $dir . '/' . $file;
			}
		}
	}
}
