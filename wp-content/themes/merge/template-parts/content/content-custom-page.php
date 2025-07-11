<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<article <?php post_class( 'vlt-page vlt-page--custom' ); ?>>

	<?php the_content(); ?>

	<div class="clearfix"></div>

	<div class="container">

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

	</div>

</article>
<!-- /.vlt-page -->