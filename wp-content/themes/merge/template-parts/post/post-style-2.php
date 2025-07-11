<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

add_filter( 'vlthemes/post-media-image-size', function() {
	return 'merge-800x790_crop';
} );

add_filter( 'vlthemes/post-media-image-ratio', function() {
	return 'ratio ratio-4x3';
} );

$post_class = 'vlt-post vlt-post--style-2';

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-media">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'category' ); ?>

			<?php get_template_part( 'template-parts/post/media/post-media', 'image' ); ?>

		</div>

	<?php else: ?>

		<?php get_template_part( 'template-parts/post/partials/partial-post', 'category' ); ?>

	<?php endif; ?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'title' ); ?>

		</header>
		<!-- /.vlt-post-header -->

		<footer class="vlt-post-footer">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'meta' ); ?>

		</footer>
		<!-- /.vlt-post-footer -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->