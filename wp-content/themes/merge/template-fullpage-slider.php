<?php

/**
 * Template Name: Fullpage Slider
 * @author: VLThemes
 * @version: 1.0.1
 */

get_header();

$loop_top = merge_get_field( 'slider_loop_top' );
$loop_bottom = merge_get_field( 'slider_loop_bottom' );
$speed = merge_get_field( 'slider_speed' );

// prepend query
$args = array(
	'post_type' => 'fullpage-slide',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
);

$new_query = new WP_Query( $args );

$slide_IDs = [];

?>

<main class="vlt-main">

	<div class="vlt-fullpage-slider" data-loop-top="<?php echo esc_attr( $loop_top ); ?>" data-loop-bottom="<?php echo esc_attr( $loop_bottom ); ?>" data-scrolling-speed="<?php echo esc_attr( $speed ); ?>">

			<?php

				if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post();

					$slide_ID = get_the_title();
					$slide_IDs[] = $slide_ID;

					// slide settings
					$section_background_color = merge_get_field( 'section_background_color' );
					$section_background_image = merge_get_field( 'section_background_image' );

					// video background
					$video_background = merge_get_field( 'video_background' );

					// ken burn
					$ken_burn_background_image = merge_get_field( 'ken_burn_background_image' );

					$section_style = '';

					if ( $section_background_color ) {
						$section_style .= ' background-color: ' . $section_background_color . ';';
					}

					if ( $section_background_image ) {
						$section_style .= ' background-image: url(' . wp_get_attachment_image_src( $section_background_image[ 'id' ], 'merge-1920x1080_crop' )[0] . ');';
					}

				?>

			<div class="vlt-section pp-scrollable" data-anchor="<?php echo esc_attr( $slide_ID ); ?>" style="<?php echo merge_sanitize_style( $section_style ); ?>">

				<div class="vlt-section__vertical-align">

					<div class="vlt-section__content">

						<?php if ( $ken_burn_background_image ) : ?>

							<div class="vlt-section__ken-burn-background">
								<img src="<?php echo esc_url( wp_get_attachment_image_src( $ken_burn_background_image[ 'id' ], 'merge-1920x1080_crop' )[0] ); ?>" alt="background" loading="lazy">
							</div>
							<!-- /.vlt-section__ken-burn-background -->

						<?php endif; ?>

						<?php

							if ( merge_get_field( 'section_overlay' ) ) {
								echo '<div class="vlt-section__overlay" style="--vlt-overlay-background: ' . merge_get_field( 'section_overlay' ) . ';"></div>';
								echo '<!-- /.vlt-section__overlay -->';
							}

						?>

						<?php if ( $video_background ) : ?>

							<div class="vlt-section__video jarallax" data-jarallax data-video-src="<?php echo esc_attr( $video_background ); ?>"></div>

						<?php endif; ?>

						<?php if ( have_rows( 'section_circles' ) ) : ?>

							<div class="vlt-section__circles">

								<?php

									while ( have_rows( 'section_circles' ) ) : the_row();

										$circle_class = 'vlt-circle';

										$circle_class .= ' ' . get_sub_field( 'circle_custom_class' );
										$circle_class .= ' vlt-circle--' . get_sub_field( 'circle_size' );
										$circle_class .= ' vlt-circle--' . get_sub_field( 'circle_position' ) . ( get_sub_field( 'circle_absolute' ) ? '-absolute' : '' );

										echo '<div class="' . merge_sanitize_class( $circle_class ) . '"></div>';

									endwhile;

								?>

							</div>
							<!-- /.vlt-section__circles -->

						<?php endif; ?>

						<?php if ( have_rows( 'section_particles' ) ) : ?>

							<div class="vlt-section__particles">

								<?php

									while ( have_rows( 'section_particles' ) ) : the_row();

										$particle_image = get_sub_field( 'particle_image' );

										$particle_class = 'vlt-particle';
										$particle_class .= ' ' . get_sub_field( 'particle_custom_class' );
										$particle_class .= ' ' . get_sub_field( 'particle_animation_name' );

										$particle_style = '';

										if ( $particle_image ) {
											$particle_style .= ' background-image: url(' . esc_url( wp_get_attachment_image_src( $particle_image[ 'id' ], 'full' )[0] ) . ');';
										}

										if ( get_sub_field( 'particle_transition_duration' ) ) {
											$particle_style .= ' transition-duration: ' . get_sub_field( 'particle_transition_duration' ) . 's;';
										}

										if ( get_sub_field( 'particle_transition_delay' ) ) {
											$particle_style .= ' transition-delay: ' . get_sub_field( 'particle_transition_delay' ) . 's;';
										}

										echo '<div class="' . merge_sanitize_class( $particle_class ) . '" style="' . merge_sanitize_style( $particle_style ) . '"></div>';

									endwhile;

								?>

							</div>
							<!-- /.vlt-section__particles -->

						<?php endif; ?>

						<div class="vlt-section__elementor">

							<?php the_content(); ?>

						</div>
						<!-- /.container -->

					</div>
					<!-- /.vlt-section__content -->

				</div>
				<!-- /.vlt-section__vertical-align -->

			</div>

			<?php

			endwhile; endif;
			wp_reset_postdata();

			?>

	</div>
	<!-- /.vlt-fullpage-slider -->

</main>
<!-- /.vlt-main -->

<?php get_footer( 'empty' ); ?>