<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Advanced
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'jquery_in_footer',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Load jQuery in footer', 'merge' ),
	'description' => esc_html__( 'Solves render-blocking issue, however can cause plugin conflicts.', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'merge' ),
		'enable' => esc_html__( 'Enable', 'merge' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'acf_show_admin_panel',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Show ACF in Admin Panel', 'merge' ),
	'description' => esc_html__( 'This field enable tab for ACF Professional in your dashboard.', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'hide' => esc_html__( 'Hide', 'merge' ),
		'show' => esc_html__( 'Show', 'merge' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'mobile_status_bar_color',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Mobile Status Bar Colors', 'merge' ),
	'description' => esc_html__( 'Field for address bar or device status bar to match your brand colors.', 'merge' ),
	'priority' => $priority++,
	'default' => '#DFF314',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'comment_placement',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Comment Placement', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'top' => esc_html__( 'Top', 'merge' ),
		'bottom' => esc_html__( 'Bottom', 'merge' )
	),
	'default' => 'bottom',
) );
