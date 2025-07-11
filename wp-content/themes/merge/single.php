<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$single_post_default_style = merge_get_theme_mod( 'single_post_default_style' );

if ( $single_post_default_style !== 'none' && $single_post_default_style !== 'default' ) {
	get_template_part( 'single-post', $single_post_default_style );
	return;
}

get_header();

while ( have_posts() ) : the_post();

	if ( post_password_required() ) {
		get_template_part( 'template-parts/content/content', 'protected' );
	} else {
		get_template_part( 'template-parts/single-post/layout/layout', 'style-1' );
	}

endwhile;

get_footer(); ?>