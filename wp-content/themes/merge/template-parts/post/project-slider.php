<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$post_video_link = merge_get_field( '_vp_format_video_url' );

?>

<article class="vlt-project">

	<header class="vlt-project-header">

		<div class="vlt-project-meta">

			<?php if ( merge_get_post_taxonomy( get_the_ID(), 'portfolio_category' ) ) : ?>

				<span>

					<?php echo merge_get_post_taxonomy( get_the_ID(), 'portfolio_category', ' ', 'name', true, 1 ); ?>

				</span>

			<?php endif; ?>

			<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

		</div>
		<!-- /.vlt-project-meta -->

		<h3 class="vlt-project-title h2"><?php the_title(); ?></h3>
		<!-- /.vlt-project-title -->

	</header>
	<!-- /.vlt-project-header -->

	<div class="vlt-project-excerpt">

		<?php

			if ( merge_get_field( 'work_excerpt' ) ) {
				echo merge_get_field( 'work_excerpt' );
			} else {
				echo merge_get_trimmed_content( 22 );
			}

		?>

	</div>
	<!-- /.vlt-project-excerpt -->

	<footer class="vlt-project-footer">

		<a href="<?php the_permalink(); ?>" class="vlt-btn vlt-btn--primary vlt-btn--effect vlt-btn--rounded">
			<span class="vlt-btn__text"><?php esc_html_e( 'View Project', 'merge' ); ?></span>
		</a>
		<!-- /.vlt-btn -->

		<?php if ( ! empty( $post_video_link ) ) : ?>

			<div class="vlt-video-button vlt-video-button--label-right">

				<a data-fancybox data-small-btn="true" href="<?php echo esc_url( $post_video_link ); ?>">
					<?php echo merge_get_icon( 'play' ); ?>
				</a>

				<span class="vlt-video-button__label"><?php esc_html_e( 'Watch Video', 'merge' ); ?></span>

			</div>
			<!-- /.vlt-video-button -->

		<?php endif; ?>

	</footer>
	<!-- /.vlt-project-footer -->

</article>
<!-- /.vlt-project -->