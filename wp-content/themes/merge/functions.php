<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

define( 'MERGE_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'MERGE_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'MERGE_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'merge_setup' ) ) {
	function merge_setup() {

		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Merge, use a find and replace
		* to change 'merge' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'merge', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

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

		add_theme_support( 'post-formats', array(
			'video',
			'audio'
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', 'merge' ),
					'shortName' => esc_html__( 'S', 'merge' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'merge' ),
					'shortName' => esc_html__( 'M', 'merge' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'merge' ),
					'shortName' => esc_html__( 'L', 'merge' ),
					'size' => 24,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'merge' ),
					'shortName' => esc_html__( 'XL', 'merge' ),
					'size' => 32,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Text', 'merge' ),
				'slug' => 'text',
				'color' => '#999999',
			),
			array(
				'name' => esc_html__( 'Light Gray', 'merge' ),
				'slug' => 'light-gray',
				'color' => '#E7E7E7',
			),
			array(
				'name' => esc_html__( 'White', 'merge' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'Black', 'merge' ),
				'slug' => 'black',
				'color' => '#181818',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'merge' ),
			'onepage-menu' => esc_html__( 'Onepage Menu', 'merge' )
		) );

		// 800x790
		add_image_size( 'merge-800x790_crop', 800, 790, true );
		add_image_size( 'merge-800x790', 800 );

		// 1280x853
		add_image_size( 'merge-1280x853_crop', 1280, 853, true );
		add_image_size( 'merge-1280x853', 1280 );

		// 1920x1080
		add_image_size( 'merge-1920x1080_crop', 1920, 1080, true );
		add_image_size( 'merge-1920x1080', 1920 );

		// 1920x960
		add_image_size( 'merge-1920x960_crop', 1920, 960, true );

	}
}
add_action( 'after_setup_theme', 'merge_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'merge_content_width' ) ) {
	function merge_content_width() {
		$GLOBALS[ 'content_width' ] = apply_filters( 'merge/content_width', 1220 );
	}
}
add_action( 'after_setup_theme', 'merge_content_width', 0 );

/**
 * Import ACF fields
 */
if ( ! MERGE_DEVELOPMENT ) {
	function merge_acf_show_admin_panel() {
		return apply_filters( 'merge/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'merge_acf_show_admin_panel' );
}

if ( ! MERGE_DEVELOPMENT ) {
	require_once MERGE_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'merge_acf_save_json' ) ) {
	function merge_acf_save_json( $path ) {
		$path = MERGE_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'merge_acf_save_json' );

if ( MERGE_DEVELOPMENT ) {
	if ( ! function_exists( 'merge_acf_load_json' ) ) {
		function merge_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = MERGE_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'merge_acf_load_json' );
}

/**
 * Include Kirki fields
 */
 /**
 * Include kirki fields
 */

add_action( 'init', function() {
	if ( class_exists( 'Kirki' ) ) {
		load_textdomain( 'kirki', WP_LANG_DIR . '/plugins/kirki-' . get_locale() . '.mo' );
	}
} );
require_once MERGE_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once MERGE_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';
require_once MERGE_REQUIRE_DIRECTORY . 'inc/framework/customizer-dynamic-css.php';

/**
 * Required files
 */
$merge_theme_includes = array(
	'required-plugins',
	'enqueue',
	'includes',
	'demo-import',
	'functions',
	'actions',
	'filters',
	'menus',
	'portfolio',
	'elementor'
);

foreach ( $merge_theme_includes as $file ) {
	require_once MERGE_REQUIRE_DIRECTORY . 'inc/theme-' . $file . '.php';
}

// Unset the global variable.
unset( $merge_theme_includes );