<?php

/**
 * @author: VLThemes
 * @version: 1.0.3
 */

/**
 * ACF in Admin Panel
 */
if ( ! function_exists( 'merge_acf_in_admin_panel' ) ) {
	function merge_acf_in_admin_panel() {
		return merge_get_theme_mod( 'acf_show_admin_panel' ) == 'show' ? true : false;
	}
}
add_filter( 'merge/acf_show_admin_panel', 'merge_acf_in_admin_panel' );

/**
 * Add body class
 */
if ( ! function_exists( 'merge_add_body_class' ) ) {
	function merge_add_body_class( $classes ) {
		$classes[] = '';
		if ( ! wp_is_mobile() ) {
			$classes[] = 'no-mobile';
		} else {
			$classes[] = 'is-mobile';
		}
		return $classes;
	}
}
add_filter( 'body_class', 'merge_add_body_class' );

/**
 * Add html class
 */
if ( ! function_exists( 'merge_add_html_class' ) ) {
	function merge_add_html_class( $classes = '' ) {

		// header
		$acf_header = merge_get_theme_mod( 'page_custom_navigation', true );
		$classes .= ' vlt-is--header-' . merge_get_theme_mod( 'navigation_type', $acf_header );

		// footer
		$acf_footer = merge_get_theme_mod( 'page_custom_footer', true );
		$classes .= ' vlt-is--footer-' . merge_get_theme_mod( 'footer_template', $acf_footer );
		if ( merge_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
			$classes .= ' vlt-is--footer-fixed';
		}

		// check fullpage template
		if ( is_page_template( 'template-fullpage-slider.php' ) ) {
			$classes .= ' vlt-is--fullpage-slider';
		}

		// custom cursor
		if ( merge_get_theme_mod( 'custom_cursor' ) == 'enable' ) {
			$classes .= ' vlt-is--custom-cursor';
		}

		// is 404
		if ( is_404() ) {
			$classes .= ' vlt-is--404';
		}

		// site protection
		$acf_site_protection = merge_get_theme_mod( 'page_custom_site_protection', true );
		$classes .= ( merge_get_theme_mod( 'site_protection', $acf_site_protection ) == 'show' && ! current_user_can( 'administrator' ) ) ? ' vlt-is--site-protection' : '';

		return apply_filters( 'merge/add_html_class', merge_sanitize_class( $classes ) );

	}
}

/**
 * Get post password form
 */
if ( ! function_exists( 'merge_get_post_password_form' ) ) {
	function merge_get_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$output = '<form class="vlt-post-password-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
		$output .= '<div class="vlt-section-title"><span class="vlt-section-title__subtitle vlt-badge">' . merge_get_icon( 'star-fill' ) . esc_html__( 'Protected', 'merge' ) . '</span><h3 class="vlt-section-title__heading">' . esc_html__( 'This content is protected', 'merge' ) . '</h3>';
		$output .= '<p class="vlt-section-title__description">' . esc_html__( 'To view it please enter the password below.', 'merge' ) . '</p></div>';
		$output .= '<div class="vlt-form-group m-0">';
		$output .= '<input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password:' , 'merge' ) . '">';
		$output .= '<button class="vlt-btn vlt-btn--primary vlt-btn--effect vlt-btn--rounded"><span class="vlt-btn__text">' . esc_html__( 'Unlock', 'merge' ) . '</span></button>';
		$output .= '</div>';
		$output .= '</form>';
		return apply_filters( 'merge/get_post_password_form', $output );
	}
}
add_filter( 'the_password_form', 'merge_get_post_password_form' );

/**
 * Admin logo link
 */
if ( ! function_exists( 'merge_change_admin_logo_link' ) ) {
	function merge_change_admin_logo_link() {
		return home_url( '/' );
	}
}
add_filter( 'login_headerurl', 'merge_change_admin_logo_link' );

/**
 * Comment reply custom class
 */
