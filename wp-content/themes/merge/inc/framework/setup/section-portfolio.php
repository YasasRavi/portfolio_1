<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Portfolio Single
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sps_1',
	'section' => 'section_single_portfolio',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'work_navigation',
	'section' => 'section_single_portfolio',
	'label' => esc_html__( 'Work Navigation', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'work_navigation_style',
	'section' => 'section_single_portfolio',
	'label' => esc_html__( 'Navigation Style', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'style-1' => esc_html__( 'Style 1', 'merge' ),
		'style-2' => esc_html__( 'Style 2', 'merge' )
	),
	'default' => 'style-1',
	'active_callback' => array(
		array(
			'setting' => 'work_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'dropdown-pages',
	'settings' => 'portfolio_link',
	'section' => 'section_single_portfolio',
	'label' => esc_html__( 'Portfolio Link', 'merge' ),
	'tooltip' => esc_html__( 'For back button.', 'merge' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'work_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );