<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$post_audio_link = merge_get_field( 'post_audio_link' );

if ( ! empty( $post_audio_link ) ) : ?>

	<?php

		if ( ! is_singular() ) {

			get_template_part( 'template-parts/post/media/post-media', 'image' );

		}

	?>

	<div class="vlt-post-media__audio">

		<audio class="player" controls>
			<source src="<?php echo esc_url( $post_audio_link ); ?>" type="audio/mp3">
		</audio>

	</div>

<?php else: ?>

	<?php get_template_part( 'template-parts/post/media/post-media', 'image' ); ?>

<?php endif; ?>