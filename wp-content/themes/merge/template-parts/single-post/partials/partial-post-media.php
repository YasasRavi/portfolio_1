<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

add_filter( 'vlthemes/post-media-image-size', function() {
	return 'merge-1280x853_crop';
} );

switch( $format ) {
	case 'video':
		get_template_part( 'template-parts/post/media/post-media', 'video' );
		break;
	case 'audio':
		get_template_part( 'template-parts/post/media/post-media', 'audio' );
		break;
}