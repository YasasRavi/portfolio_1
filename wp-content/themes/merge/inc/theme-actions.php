<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'merge_register_sidebar' ) ) {
	function merge_register_sidebar() {

		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'merge' ),
			'id' => 'blog_sidebar',
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		if ( class_exists( 'VLThemesHelperPlugin' ) ) {

			register_sidebar( array(
				'name' => esc_html__( 'Offcanvas Sidebar', 'merge' ),
				'id' => 'offcanvas_sidebar',
				'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="vlt-widget__title">',
				'after_title' => '</h5>'
			) );

		}

		// custom sidebars
		if ( merge_get_theme_mod( 'custom_sidebars' ) ) {
			foreach ( merge_get_theme_mod( 'custom_sidebars' ) as $sidebar ) {
				if ( ! empty( $sidebar[ 'sidebar_title' ] && ! empty( $sidebar[ 'sidebar_description' ] ) ) ) {
					register_sidebar( array(
						'name' => esc_html( $sidebar[ 'sidebar_title' ] ),
						'id' => strtolower( trim( preg_replace( '/[^A-Za-z0-9-]+/', '_', $sidebar[ 'sidebar_title' ] ) ) ),
						'description' => esc_html( $sidebar[ 'sidebar_description' ] ),
						'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h5 class="vlt-widget__title">',
						'after_title' => '</h5>'
					) );
				}
			}
		}

	}
}
add_action( 'widgets_init', 'merge_register_sidebar' );

/**
 * Body open
 */
if ( ! function_exists( 'merge_wp_body_open' ) ) {
	function merge_wp_body_open() {

		// site protection
		$acf_page_custom_site_protection = merge_get_theme_mod( 'page_custom_site_protection', true );
		if ( merge_get_theme_mod( 'site_protection', $acf_page_custom_site_protection ) == 'show' && ! current_user_can( 'administrator' ) ) :
			echo '<div class="vlt-site-protection"><div>';
			echo wp_kses( merge_get_theme_mod( 'site_protection_content' ), 'merge_site_protection' );
			echo '</div></div>';
		endif;

		// preloader
		if ( merge_get_theme_mod( 'preloader' ) == 'enable' ) {
			echo '<div class="vlt-site-preloader">';
				echo '<div class="vlt-site-preloader__inner">';
					echo '<div class="vlt-preloader-cover">';
						echo '<div class="vlt-preloader-cover__bar">';
						echo '<div></div>';
						echo '</div>';
						echo '<div class="vlt-preloader-cover__number">';
						echo '<span>0%</span>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}

		if ( merge_get_theme_mod( 'noise') == 'show' ) {
			echo '<div class="vlt-noise"></div>';
		}

	}
}
add_action( 'wp_body_open', 'merge_wp_body_open' );

/**
 * Fake container
 */
if ( ! function_exists( 'merge_fake_container' ) ) {
	function merge_fake_container() {
		echo '<div class="container vlt-fake-container"></div>';
	}
}
add_action( 'wp_body_open', 'merge_fake_container' );

/**
 * Before site wrapper action
 */
if ( ! function_exists( 'merge_before_site' ) ) {
	function merge_before_site() {

		$class = 'vlt-site-wrapper';

		echo '<div class="' . merge_sanitize_class( $class ) . '">';

	}
}
add_action( 'merge/before_site', 'merge_before_site' );

/**
 * After site wrapper action
 */
if ( ! function_exists( 'merge_after_site' ) ) {
	function merge_after_site() {
		echo '</div>';
	}
}
add_action( 'merge/after_site', 'merge_after_site' );

/**
 * Change admin logo
 */
if ( ! function_exists( 'merge_change_admin_logo' ) ) {
	function merge_change_admin_logo() {
		if ( ! merge_get_theme_mod( 'login_logo_image' ) ) {
			return;
		}
		$image_url = merge_get_theme_mod( 'login_logo_image' );
		$image_w = merge_get_theme_mod( 'login_logo_image_width' );
		$image_h = merge_get_theme_mod( 'login_logo_image_height' );
		echo '<style type="text/css">
			h1 a {
				background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
				width:' . esc_attr( $image_w ) . '!important;
				height:' . esc_attr( $image_h ) . '!important;
				background-size: cover !important;
			}
		</style>';
	}
}
add_action( 'login_head', 'merge_change_admin_logo' );

/**
 * Prints Tracking code
 */
if ( ! function_exists( 'merge_print_tracking_code' ) ) {
	function merge_print_tracking_code() {
		$tracking_code = merge_get_theme_mod( 'tracking_code' );
		if ( ! empty( $tracking_code ) ) {
			echo '' . $tracking_code;
		}
	}
}
add_action( 'wp_head', 'merge_print_tracking_code' );