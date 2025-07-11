<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Enqueue assets
 */
if ( ! class_exists( 'MergeThemeEnqueueAssets' ) ) {
	class MergeThemeEnqueueAssets {

		/**
		 * Assets Dir
		 * @var $assets_dir
		 */
		public $assets_dir;

		/**
		 * Customizer Frontend CSS
		 * @var $customizer_frontend_css
		 */
		public $customizer_frontend_css;

		/**
		 * Customizer Editor CSS
		 * @var $customizer_editor_css
		 */
		public $customizer_editor_css;

		/**
		 * Theme Version
		 * @var $theme_version
		 */
		public $theme_version;

		public function __construct() {
			$theme_info = wp_get_theme();
			$this->assets_dir = MERGE_THEME_DIRECTORY . 'assets/';
			$this->customizer_frontend_css = MERGE_THEME_DIRECTORY . 'inc/framework/customizer-frontend.css';
			$this->customizer_editor_css = MERGE_THEME_DIRECTORY . 'inc/framework/customizer-editor.css';
			$this->theme_version = $theme_info[ 'Version' ];
			$this->init_assets();
		}

		public function fonts_url() {
			$fonts_url = '';
			$fonts = [];
			$display = 'swap';
			$fonts[] = 'DM+Sans:wght@400;500;700';

			if ( $fonts ) {
				$fonts_url = add_query_arg( array(
					'family' => implode( '&family=', $fonts ),
					'display' => urlencode( $display )
				), 'https://fonts.googleapis.com/css2?family=' );
			}

			return $fonts_url;
		}

		public function init_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'wp_default_scripts', array( $this, 'enqueue_default_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_gutenberg_editor_styles' ) );
		}

		public function enqueue_default_scripts( $wp_scripts ) {

			if ( is_admin() ) {
				return;
			}

			if ( merge_get_theme_mod( 'jquery_in_footer' ) == 'disable' ) {
				return;
			}

			$wp_scripts->add_data( 'jquery', 'group', 1 );
			$wp_scripts->add_data( 'jquery-core', 'group', 1 );
			$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );

		}

		public function enqueue_frontend_scripts() {

			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue default scripts
			wp_enqueue_script( 'imagesloaded' );

			if ( merge_get_theme_mod( 'google_map_api_key' ) ) {
				$api = 'https://maps.googleapis.com/maps/api/js';
				$map_key = merge_get_theme_mod( 'google_map_api_key' );
				if ( false != $map_key ) {
					$arr_params = array(
						'key' => $map_key,
					);
					$api = esc_url( add_query_arg( $arr_params, $api ) );
				}
				wp_enqueue_script( 'gmap-api-key', $api, null, null, false );
			}

			// Enqueue theme scripts
			wp_enqueue_script( 'animsition', $this->assets_dir . 'vendors/js/animsition.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fitvids', $this->assets_dir . 'vendors/js/fitvids.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'gsap', $this->assets_dir . 'vendors/js/gsap.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'ScrollTrigger', $this->assets_dir . 'vendors/js/ScrollTrigger.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'howler', $this->assets_dir . 'vendors/js/howler.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'isotope', $this->assets_dir . 'vendors/js/isotope.pkgd.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jarallax', $this->assets_dir . 'vendors/js/jarallax.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jarallax-video', $this->assets_dir . 'vendors/js/jarallax-video.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fittext', $this->assets_dir . 'vendors/js/index.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'jquery-numerator', $this->assets_dir . 'vendors/js/jquery-numerator.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'countdown', $this->assets_dir . 'vendors/js/jquery.countdown.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fancybox', $this->assets_dir . 'vendors/js/jquery.fancybox.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'inview', $this->assets_dir . 'vendors/js/jquery.inview.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'justified-gallery', $this->assets_dir . 'vendors/js/jquery.justifiedGallery.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'lax', $this->assets_dir . 'vendors/js/lax.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'morphext', $this->assets_dir .'vendors/js/morphext.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'plyr', $this->assets_dir . 'vendors/js/plyr.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'popper', $this->assets_dir . 'vendors/js/popper.js', [], $this->theme_version );
			wp_enqueue_script( 'sharer', $this->assets_dir . 'vendors/js/sharer.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir . 'vendors/js/superclick.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superfish', $this->assets_dir . 'vendors/js/superfish.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'swiper-bundle', $this->assets_dir . 'vendors/js/swiper-bundle.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'swiper-gl', $this->assets_dir . 'extensions/swiper-gl.min.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'tilt', $this->assets_dir . 'vendors/js/tilt.jquery.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'tippy', $this->assets_dir . 'vendors/js/tippy-bundle.umd.js', [ 'jquery' ], $this->theme_version );
			wp_enqueue_script( 'typed', $this->assets_dir .'vendors/js/typed.umd.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'clipboard', $this->assets_dir .'vendors/js/clipboard.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'splitting', $this->assets_dir .'vendors/js/splitting.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'CustomEase', $this->assets_dir . 'vendors/js/CustomEase.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'moment', $this->assets_dir . 'vendors/js/moment.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'pagepiling', $this->assets_dir . 'vendors/js/jquery.pagepiling.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue theme helper script
			wp_enqueue_script( 'vlt-helpers', $this->assets_dir . 'scripts/helpers.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue controllers
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir . 'scripts/controllers.min.js', [ 'jquery' ], $this->theme_version, true );

			// Localize the script with new data
			$controllers_datas = [
				'arrow_left' => merge_get_icon( 'arrow-left' ),
				'arrow_right' => merge_get_icon( 'arrow-right' ),
				'close' => merge_get_icon( 'close' ),
				'dot' => merge_get_icon( 'dot' ),
				'star_fill' => merge_get_icon( 'star-fill' ),
				'circle_highlight' => merge_get_icon( 'circle-highlight' ),
				'wave_highlight' => merge_get_icon( 'wave-highlight' ),
			];

			if ( merge_get_theme_mod( 'local_time_format' ) && merge_get_theme_mod( 'local_time_offset' ) ) {
				$controllers_datas[ 'time_format' ] = merge_get_theme_mod( 'local_time_format' );
				$controllers_datas[ 'utc_offset' ] = merge_get_theme_mod( 'local_time_offset' );
			}

			if ( merge_get_theme_mod( 'menu_toggle_sound' ) == 'enable' ) {

				if ( merge_get_theme_mod( 'core_background_audio' ) ) {
					$controllers_datas[ 'open_click_sound' ] = merge_get_theme_mod( 'open_click_sound' );
				}

				if ( merge_get_theme_mod( 'close_click_sound' ) ) {
					$controllers_datas[ 'close_click_sound' ] = merge_get_theme_mod( 'close_click_sound' );
				}

			}

			wp_localize_script( 'vlt-controllers', 'VLT_LOCALIZE_DATAS', $controllers_datas );

			// Enqueue background audio
			wp_enqueue_script( 'vlt-background-audio', $this->assets_dir . 'scripts/background-audio.js', [ 'jquery', 'howler' ], $this->theme_version, false );

			$background_audio_datas = [
				'defaultValue' => merge_get_theme_mod( 'background_audio_state' ),
				'useLocalStorage' => true,
				'backgroundAudioAutoplay' => false,
				'backgroundAudioVolume' => merge_get_theme_mod( 'background_audio_volume' ),
			];

			if ( merge_get_theme_mod( 'background_audio' ) ) {
				$background_audio_datas[ 'backgroundAudio' ] = merge_get_theme_mod( 'background_audio' );
			}

			wp_localize_script( 'vlt-background-audio', 'VLT_BACKGROUND_AUDIO', $background_audio_datas );

		}

		public function enqueue_gutenberg_editor_styles() {
			wp_enqueue_style( 'vlt-gutenberg', $this->assets_dir . 'css/gutenberg-style.css', [], $this->theme_version );
		}

		public function enqueue_admin_styles() {

			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir . 'css/admin.min.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-editor', $this->fonts_url(), [], null );
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, [], $this->theme_version );
			}

		}

		public function enqueue_admin_scripts() {
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir . 'scripts/admin.js', [ 'jquery' ], $this->theme_version, true );
		}

		public function enqueue_frontend_styles() {

			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_style( 'animate', $this->assets_dir . 'vendors/css/animate.css', [], $this->theme_version );
			wp_enqueue_style( 'animsition', $this->assets_dir . 'vendors/css/animsition.css', [], $this->theme_version );
			wp_enqueue_style( 'fancybox', $this->assets_dir . 'vendors/css/jquery.fancybox.css', [], $this->theme_version );
			wp_enqueue_style( 'justified-gallery', $this->assets_dir . 'vendors/css/justifiedGallery.css', [], $this->theme_version );
			wp_enqueue_style( 'morphext', $this->assets_dir . 'vendors/css/morphext.css', [], $this->theme_version );
			wp_enqueue_style( 'plyr', $this->assets_dir . 'vendors/css/plyr.css', [], $this->theme_version );
			wp_enqueue_style( 'swiper-bundle', $this->assets_dir . 'vendors/css/swiper-bundle.css', [], $this->theme_version );
			wp_enqueue_style( 'swiper-gl', $this->assets_dir . 'extensions/swiper-gl.min.css', [], $this->theme_version );
			wp_enqueue_style( 'gist-simple', $this->assets_dir . 'vendors/css/gist-simple.css', [], $this->theme_version );
			wp_enqueue_style( 'pagepiling', $this->assets_dir . 'vendors/css/jquery.pagepiling.css', [], $this->theme_version );
			wp_enqueue_style( 'tippy', $this->assets_dir . 'vendors/css/tippy.css', [], $this->theme_version );

			// Icons and fonts
			wp_enqueue_style( 'pp_hatton', $this->assets_dir . 'fonts/pp_hatton/pp_hatton.css', [], $this->theme_version );
			wp_enqueue_style( 'socicons', $this->assets_dir . 'fonts/socicons/socicon.css', [], $this->theme_version );

			wp_enqueue_style( 'vlt-main', $this->assets_dir . 'css/main.min.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-frontend', $this->fonts_url(), [], null );
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, [], $this->theme_version );
			}

		}

	}

	new MergeThemeEnqueueAssets;

}