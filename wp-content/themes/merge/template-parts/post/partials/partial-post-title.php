<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<h3 class="vlt-post-title">

	<a href="<?php the_permalink(); ?>">

		<?php

			if ( is_sticky() ) {

				echo merge_get_icon( 'star-fill' );

			}

		?>

		<?php the_title(); ?>

	</a>

</h3>
<!-- /.vlt-post-title -->