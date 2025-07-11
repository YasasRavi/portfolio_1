<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<?php if ( get_the_tags() ) : ?>

	<div class="vlt-post-tags">

		<?php the_tags( '', '' ); ?>

	</div>
	<!-- /.vlt-post-tags -->

<?php endif; ?>


<?php if ( merge_get_theme_mod( 'post_views' ) == 'show' ) : ?>

	<div class="vlt-post-views">

		<?php echo merge_get_icon( 'eye' ) . sprintf( __( '%s Views', 'merge' ), merge_get_post_views( get_the_ID() ) ); ?>

	</div>
	<!-- /.vlt-post-views -->

<?php endif; ?>