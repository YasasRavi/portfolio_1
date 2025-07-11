<?php

/**
 * Plugin Name: Merge Helper Plugin
 * Plugin URI: https://vlthemes.me/
 * Description: Merge Helper Plugin expands the functionality of the theme. Adds new icons, widgets and much more.
 * Version: 1.0.1
 * Author: VLThemes
 * Author URI: http://themeforest.net/user/vlthemes
 * License: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: vlthemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'VLThemesHelperPlugin' ) ) {

	class VLThemesHelperPlugin {

		/**
		 * Path to the plugin directory
		 * @var $plugin_path
		 */
		public $plugin_path;

		/**
		 * URL to the plugin directory
		 * @var $plugin_url
		 */
		public $plugin_url;

		/**
		 * Plugin name
		 * @var $plugin_name
		 */
		public $plugin_name;

		/**
		 * Plugin version
		 * @var $plugin_version
		 */
		public $plugin_version;

		/**
		 * Plugin slug
		 * @var $plugin_slug
		 */
		public $plugin_slug;

		/**
		 * Theme ID
		 * @var $theme_id
		 */
		public $theme_id;

		/**
		 * Theme Slug
		 * @var $theme_slug
		 */
		public $theme_slug;

		/**
		 * Theme Name
		 * @var $theme_name
		 */
		public $theme_name;

		/**
		 * Theme Version
		 * @var $theme_version
		 */
		public $theme_version;

		/**
		 * Theme Author
		 * @var $theme_author
		 */
		public $theme_author;

		/**
		 * Theme Is Child
		 * @var $theme_is_child
		 */
		public $theme_is_child;

		/**
		 * The single class instance.
		 * @var $_instance
		 */
		private static $_instance = null;

		/**
		 * Main Instance
		 * Ensures only one instance of this class exists in memory at any one time.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
				self::$_instance->init_hooks();
				self::$_instance->theme_init();
				self::$_instance->init_option();
				self::$_instance->init_includes();
				self::$_instance->clear_expired_caches();
			}
			return self::$_instance;
		}

		public function __construct() {
			// We do nothing here!
		}

		/**
		 * Plugin init
		 */
		public function plugin_init() {
			$data = get_plugin_data( __FILE__ );
			$this->plugin_name = $data[ 'Name' ];
			$this->plugin_version = $data[ 'Version' ];
			$this->plugin_slug = 'vlthemes_helper_plugin';
		}

		/**
		 * Theme init
		 */
		public function theme_init() {
			$theme_info = wp_get_theme();
			$theme_parent = $theme_info->parent();
			if ( !empty( $theme_parent ) ) {
				$theme_info = $theme_parent;
			}
			$this->theme_slug = $theme_info->get_stylesheet();
			$this->theme_name = $theme_info[ 'Name' ];
			$this->theme_version = $theme_info[ 'Version' ];
			$this->theme_author = $theme_info[ 'Author' ];
			$this->theme_is_child = !empty( $theme_parent );
		}

		/**
		 * Init options
		 */
		public function init_option() {
			$this->plugin_path = plugin_dir_path( __FILE__ );
			$this->plugin_url = plugin_dir_url( __FILE__ );

			load_plugin_textdomain( 'vlthemes', false, $this->plugin_path . 'languages/' );
		}

		/**
		 * Init hooks
		 */
		public function init_hooks() {
			add_action( 'admin_init', [ $this, 'plugin_init' ] );
			add_action( 'widgets_init', [ $this, 'init_widgets' ] );
			add_filter( 'admin_body_class', [ $this, 'admin_body_class' ] );
			add_filter( 'vlthemes_fonts_choices', [ $this, 'kirki_fonts_choices' ] );

			// Process Elementor Blocks
			if ( defined( 'ELEMENTOR_PATH' ) ) {
				add_action( 'init', [ $this, 'init_elementor' ] );
			}
		}

		/**
		 * Add classes to the body
		 */
		public function admin_body_class( $classes ) {
			if ( function_exists( 'vlthemes_is_theme_activated' ) ) {
				if ( vlthemes_is_theme_activated() ) {
					$classes .= ' is-activated';
				} else {
					$classes .= ' is-not-activated';
				}
			}
			return $classes;
		}

		/**
		 * Init includes
		 */
		public function init_includes() {
			require_once $this->plugin_path . 'includes/dashboard/dashboard.php';
			require_once $this->plugin_path . 'includes/helper-functions.php';
			require_once $this->plugin_path . 'includes/acf-custom-fields.php';
			require_once $this->plugin_path . 'includes/vendors/custom-fonts/custom-fonts.php';
		}

		/**
		 * Init widgets
		 */
		public function init_widgets() {

			$widgets = [
				'about' => 'vlthemes_widget_about',
				'recent-posts' => 'vlthemes_widget_recent_posts',
				'popular-posts' => 'vlthemes_widget_popular_posts',
				'trending-posts' => 'vlthemes_widget_trending_posts',
				'socials' => 'vlthemes_widget_socials'
			];

			if ( class_exists( 'acf' ) ) {
				foreach ( $widgets as $key => $value ) {
					require_once $this->plugin_path . 'includes/widgets/' . sanitize_key( $key ) . '.php';
					register_widget( $value );
				}
			}

		}

		/**
		 * Init Elementor
		 */
		public function init_elementor() {
			require_once $this->plugin_path . 'includes/elementor/helper.php';
			require_once $this->plugin_path . 'includes/elementor/elementor.php';
			require_once $this->plugin_path . 'includes/elementor/group-control-image-size.php';
		}

		/**
		 * Get all options
		 */
		private function get_options() {
			$options_slug = 'vlthemes_helper_options';
			return unserialize( get_option( $options_slug, 'a:0:{}' ) );
		}

		/**
		 * Get option value
		 */
		public function get_option( $name, $default = null ) {
			$options = self::get_options();
			$name = sanitize_key( $name );
			return isset( $options[ $name ] ) ? $options[ $name ] : $default;
		}

		/**
		 * Update option
		 */
		public function update_option( $name, $value ) {
			$options_slug = 'vlthemes_helper_options';
			$options = self::get_options();
			$options[ sanitize_key( $name ) ] = $value;
			update_option( $options_slug, serialize( $options ) );
		}

		/**
		 * Get all caches
		 */
		private function get_caches() {
			$caches_slug = 'cache';
			return $this->get_option( $caches_slug, [] );
		}

		/**
		 * Set cache
		 */
		public function set_cache( $name, $value, $time = 3600 ) {
			if ( ! $time || $time <= 0 ) {
				return;
			}
			$caches_slug = 'cache';
			$caches = self::get_caches();

			$caches[ sanitize_key( $name ) ] = array(
				'value' => $value,
				'expired' => time() + ( (int) $time ? $time : 0 ),
			);
			$this->update_option( $caches_slug, $caches );
		}

		/**
		 * Get cache
		 */
		public function get_cache( $name, $default = null ) {
			$caches = self::get_caches();
			$name = sanitize_key( $name );
			return isset( $caches[ $name ][ 'value' ] ) ? $caches[ $name ][ 'value' ] : $default;
		}

		/**
		 * Clear cache
		 */
		public function clear_cache( $name ) {
			$caches_slug = 'cache';
			$caches = self::get_caches();
			$name = sanitize_key( $name );
			if ( isset( $caches[ $name ] ) ) {
				$caches[ $name ] = null;
				$this->update_option( $caches_slug, $caches );
			}
		}

		/**
		 * Clear all expired caches
		 */
		public function clear_expired_caches() {
			$caches_slug = 'cache';
			$caches = self::get_caches();
			foreach ( $caches as $k => $cache ) {
				if ( isset( $cache ) && isset( $cache[ 'expired' ] ) && $cache[ 'expired' ] < time() ) {
					$caches[ $k ] = null;
				}
			}
			$this->update_option( $caches_slug, $caches );
		}

		/**
		 * Add support wp-custom-fonts in Kirki
		 */
		public function kirki_fonts_choices( $settings = [] ) {

			$fonts_list = apply_filters( 'vlthemes_fonts_list', [] );

			if ( ! $fonts_list ) {
				return $settings;
			}

			$fonts_settings = [
				'fonts' => [
					'google' => [],
					'families' => isset( $fonts_list[ 'families' ] ) ? $fonts_list[ 'families' ] : null,
					'variants' => isset( $fonts_list[ 'variants' ] ) ? $fonts_list[ 'variants' ] : null
				]
			];

			$fonts_settings = array_merge( (array) $fonts_settings, (array) $settings );

			return $fonts_settings;
		}

	}

	function vlthemes_helper_plugin() {
		return VLThemesHelperPlugin::instance();
	}
	vlthemes_helper_plugin();

}