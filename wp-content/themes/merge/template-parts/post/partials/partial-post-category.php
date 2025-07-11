<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<?php if ( merge_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

	<div class="vlt-post-category">

		<?php echo merge_get_post_taxonomy( get_the_ID(), 'category', ' ' ); ?>

	</div>
	<!-- /.vlt-post-category -->

<?php endif; ?>