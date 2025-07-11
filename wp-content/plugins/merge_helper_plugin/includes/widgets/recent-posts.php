<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

class vlthemes_widget_recent_posts extends WP_Widget {

	public function __construct() {
		$widget_details = array(
			'classname' => 'vlt_widget_recent_posts',
			'description' => esc_html__( 'Shows recent posts.', 'vlthemes' )
		);
		parent::__construct( 'vlthemes_widget_recent_posts', esc_html__( 'VLThemes: Recent Posts', 'vlthemes' ), $widget_details );
	}

	public function widget( $args, $instance ) {

		if ( !isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args[ 'before_widget' ];

		$widget_id = $args[ 'widget_id' ];

		$recent_posts_number_of_posts = get_field( 'recent_posts_number_of_posts', 'widget_' . $widget_id );
		$recent_posts_layout = get_field( 'recent_posts_layout', 'widget_' . $widget_id );

		$post_args = array(
			'post_type' => 'post',
			'posts_per_page' => $recent_posts_number_of_posts,
			'orderby' => 'date',
			'order' => 'DESC',
			'ignore_sticky_posts' => true
		);
		$new_query = new WP_Query( $post_args );

		if ( $title ) {
			echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}

		switch( $recent_posts_layout ) {

			case 'list': ?>

				<?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>

					<div class="vlt-widget-post">

						<?php if ( has_post_thumbnail() ) : ?>

							<div class="vlt-widget-post__thumbnail">

								<a href="<?php the_permalink(); ?>" data-cursor="eye">

									<div class="ratio ratio-1x1">

										<?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); ?>

									</div>

								</a>

							</div>

						<?php endif; ?>

						<div class="vlt-widget-post__content">

							<div class="vlt-post-meta vlt-post-meta--small">

								<?php if ( merge_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

									<span class="vlt-post-meta__categories">

										<?php echo merge_get_post_taxonomy( get_the_ID(), 'category', ', ', 'name', false, 1 ); ?>

									</span>
									<!-- /.vlt-post-meta__categories -->

									<?php
										echo '<span class="sep">';
										echo merge_get_icon( 'dot' );
										echo '</span>';
									?>

								<?php endif; ?>

								<span><?php echo merge_get_reading_time(); ?></span>

							</div>
							<!-- /.vlt-post-meta -->

							<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

						</div>

					</div>

				<?php endwhile; endif; wp_reset_postdata(); ?>

			<?php

			break;

			case 'slider': ?>

				<div class="vlt-widget-post-slider swiper">

					<div class="swiper-wrapper">

						<?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>

							<div class="swiper-slide">

								<article class="vlt-widget-post">

									<?php if ( has_post_thumbnail() ) : ?>

										<div class="vlt-widget-post__thumbnail">

											<a href="<?php the_permalink(); ?>" data-cursor="eye">

												<div class="ratio ratio-4x3">

													<?php the_post_thumbnail( 'merge-800x600_crop', array( 'loading' => 'lazy' ) ); ?>

												</div>

											</a>

										</div>

									<?php endif; ?>

									<div class="vlt-widget-post__content">

										<div class="vlt-post-meta vlt-post-meta--small">

											<?php if ( merge_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

												<span class="vlt-post-meta__categories">

													<?php echo merge_get_post_taxonomy( get_the_ID(), 'category', ', ', 'name', false, 1 ); ?>

												</span>
												<!-- /.vlt-post-meta__categories -->

												<?php
													echo '<span class="sep">';
													echo merge_get_icon( 'dot' );
													echo '</span>';
												?>

											<?php endif; ?>

											<span><?php echo merge_get_reading_time(); ?></span>

										</div>
										<!-- /.vlt-post-meta -->

										<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

									</div>

								</article>

							</div>

						<?php endwhile; endif; wp_reset_postdata(); ?>

					</div>

					<div class="vlt-swiper-pagination"></div>

				</div>

			<?php

			break;

		}

		?>

		<?php echo $args[ 'after_widget' ];

	}

	public function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';

		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'vlthemes' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
		return $instance;
	}
}