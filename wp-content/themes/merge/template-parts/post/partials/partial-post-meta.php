<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-post-meta">

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

	<?php
		echo '<span class="sep">';
		echo merge_get_icon( 'dot' );
		echo '</span>';
	?>

	<span><?php echo sprintf( __( 'By <a href="%s">%s</a>', 'merge' ), get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ), get_the_author() ); ?></span>

</div>
<!-- /.vlt-post-meta -->