<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( ! function_exists( 'merge_dynamic_css' ) ) {
	function merge_dynamic_css( $styles ) {

		$colors = merge_get_hsl_variables( '--vlt-color-accent', merge_get_theme_mod('accent_color') );
		$colors .= merge_get_hsl_variables( '--vlt-color-black', merge_get_theme_mod( 'body_background' )[ 'background-color' ] );
		$styles .= ':root {' . $colors . '}';

		return $styles;
	}
}
add_filter( 'kirki_merge_customize_dynamic_css', 'merge_dynamic_css' );