<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-post-meta">

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

	<?php if ( merge_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

		<?php
			echo '<span class="sep">';
			echo merge_get_icon( 'dot' );
			echo '</span>';
		?>

		<span><?php echo merge_get_post_taxonomy( get_the_ID(), 'category', ', ', 'name', false ); ?></span>

	<?php endif; ?>

</div>
<!-- /.vlt-post-meta -->