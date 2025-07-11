<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'merge_tgm_plugins' ) ) {
	function merge_tgm_plugins() {

		$source = 'https://vlthemes.me/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'merge' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Merge Helper Plugin', 'merge' ),
				'slug' => 'merge_helper_plugin',
				'source' => esc_url( $source . 'merge_helper_plugin.zip' ),
				'required' => true,
				'version' => '1.0.1'
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields', 'merge' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Elementor Page Builder', 'merge' ),
				'slug' => 'elementor',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Visual Portfolio', 'merge' ),
				'slug' => 'visual-portfolio',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'merge' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'GTranslate', 'merge' ),
				'slug' => 'gtranslate',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'merge' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Classic Widgets', 'merge' ),
				'slug' => 'classic-widgets',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'One Click Demo Import', 'merge' ),
				'slug' => 'one-click-demo-import',
				'required' => false,
			)
		);

		tgmpa( $plugins );
	}
}
add_action( 'tgmpa_register', 'merge_tgm_plugins' );

/**
 * Print notice if helper plugin is not installed
 */
if ( ! function_exists( 'merge_helper_plugin_notice' ) ) {
	function merge_helper_plugin_notice() {
		if ( class_exists( 'VLThemesHelperPlugin' ) ) {
			return;
		}
		echo '<div class="notice notice-info is-dismissible"><p>' . sprintf( __( 'Please activate <strong>%s</strong> before your work with this theme.', 'merge' ), 'Merge Helper Plugin' ) . '</p></div>';
	}
}
add_action( 'admin_notices', 'merge_helper_plugin_notice' );