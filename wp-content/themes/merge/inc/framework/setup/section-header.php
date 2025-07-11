<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_type',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Layout', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'default' => esc_html__( 'Default', 'merge' ),
		'bar' => esc_html__( 'Bars', 'merge' )
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_2',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'merge' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_opaque',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Navigation Opaque', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!==',
			'value' => 'bar',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent_always',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent Always', 'merge' ),
	'description' => esc_html__( 'Transparent also after page scrolled down.', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!==',
			'value' => 'bar',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_sticky',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Sticky', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!==',
			'value' => 'bar',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_hide_on_scroll',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Hide on Scroll', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!==',
			'value' => 'bar',
		),
		array(
			'setting' => 'navigation_sticky',
			'operator' => '==',
			'value' => 'enable',
		)
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Search', 'merge' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'header_search_icon',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Search Icon', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_4',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Fullscreen Site', 'merge' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'site_fullscreen_icon',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Fullscreen Site Icon', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_6',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', 'merge' ),
	'priority' => $priority++,
	'default' => '',
	'choices' => [
		'save_as' => 'id'
	]
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_logo_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', 'merge' ),
	'priority' => $priority++,
	'default' => '32px',
	'output' => array(
		array(
			'element' => '.vlt-bar-logo img, .vlt-navbar-logo img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_7',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Contacts', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'header_contacts',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Contacts', 'merge' ),
	'priority' => $priority++,
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'contact', 'merge' )
	),
	'fields' => array(
		'contact_text' => array(
			'type' => 'text',
			'label' => esc_html__( 'Text', 'merge' )
		),
		'contact_url' => array(
			'type' => 'text',
			'label' => esc_html__( 'Url', 'merge' )
		),
	),
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_8',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'header_social_list',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Social List', 'merge' ),
	'description' => esc_html__( 'Social icons is shown only for some styles of menu. (It works for aside, offcanvas and slide menus)', 'merge' ),
	'priority' => $priority++,
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'social', 'merge' )
	),
	'fields' => array(
		'social_icon' => array(
			'type' => 'select',
			'label' => esc_html__( 'Social Icon', 'merge' ),
			'choices' => merge_get_social_icons()
		),
		'social_url' => array(
			'type' => 'link',
			'label' => esc_html__( 'Social Url', 'merge' )
		),
	),
	'default' => ''
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_9',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Info', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'header_copyright',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Copyright', 'merge' ),
	'priority' => $priority++,
	'default' => '© Copyright %s',
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'local_time_format',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Local Time Format', 'merge' ),
	'priority' => $priority++,
	'default' => 'hh:mm A z',
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'local_time_offset',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Time Offset', 'merge' ),
	'priority' => $priority++,
	'default' => '+01:00',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_11',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Marqueue Lines', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'marqueue_text',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Marqueue Text', 'merge' ),
	'priority' => $priority++,
	'default' => 'Lets create smth new together',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_12',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Menu Sounds', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'menu_toggle_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Menu Toggle Sound', 'merge' ),
	'description' => esc_html__( 'Sounds when you open / close menu.', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'open_click_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Audio for "Open Menu"', 'merge' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'menu_toggle_sound',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'close_click_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Audio for "Close Menu"', 'merge' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'menu_toggle_sound',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );

/**
 * Offcanvas menu
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'som_1',
	'section' => 'section_offcanvas_menu',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Offcanvas Menu', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'offcanvas_menu_locales',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Locales Show', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'offcanvas_menu_subscribe',
	'section' => 'section_offcanvas_menu',
	'label' => esc_html__( 'Subscribe Form', 'merge' ),
	'tooltip' => esc_html__( 'Shortcode', 'merge' ),
	'priority' => $priority++,
	'default' => '',
) );