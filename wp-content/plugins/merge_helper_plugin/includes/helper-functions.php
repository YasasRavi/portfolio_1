<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

/**
 * Add contact methods
 */
if ( ! function_exists( 'vlthemes_add_contact_methods' ) ) {
	function vlthemes_add_contact_methods( $contactmethods ) {
		$contactmethods[ 'facebook' ] = esc_html__( 'Facebook URL', 'vlthemes' );
		$contactmethods[ 'instagram' ] = esc_html__( 'Instagram URL', 'vlthemes' );
		$contactmethods[ 'twitter' ] = esc_html__( 'Twitter URL', 'vlthemes' );
		$contactmethods[ 'tumblr' ] = esc_html__( 'Tumblr URL', 'vlthemes' );
		$contactmethods[ 'pinterest' ] = esc_html__( 'Pinterest URL', 'vlthemes' );

		return $contactmethods;
	}
}
add_filter( 'user_contactmethods', 'vlthemes_add_contact_methods' );

/**
 * Get svg content
 */
if ( ! function_exists( 'vlthemes_get_svg_content' ) ) {
	function vlthemes_get_svg_content( $imageID ) {
		if ( ! $imageID ) {
			return;
		}
		return file_get_contents( get_attached_file( $imageID ) );
	}
}

/**
 * Extend mime types
 */
if ( ! function_exists( 'vlthemes_mime_types' ) ) {
	function vlthemes_mime_types( $mimes ) {
		$mimes[ 'svg' ] = 'image/svg+xml';
		return $mimes;
	}
}
add_filter( 'upload_mimes', 'vlthemes_mime_types' );

/**
 * Share buttons
 */
if ( ! function_exists( 'vlthemes_get_post_share_buttons' ) ) {
	function vlthemes_get_post_share_buttons( $postID, $style = 'style-2' ) {
		$url = get_permalink( $postID );
		$title = get_the_title( $postID );

		$output = '<a href="javascript:;" class="vlt-social-icon vlt-social-icon--' . $style . ' facebook" data-sharer="facebook" data-url="' . $url . '"><i class="socicon-facebook"></i></a>';

		$output .= '<a href="javascript:;" class="vlt-social-icon vlt-social-icon--' . $style . ' twitter" data-sharer="twitter" data-title="' . $title . '" data-url="' . $url . '"><i class="socicon-twitter"></i></a>';

		$output .= '<a href="javascript:;" class="vlt-social-icon vlt-social-icon--' . $style . ' pinterest" data-sharer="pinterest" data-url="' . $url . '"><i class="socicon-pinterest"></i></a>';

		$output .= '<a href="javascript:;" class="vlt-social-icon vlt-social-icon--' . $style . ' linkedin" data-sharer="linkedin" data-url="' . $url . '"><i class="socicon-linkedin"></i></a>';

		return apply_filters( 'vlthemes/get_post_share_buttons', $output );
	}
}