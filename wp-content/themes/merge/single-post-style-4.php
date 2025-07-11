<?php

/**
 * Template Name: Style 4
 * Template Post Type: post
 * @author: VLThemes
 * @version: 1.0.1
 */

get_header();

while ( have_posts() ) : the_post();

	if ( post_password_required() ) {
		get_template_part( 'template-parts/content/content', 'protected' );
	} else {
		get_template_part( 'template-parts/single-post/layout/layout', 'style-4' );
	}

endwhile;

get_footer(); ?>