if ( ! function_exists( 'merge_comment_reply_link' ) ) {
	function merge_comment_reply_link( $content ) {
		$extra_classes = 'vlt-comment-reply vlt-btn vlt-btn--secondary vlt-btn--xs vlt-btn--effect vlt-btn--rounded';
		return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content );
	}
}
add_filter( 'comment_reply_link', 'merge_comment_reply_link' );

/**
 * Remove comment notes
 */
add_filter( 'comment_form_logged_in', '__return_empty_string' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'merge_filter_tag_cloud' ) ) {
	function merge_filter_tag_cloud( $args ) {
		$args['smallest'] = 0.875;
		$args['largest'] = 0.875;
		$args['unit'] = 'rem';
		$args['orderby'] = 'count';
		$args['order'] = 'DESC';
		$args['separator']= '';
		return $args;
	}
}
add_filter ( 'widget_tag_cloud_args', 'merge_filter_tag_cloud' );

/**
 * Function that adds classes on body for version of the theme
 */
if ( ! function_exists( 'merge_theme_version_class' ) ) {
	function merge_theme_version_class( $classes ) {
		$current_theme = wp_get_theme();
		$theme_prefix = 'vlt';
		// is child theme activated?
		if ( $current_theme->parent() ) {
			// add child theme version
			$classes[] = $theme_prefix . '-child-theme-version-' . $current_theme->get( 'Version' );
			// get parent theme
			$current_theme = $current_theme->parent();
		}
		if ( $current_theme->exists() && $current_theme->get( 'Version' ) != '' ) {
			$classes[] = $theme_prefix . '-theme-version-' . $current_theme->get( 'Version' );
			$classes[] = $theme_prefix . '-theme-' . strtolower( $current_theme->get( 'Name' ) );
		}
		return $classes;
	}
}
add_filter( 'body_class', 'merge_theme_version_class' );

/**
 * Custom select for ACF
 */
if ( ! function_exists( 'merge_add_custom_select_to_acf' ) ) {
	function merge_add_custom_select_to_acf( $field, $type = null ) {

		// reset choices
		$field['choices'] = [];

		$args = [
			'post_type' => 'elementor_library',
			'posts_per_page' => -1,
		];

		if ( $type ) {

			$args[ 'tax_query' ] = [
				[
					'taxonomy' => 'elementor_library_type',
					'field' => 'slug',
					'terms' => $type,
				],
			];

		}

		$page_templates = get_posts( $args );

		$field['choices'][0] = esc_html__( 'Select a Template', 'merge' );

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$field['choices'][$post->ID] = $post->post_title;
			}
		} else {
			$field['choices'][0] = esc_html__( 'Create a Template First', 'merge' );
		}

		// return the field
		return $field;

	}
}
add_filter( 'acf/load_field/name=footer_template', 'merge_add_custom_select_to_acf' );

/**
 * Remove cf7 autop
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Kses allowed html
 */
if ( ! function_exists( 'merge_kses_allowed_html' ) ) {
	function merge_kses_allowed_html($tags, $context) {
		switch( $context ) {
			case 'merge_site_protection':
				$tags = [
					'p' => []
				];
				return $tags;
			case 'merge_error_subtitle':
				$tags = [
					'br' => []
				];
				return $tags;
			case 'merge_product_image':
				$tags = [
					'img' => [
						'width' => [],
						'height' => [],
						'src' => [],
						'class' => [],
						'alt' => [],
						'loading' => []
					]
				];
				return $tags;
			default:
				return $tags;
		}
	}
}
add_filter( 'wp_kses_allowed_html', 'merge_kses_allowed_html', 10, 2 );

/**
 * Disabling the scaling
 */
add_filter( 'big_image_size_threshold', '__return_false' );

/**
 * Override Elementor template
 */
add_filter( 'template_include', function( $template ) {
	if ( false !== strpos( $template, '/templates/canvas.php' ) ) {
		$template = MERGE_REQUIRE_DIRECTORY . 'template-canvas-page.php';
	}
	return $template;
}, 12 );