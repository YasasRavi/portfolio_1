<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * General
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_1',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Colors', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'accent_color',
	'section' => 'core_general',
	'label' => esc_html__( 'Accent Color', 'merge' ),
	'priority' => $priority++,
	'default' => '#DFF314'
) );

VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'body_background',
	'section' => 'core_general',
	'label' => esc_html__( 'Body Background', 'merge' ),
	'description' => esc_html__( 'Select background for body.', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'background-color' => '#181818',
		'background-image' => '',
		'background-repeat' => 'repeat',
		'background-position' => 'center center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'preloader',
	'section' => 'core_general',
	'label' => esc_html__( 'Preloader', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' )
	),
	'default' => 'enable'
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_3',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'border_radius',
	'section' => 'core_general',
	'label' => esc_html__( 'Border Radius', 'merge' ),
	'priority' => $priority++,
	'default' => '4px',
	'output' => array(
		array(
			'element' => ':root',
			'property' => '--vlt-border-radius',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_cursor',
	'section' => 'core_general',
	'label' => esc_html__( 'Custom Cursor', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'merge' ),
		'enable' => esc_html__( 'Enable', 'merge' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'noise',
	'section' => 'core_general',
	'label' => esc_html__( 'Noise', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'hide' => esc_html__( 'Hide', 'merge' ),
		'show' => esc_html__( 'Show', 'merge' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_cursor',
	'section' => 'core_general',
	'label' => esc_html__( 'Custom Cursor', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'merge' ),
		'enable' => esc_html__( 'Enable', 'merge' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'tracking_code',
	'section' => 'core_general',
	'label' => esc_html__( 'Tracking Code', 'merge' ),
	'description' => esc_html__( 'Copy and paste your tracking code here.', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Background Audio
 */
VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'background_audio',
	'section' => 'core_background_audio',
	'label' => esc_html__( 'Background Audio', 'merge' ),
	'priority' => $priority++,
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'background_audio_state',
	'section' => 'core_background_audio',
	'label' => esc_html__( 'Audio State', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'mute' => esc_html__( 'Mute', 'merge' ),
		'unmute' => esc_html__( 'Unmute', 'merge' )
	),
	'default' => 'unmute',
	'active_callback' => array(
		array(
			'setting' => 'background_audio',
			'operator' => '!==',
			'value' => '',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'number',
	'settings' => 'background_audio_volume',
	'section' => 'core_background_audio',
	'label' => esc_html__( 'Audio Volume', 'merge' ),
	'priority' => $priority++,
	'default' => 0.05,
	'choices' => [
		'min' => 0,
		'max' => 1,
		'step' => 0.025,
	],
	'active_callback' => array(
		array(
			'setting' => 'background_audio',
			'operator' => '!==',
			'value' => '',
		)
	),
) );

/**
 * Site Protection
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'csp_1',
	'section' => 'core_site_protection',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Click Copyright', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'site_protection',
	'section' => 'core_site_protection',
	'label' => esc_html__( 'Site Protection', 'merge' ),
	'tooltip' => esc_html__( 'It works for all visitors except administrator. You can check it in "Incognito Mode".', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'site_protection_content',
	'section' => 'core_site_protection',
	'label' => esc_html__( 'Content', 'merge' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'site_protection',
			'operator' => '==',
			'value' => 'show'
		)
	)
) );

/**
 * Selection
 */
VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Text Color', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => false
	),
	'default' => '#181818',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
			'suffix' => '!important'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Background Color', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => true
	),
	'default' => '#DFF314',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important'
		)
	)
) );

/**
 * Scrollbar
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Track Color', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => true
	),
	'default' => '#222222',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Color', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => false
	),
	'default' => '#DFF314',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar-thumb',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Width', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '1'
	),
	'default' => '5',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'width',
			'units' => 'px'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

/**
 * Custom sidebars
 */
VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'custom_sidebars',
	'section' => 'core_sidebars',
	'label' => esc_attr__( 'Custom Sidebars', 'merge' ),
	'description' => esc_html__( 'Create new sidebars and use them later via the page builder for different areas.', 'merge' ),
	'row_label' => array(
		'type' => 'field',
		'field' => 'sidebar_title',
		'value' => esc_attr__( 'Custom Sidebar', 'merge' ),
	),
	'button_label' => esc_attr__( 'Add new sidebar area', 'merge' ),
	'default' => '',
	'fields' => array(
		'sidebar_title' => array(
			'type' => 'text',
			'label' => esc_attr__( 'Sidebar Title', 'merge' ),
			'default' => '',
		),
		'sidebar_description' => array(
			'type' => 'textarea',
			'label' => esc_attr__( 'Sidebar Description', 'merge' ),
			'default' => '',
		),
	)
));

/**
 * Admin logo
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Authorization Logo', 'merge' ),
	'priority' => $priority++,
	'default' => $theme_path_images . 'vlthemes.png',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Height', 'merge' ),
	'priority' => $priority++,
	'default' => '115px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Width', 'merge' ),'priority' => $priority++,
	'default' => '102px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );