<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$priority = 0;

/**
 * General fonts
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--vlt-primary-font',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'secondary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Secondary Font', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'Piazzolla',
		'variant' => '500',
		'subsets' => [ 'latin' ],
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--vlt-secondary-font',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

/**
 * Body typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tt_1',
	'section' => 'typography_text',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Text Typography', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '1rem', // 16px
		'line-height' => '165%',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography_tablet',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1rem', // 16px
		'line-height' => '165%',
	),
	'output' => array(
		array(
			'element' => 'body',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography_phone',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1rem', // 16px
		'line-height' => '165%',
	),
	'output' => array(
		array(
			'element' => 'body',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Heading typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_1',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H1 Titles', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'Piazzolla',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '3.875rem', // 62px
		'line-height' => '130%',
		'letter-spacing' => '-0.04em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h1, .h1'
		),
		array(
			'element' => '.editor-block-list__block h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '3.875rem', // 62px
		'line-height' => '130%',
	),
	'output' => array(
		array(
			'element' => 'h1, .h1',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '3.875rem', // 62px
		'line-height' => '130%',
	),
	'output' => array(
		array(
			'element' => 'h1, .h1',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_2',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H2 Titles', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'Piazzolla',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '2.75rem', // 44px
		'line-height' => '130%',
		'letter-spacing' => '-0.03em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h2, .h2'
		),
		array(
			'element' => '.editor-block-list__block h2, .wp-block-heading h2.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '2.75rem', // 44px
		'line-height' => '130%',
	),
	'output' => array(
		array(
			'element' => 'h2, .h2',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '2.75rem', // 44px
		'line-height' => '130%',
	),
	'output' => array(
		array(
			'element' => 'h2, .h2',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_3',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H3 Titles', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'Piazzolla',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '2.25rem', // 36px
		'line-height' => '145%',
		'letter-spacing' => '-0.02em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h3, .h3'
		),
		array(
			'element' => '.editor-block-list__block h3, .wp-block-heading h3.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '2.25rem', // 36px
		'line-height' => '145%',
	),
	'output' => array(
		array(
			'element' => 'h3, .h3',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '2.25rem', // 36px
		'line-height' => '145%',
	),
	'output' => array(
		array(
			'element' => 'h3, .h3',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_4',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H4 Titles', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'Piazzolla',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '1.375rem', // 22px
		'line-height' => '155%',
		'letter-spacing' => '-0.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h4, .h4'
		),
		array(
			'element' => '.editor-block-list__block h4, .wp-block-heading h4.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.375rem', // 22px
		'line-height' => '155%',
	),
	'output' => array(
		array(
			'element' => 'h4, .h4',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.375rem', // 22px
		'line-height' => '155%',
	),
	'output' => array(
		array(
			'element' => 'h4, .h4',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_5',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H5 Titles', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '1.25rem', // 20px
		'line-height' => '145%',
		'letter-spacing' => '-0.04em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h5, .h5'
		),
		array(
			'element' => '.editor-block-list__block h5, .wp-block-heading h5.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.25rem', // 20px
		'line-height' => '145%',
	),
	'output' => array(
		array(
			'element' => 'h5, .h5',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.25rem', // 20px
		'line-height' => '145%',
	),
	'output' => array(
		array(
			'element' => 'h5, .h5',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_6',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H6 Titles', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '1.125rem', // 18px
		'line-height' => '145%',
		'letter-spacing' => '-0.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h6, .h6'
		),
		array(
			'element' => '.editor-block-list__block h6, .wp-block-heading h6.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.125rem', // 18px
		'line-height' => '145%',
	),
	'output' => array(
		array(
			'element' => 'h6, .h6',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.125rem', // 18px
		'line-height' => '145%',
	),
	'output' => array(
		array(
			'element' => 'h6, .h6',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Blockquote typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tb_1',
	'section' => 'typography_blockquote',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Blockquote', 'merge' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '1.375rem', // 22px
		'line-height' => '160%',
		'letter-spacing' => '-0.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'blockquote'
		),
		array(
			'element' => '.wp-block-quote, .wp-block-pullquote',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography_tablet',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.375rem', // 22px
		'line-height' => '160%',
	),
	'output' => array(
		array(
			'element' => 'blockquote',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography_phone',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'merge' ),
	'priority' => $priority++,
	'default' => array(
		'font-size' => '1.375rem', // 22px
		'line-height' => '160%',
	),
	'output' => array(
		array(
			'element' => 'blockquote',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Button typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_button',
	'section' => 'typography_buttons',
	'label' => esc_html__( 'Button Typography', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '700',
		'font-size' => '0.875rem', // 14px
		'line-height' => '1.5',
		'letter-spacing' => '0.03em',
		'text-transform' => 'uppercase'
	),
	'output' => array(
		array(
			'element' => '.vlt-btn'
		)
	)
) );

/**
 * Input typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_input',
	'section' => 'typography_input',
	'label' => esc_html__( 'Input Typography', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '1rem', // 16px
		'line-height' => '165%',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '
				input[type="text"],
				input[type="date"],
				input[type="email"],
				input[type="password"],
				input[type="tel"],
				input[type="url"],
				input[type="search"],
				input[type="number"],
				textarea,
				select
			'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_label',
	'section' => 'typography_input',
	'label' => esc_html__( 'Label Typography', 'merge' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '1.125rem', // 18px
		'line-height' => '140%',
		'letter-spacing' => '-0.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'label'
		)
	)
) );