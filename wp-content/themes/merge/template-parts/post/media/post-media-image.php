<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$size = 'full';
$ratio = 'ratio ratio-16x9';

?>

<div class="vlt-post-media__image">

	<?php if ( ! is_single() || apply_filters( 'vlthemes/post-media-image-link', false ) ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>

		<div class="<?php echo merge_sanitize_class( apply_filters( 'vlthemes/post-media-image-ratio', $ratio ) ); ?>">

			<a href="<?php the_permalink(); ?>" data-cursor="eye">

				<?php the_post_thumbnail( apply_filters( 'vlthemes/post-media-image-size', $size ), array( 'loading' => 'lazy' ) ); ?>

			</a>

		</div>

	<?php if ( ! is_single() || apply_filters( 'vlthemes/post-media-image-link', false ) ) : ?></a><?php endif; ?>

</div>