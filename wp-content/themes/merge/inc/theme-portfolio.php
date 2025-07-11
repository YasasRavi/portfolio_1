<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Disable FontAwesome 5
 */
add_filter( 'vpf_enqueue_plugin_font_awesome', '__return_false' );

/**
 * Extend slider controls
 */
if ( ! function_exists( 'merge_extend_layout_slider_controls' ) ) {
	function merge_extend_layout_slider_controls( $controls ) {
		return array_merge( $controls, array(
			array(
				'alongside' => esc_html__( 'Stretch to container', 'merge' ),
				'name' => 'stretch_to_container',
				'type' => 'checkbox',
				'default' => false,
			),
			array(
				'type' => 'text',
				'label' => esc_html__( 'Navigation anchor', 'merge' ),
				'name' => 'navigation_anchor',
				'default' => '',
			)
		) );
	}
}
add_filter( 'vpf_extend_layout_slider_controls', 'merge_extend_layout_slider_controls' );

/**
 * Add data attributes
 */
if ( ! function_exists( 'merge_vpf_extend_portfolio_data_attributes' ) ) {
	function merge_vpf_extend_portfolio_data_attributes( $attrs, $options ) {
		$attrs[ 'data-vp-slider-stretch-to-container' ] = $options[ 'slider_stretch_to_container' ] ? 'true' : 'false';
		$attrs[ 'data-vp-slider-navigation-anchor' ] = $options[ 'slider_navigation_anchor' ] ? $options[ 'slider_navigation_anchor' ] : '';
		return $attrs;
	}
}
add_filter( 'vpf_extend_portfolio_data_attributes', 'merge_vpf_extend_portfolio_data_attributes', 10, 2 );

/**
 * Add new item styles
 */
if ( ! function_exists( 'merge_vpf_extend_items_styles' ) ) {
	function merge_vpf_extend_items_styles( $items_styles ) {

		$custom_style = [];

		$custom_style[ 'merge_post_style_1' ] = array(
			'title' => esc_html__( 'Post 1', 'merge' ),
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"><g fill="none" fill-rule="evenodd" transform="translate(1 1)"><rect width="18.5" height="18.625" stroke="#000" stroke-width="1.5" rx="1.25"/><path fill="#000" fill-rule="nonzero" d="M6.11 14.91l.9-2.69h4.101l.906 2.69h2.11L10.28 4H7.84L4 14.91h2.11zm4.468-4.278H7.542l1.476-4.395h.085l1.475 4.395z"/></g></svg>',
			'builtin_controls' => array(
				'show_title' => false,
				'show_categories' => false,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			),
			'controls' => array(
				array(
					'type' => 'range',
					'label' => esc_html__( 'Excerpt Length', 'merge' ),
					'name' => 'post_excerpt',
					'min' => 1,
					'max' => 200,
					'step' => 1,
					'default' => 30,
				)
			)
		);

		$custom_style[ 'merge_post_style_2' ] = array(
			'title' => esc_html__( 'Post 2', 'merge' ),
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"><g fill="none" fill-rule="evenodd" transform="translate(1 1)"><rect width="18.5" height="18.625" stroke="#000" stroke-width="1.5" rx="1.25"/><path fill="#000" fill-rule="nonzero" d="M6.11 14.91l.9-2.69h4.101l.906 2.69h2.11L10.28 4H7.84L4 14.91h2.11zm4.468-4.278H7.542l1.476-4.395h.085l1.475 4.395z"/></g></svg>',
			'builtin_controls' => array(
				'show_title' => false,
				'show_categories' => false,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			)
		);

		$custom_style[ 'merge_work_style_1' ] = array(
			'title' => esc_html__( 'Work 1', 'merge' ),
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21"><path stroke="#000" stroke-width="1.5" d="M18.716 1H2.284A1.28 1.28 0 0 0 1 2.275v16.45A1.28 1.28 0 0 0 2.284 20h16.432A1.28 1.28 0 0 0 20 18.725V2.275A1.28 1.28 0 0 0 18.716 1Z"/><path fill="#000" d="M5 16V5h1.974l4.124 6.506-1.132-.016L14.124 5H16v11h-2.054v-4.117c0-.953.021-1.807.064-2.562.054-.764.14-1.519.26-2.262l.258.66-3.51 5.28H9.934L6.52 7.78l.226-.722c.119.701.2 1.424.243 2.168.054.744.08 1.63.08 2.656V16H5Z"/></svg>',
			'builtin_controls' => array(
				'images_rounded_corners' => true,
				'show_title' => true,
				'show_categories' => true,
				'show_date' => false,
				'show_author' => false,
				'show_comments_count' => false,
				'show_views_count' => false,
				'show_reading_time' => false,
				'show_excerpt' => false,
				'show_icons' => false,
			)
		);

		$custom_style[ 'merge_work_instagram' ] = array(
			'title' => esc_html__( 'Instagram', 'merge' ),
			'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21"><path stroke="#000" stroke-width="1.5" d="M18.716 1H2.284A1.28 1.28 0 0 0 1 2.275v16.45A1.28 1.28 0 0 0 2.284 20h16.432A1.28 1.28 0 0 0 20 18.725V2.275A1.28 1.28 0 0 0 18.716 1Z"/><path fill="#000" d="M5 16V5h1.974l4.124 6.506-1.132-.016L14.124 5H16v11h-2.054v-4.117c0-.953.021-1.807.064-2.562.054-.764.14-1.519.26-2.262l.258.66-3.51 5.28H9.934L6.52 7.78l.226-.722c.119.701.2 1.424.243 2.168.054.744.08 1.63.08 2.656V16H5Z"/></svg>',
			'builtin_controls' => array(
				'images_rounded_corners' => true,
				'show_title' => false,
				'show_categories' => false,
				'show_date' => false,
				'show_excerpt' => false,
				'show_icons' => false,
				'align' => false,
			)
		);

		return array_merge( $items_styles, $custom_style );

	}
}
add_filter( 'vpf_extend_items_styles', 'merge_vpf_extend_items_styles' );

/**
 * Add new tiles
 */
if ( ! function_exists( 'merge_vpf_extend_tiles' ) ) {
	function merge_vpf_extend_tiles( $tiles ) {

		$tiles[] = array(
			'value' => '4|2,0.5|1,1|1,1|'
		);

		return $tiles;

	}
}
add_filter( 'vpf_extend_tiles', 'merge_vpf_extend_tiles' );