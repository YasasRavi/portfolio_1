<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_footer = merge_get_theme_mod( 'page_custom_footer', true );

if ( merge_get_theme_mod( 'footer_show', $acf_footer ) == 'show' ) {
	get_template_part( 'template-parts/footer/footer', 'template' );
}