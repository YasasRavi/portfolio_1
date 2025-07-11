<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<?php if ( ! merge_check_is_elementor() ) : ?>

<div class="vlt-content-markup">

<?php endif; ?>

	<?php the_content(); ?>

<?php if ( ! merge_check_is_elementor() ) : ?>

</div>

<?php endif; ?>

<div class="clearfix"></div>

<?php
	wp_link_pages( array(
		'before' => '<div class="vlt-link-pages"><h6>' . esc_html__( 'Pages: ', 'merge' ) . '</h6>',
		'after' => '</div>',
		'separator' => '<span class="sep">|</span>',
		'nextpagelink' => esc_html__( 'Next page', 'merge' ),
		'previouspagelink' => esc_html__( 'Previous page', 'merge' ),
		'next_or_number' => 'next'
	) );
?>