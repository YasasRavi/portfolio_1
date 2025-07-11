<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_1',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_show',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Show', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_template',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Template', 'merge' ),
	'priority' => $priority++,
	'choices' => merge_get_elementor_templates(),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show'
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_fixed',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Fixed', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' )
	),
	'default' => 'disable',
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show'
		),
	)
) );