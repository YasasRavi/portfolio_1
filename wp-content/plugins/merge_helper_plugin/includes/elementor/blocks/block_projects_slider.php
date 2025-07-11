<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Projects_Slider extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-projects-slider';
	}

	public function get_title() {
		return esc_html__( 'Projects Slider', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'projects', 'works', 'slider', 'carousel', 'showcase' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Query Settings', 'vlthemes' ),
			]
		);

		if ( ! vlthemes_is_theme_activated() ) {

			$this->add_control(
				'notification_' . $first_level++, [
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . esc_html__( 'Theme not activated!', 'vlthemes' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">License Info</a> to activate.', 'vlthemes' ), admin_url( 'admin.php?page=theme-activate-panel' ) ),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
					'separator' => 'after',
				]
			);

		}

		$this->add_control(
			'slide_effect', [
				'label' => esc_html__( 'Slide Effect', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'wave-x',
				'options' => [
					'wave-x' => esc_html__( 'Wave X', 'vlthemes' ),
					'ripple' => esc_html__( 'Ripple', 'vlthemes' ),
					'stretch' => esc_html__( 'Stretch', 'vlthemes' ),
				],
			]
		);

		$this->add_control(
			'show_by', [
				'label' => esc_html__( 'Show By', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show_all',
				'options' => [
					'show_all' => esc_html__( 'Show All', 'vlthemes' ),
					'show_by_id' => esc_html__( 'Show By ID', 'vlthemes' ),
					'show_by_cat' => esc_html__( 'Show By Category', 'vlthemes' ),
				],
			]
		);

		$this->add_control(
			'post_id', [
				'label' => esc_html__( 'Select Post', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->vlthemes_get_post_name( 'portfolio' ),
				'condition' => [
					'show_by' => 'show_by_id',
				],
			]
		);

		$this->add_control(
			'post_cat', [
				'label' => esc_html__( 'Select Category', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->vlthemes_get_taxonomies( 'portfolio_category' ),
				'condition' => [
					'show_by' => 'show_by_cat',
				],
			]
		);

		$this->add_control(
			'max_posts', [
				'label' => esc_html__( 'Max Posts', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => -1,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'custom_order', [
				'label' => esc_html__( 'Custom Order', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'orderby', [
				'label' => esc_html__( 'Orderby', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None','vlthemes' ),
					'ID' => esc_html__( 'ID','vlthemes' ),
					'date' => esc_html__( 'Date','vlthemes' ),
					'name' => esc_html__( 'Name','vlthemes' ),
					'title' => esc_html__( 'Title','vlthemes' ),
					'comment_count' => esc_html__( 'Comment count','vlthemes' ),
					'rand' => esc_html__( 'Random','vlthemes' ),
				],
				'condition' => [
					'custom_order' => 'yes',
				],
			]
		);

		$this->add_control(
			'order', [
				'label' => esc_html__( 'Order', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'Descending', 'vlthemes' ),
					'ASC' => esc_html__( 'Ascending', 'vlthemes' ),
				],
				'condition' => [
					'custom_order' => 'yes',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'projects-slider' => [
				'class' => 'vlt-projects-slider',
				'data-slide-effect' => $settings[ 'slide_effect' ],
			]
		] );

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $settings[ 'max_posts' ],
			'post_status' => 'publish',
		);

		if ( $settings[ 'custom_order' ] == 'yes' ) {
			$args[ 'orderby' ] = $settings[ 'orderby' ];
			$args[ 'order' ] = $settings[ 'order' ];
		}

		switch ( $settings[ 'show_by' ] ) {

			case 'show_all':

			break;

			case 'show_by_id':
				$args[ 'post__in' ] = $settings[ 'post_id' ];
			break;

			case 'show_by_cat':
				$get_posts_categories = $settings[ 'post_cat' ];
				$post_cats = str_replace( ' ', '', $get_posts_categories );
				if ( '0' != $get_posts_categories ) {
					if ( is_array( $post_cats ) && count( $post_cats ) > 0 ) {
						$field_name = is_numeric( $post_cats[0] ) ? 'term_id' : 'slug';
						$args[ 'tax_query' ] = array(
							array(
								'taxonomy' => 'portfolio_category',
								'terms' => $post_cats,
								'field' => $field_name,
								'include_children' => false
							)
						);
					}
				}
			break;
		}

		$new_query = new \WP_Query( $args );

		?>

		<div <?php echo $this->get_render_attribute_string( 'projects-slider' ); ?>>

			<div class="row align-items-center">

				<div class="col-lg-8 order-lg-2">

					<div class="vlt-project-images-wrap">

						<div class="vlt-project-images swiper" data-cursor="drag">

							<div class="swiper-wrapper">

								<?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>

									<div class="swiper-slide">

										<div class="vlt-project-image">

											<?php the_post_thumbnail( 'full', array( 'loading' => 'lazy', 'class' => 'swiper-gl-image' ) ); ?>

										</div>
										<!-- /.vlt-project-image -->

									</div>

								<?php endwhile; endif; wp_reset_postdata(); ?>

							</div>

						</div>

						<div class="vlt-swiper-pagination vlt-swiper-pagination--fraction">
							<span class="current"></span>
							<span class="sep">/</span>
							<span class="total"></span>
						</div>

					</div>

				</div>

				<div class="col-lg-4 order-lg-1">

					<div class="vlt-project-content swiper">

						<div class="swiper-wrapper">

							<?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>

								<div class="swiper-slide">

									<?php get_template_part( 'template-parts/post/project', 'slider' ); ?>

								</div>

							<?php endwhile; endif; wp_reset_postdata(); ?>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php

	}

}