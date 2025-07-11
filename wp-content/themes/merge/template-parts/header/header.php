<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_header = merge_get_theme_mod( 'page_custom_navigation', true );

if ( merge_get_theme_mod( 'navigation_show', $acf_header ) == 'show' ) {
	get_template_part( 'template-parts/header/header', merge_get_theme_mod( 'navigation_type', $acf_header ) );
	get_template_part( 'template-parts/header/header', 'mobile' );
}

if ( merge_get_theme_mod( 'header_search_icon' ) == 'show' ) {
	get_template_part( 'template-parts/header/partials/partial', 'popup-search' );
}

get_template_part( 'template-parts/header/partials/partial-offcanvas', 'menu' );
get_template_part( 'template-parts/header/partials/partial-offcanvas', 'menu-right' );

get_template_part( 'template-parts/header/partials/partial-offcanvas', 'sidebar' );

?>

<div class="vlt-site-overlay" data-cursor="close"></div>
<!-- /.vlt-site-overlay -->