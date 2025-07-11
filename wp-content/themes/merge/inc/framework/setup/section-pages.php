<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * Blog general
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'sticky_sidebar',
	'section' => 'section_blog_general',
	'label' => esc_html__( 'Sticky Sidebar', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'merge' ),
		'disable' => esc_html__( 'Disable', 'merge' )
	),
	'default' => 'disable',
) );

/**
 * Blog page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_1',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_type_pagination',
	'section' => 'section_blog',
	'label' => esc_html__( 'Type Pagination', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'none' => esc_html__( 'None', 'merge' ),
		'paged' => esc_html__( 'Paged', 'merge' ),
		'numeric' => esc_html__( 'Numeric', 'merge' )
	),
	'default' => 'numeric',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_2',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'blog_title',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Title', 'merge' ),
	'priority' => $priority++,
	'default' => esc_html__( 'Recent News', 'merge' ),
) );

/**
 * Archive page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sa_1',
	'section' => 'section_archive',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_type_pagination',
	'section' => 'section_archive',
	'label' => esc_html__( 'Type Pagination', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'none' => esc_html__( 'None', 'merge' ),
		'paged' => esc_html__( 'Paged', 'merge' ),
		'numeric' => esc_html__( 'Numeric', 'merge' )
	),
	'default' => 'numeric',
) );

/**
 * Search page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ss_1',
	'section' => 'section_search',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_type_pagination',
	'section' => 'section_search',
	'label' => esc_html__( 'Type Pagination', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'none' => esc_html__( 'None', 'merge' ),
		'paged' => esc_html__( 'Paged', 'merge' ),
		'numeric' => esc_html__( 'Numeric', 'merge' )
	),
	'default' => 'numeric',
) );

/**
 * Single post
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'single_post_default_style',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Default Style', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'none' => esc_html__( 'None', 'merge' ),
		'default' => esc_html__( 'Style 1', 'merge' ),
		'style-2' => esc_html__( 'Style 2', 'merge' ),
		'style-3' => esc_html__( 'Style 3', 'merge' ),
		'style-4' => esc_html__( 'Style 4', 'merge' ),
		'style-5' => esc_html__( 'Style 5', 'merge' ),
		'style-6' => esc_html__( 'Style 6', 'merge' ),
		'style-7' => esc_html__( 'Style 7', 'merge' )
	),
	'default' => 'none',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'about_author',
	'section' => 'section_single_post',
	'label' => esc_html__( 'About Author', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_views',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Views', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_post',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Share', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'also_like_posts',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Also Like Posts', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_2',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_navigation',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Navigation', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', 'merge' ),
		'hide' => esc_html__( 'Hide', 'merge' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_navigation_style',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Navigation Style', 'merge' ),
	'priority' => $priority++,
	'choices' => array(
		'style-1' => esc_html__( 'Style 1', 'merge' ),
		'style-2' => esc_html__( 'Style 2', 'merge' )
	),
	'default' => 'style-2',
	'active_callback' => array(
		array(
			'setting' => 'post_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'dropdown-pages',
	'settings' => 'blog_link',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Blog Link', 'merge' ),
	'tooltip' => esc_html__( 'For back button.', 'merge' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'post_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

/**
 * Page 404
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_title',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Title', 'merge' ),
	'priority' => $priority++,
	'default' => 'Page not found!',
) );

VLT_Options::add_field( array(
	'type' => 'textarea',
	'settings' => 'error_subtitle',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Subtitle', 'merge' ),
	'priority' => $priority++,
	'default' => 'Accidents happen, but feel free to use the navigation menu to find out more exciting benefits that can help you grow.',
) );

/**
 * Page protected
 */
VLT_Options::add_field( array(
	'type' => 'background',
	'settings' => 'protected_page_background',
	'section' => 'section_protected_page',
	'label' => esc_html__( 'Background', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'background-color' => '',
		'background-image' => '',
		'background-repeat' => 'no-repeat',
		'background-position' => 'top center',
		'background-size' => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element' => '.vlt-content-protected'
		),
	),
) );