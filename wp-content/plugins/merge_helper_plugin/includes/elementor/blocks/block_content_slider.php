<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Content_Slider extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-content-slider';
	}

	public function get_title() {
		return esc_html__( 'Content Slider', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-slider-push vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'slider', 'content', 'carousel' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Slider', 'vlthemes' ),
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

		$slides_to_show = range( 1, 4 );
		$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

		$this->add_responsive_control(
			'slides_to_show', [
				'label' => esc_html__( 'Slides to Show', 'vlthemes' ),
				'description' => esc_html__( 'Number of slides per view.', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'auto' => esc_html__( 'Auto', 'vlthemes' ),
				] + $slides_to_show,
				'desktop_default' => 1,
				'tablet_default' => 1,
				'mobile_default' => 1,
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'slides_to_scroll', [
				'label' => esc_html__( 'Slides to Scroll', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'description' => esc_html__( 'Set numbers of slides to define and enable group sliding.', 'vlthemes' ),
				'options' => $slides_to_show,
				'desktop_default' => 1,
				'tablet_default' => 1,
				'mobile_default' => 1,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'initial_slide', [
				'label' => esc_html__( 'Initial Slide', 'vlthemes' ),
				'description' => esc_html__( 'Index number of initial slide.', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'gap', [
				'label' => esc_html__( 'Gap', 'vlthemes' ),
				'description' => esc_html__( 'Distance between slides.', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				]
			]
		);

		$this->add_control(
			'effect', [
				'label' => esc_html__( 'Effect', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'fade' => esc_html__( 'Fade', 'vlthemes' ),
					'slide' => esc_html__( 'Slide', 'vlthemes' ),
					'coverflow' => esc_html__( 'Coverflow', 'vlthemes' ),
				]
			]
		);

		$this->add_control(
			'slides_centered', [
				'label' => esc_html__( 'Centered Slides', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'navigation_anchor', [
				'label' => esc_html__( 'Navigation Anchor', 'vlthemes' ),
				'description' => esc_html__( 'Enter class / identifier that the navigation has.', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Query Settings', 'vlthemes' ),
			]
		);

		$this->add_control(
			'show_by', [
				'label' => esc_html__( 'Show By', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show_by_cat',
				'options' => [
					'show_by_id' => esc_html__( 'Show By ID', 'vlthemes' ),
					'show_by_cat' => esc_html__( 'Show By Category', 'vlthemes' ),
				],
			]
		);

		$this->add_control(
			'slide_id', [
				'label' => esc_html__( 'Select Slide', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->vlthemes_get_post_name( 'content-slide' ),
				'condition' => [
					'show_by' => 'show_by_id',
				]
			]
		);

		$this->add_control(
			'slide_cat', [
				'label' => esc_html__( 'Select Category', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->vlthemes_get_taxonomies( 'content-slide-category' ),
				'condition' => [
					'show_by' => 'show_by_cat',
				]
			]
		);

		$this->add_control(
			'max_slides', [
				'label' => esc_html__( 'Max Slides', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'custom_order', [
				'label' => esc_html__( 'Custom order', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
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
				]
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
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Settings', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'speed', [
				'label' => esc_html__( 'Animation Speed', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1000,
			]
		);

		$this->add_control(
			'loop', [
				'label' => esc_html__( 'Loop', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoheight', [
				'label' => esc_html__( 'Auto Height', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay', [
				'label' => esc_html__( 'Autoplay', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed', [
				'label' => esc_html__( 'Autoplay Speed', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes'
				]
			]
		);

		$this->add_control(
			'slider_offset', [
				'label' => esc_html__( 'Slider Offset', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'mousewheel', [
				'label' => esc_html__( 'Mousewheel', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Slide', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'slide_padding', [
				'label' => esc_html__( 'Slide Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		// prepend slider settings
		$slide_settings = [
			'slides_to_show' => $settings[ 'slides_to_show' ],
			'slides_to_show_tablet' => $settings[ 'slides_to_show_tablet' ],
			'slides_to_show_mobile' => $settings[ 'slides_to_show_mobile' ],
			'slides_to_scroll' => $settings[ 'slides_to_scroll' ],
			'slides_to_scroll_tablet' => $settings[ 'slides_to_scroll_tablet' ],
			'slides_to_scroll_mobile' => $settings[ 'slides_to_scroll_mobile' ]
		];

		$this->add_render_attribute( 'content-slider', [
			'class' => 'vlt-content-slider swiper',
			'data-navigation-anchor' => $settings[ 'navigation_anchor' ],
			'data-initial-slide' => $settings[ 'initial_slide' ][ 'size' ],
			'data-effect' => $settings[ 'effect' ],
			'data-gap' => $settings[ 'gap' ][ 'size' ],
			'data-loop' => $settings[ 'loop' ],
			'data-speed' => $settings[ 'speed' ],
			'data-autoplay' => $settings[ 'autoplay' ],
			'data-autoplay-speed' => $settings[ 'autoplay_speed' ],
			'data-slides-centered' => $settings[ 'slides_centered' ],
			'data-slider-offset' => $settings[ 'slider_offset' ],
			'data-mousewheel' => $settings[ 'mousewheel' ],
			'data-autoheight' => $settings[ 'autoheight' ],
			'data-slide-settings' => json_encode( $slide_settings )
		] );

		// prepend query
		$args = array(
			'post_type' => 'content-slide',
			'posts_per_page' => $settings[ 'max_slides' ],
			'post_status' => 'publish',
		);

		if ( $settings[ 'custom_order' ] == 'yes' ) {
			$args[ 'orderby' ] = $settings[ 'orderby' ];
			$args[ 'order' ] = $settings[ 'order' ];
		}

		$slide_post_ids = [];

		switch ( $settings[ 'show_by' ] ) {

			case 'show_by_id':
				$args[ 'post__in' ] = $settings[ 'slide_id' ];
				break;

			case 'show_by_cat':
				$get_slides_categories = $settings[ 'slide_cat' ];
				$slider_cats = str_replace( ' ', '', $get_slides_categories );
				if ( '0' != $get_slides_categories ) {
					if ( is_array( $slider_cats ) && count( $slider_cats ) > 0 ) {
						$field_name = is_numeric( $slider_cats[0] ) ? 'term_id' : 'slug';
						$args[ 'tax_query' ] = array(
							array(
								'taxonomy' => 'content-slide-category',
								'terms' => $slider_cats,
								'field' => $field_name,
								'include_children' => false
							)
						);
					}
				}
				break;
		}

		if ( ! empty( $settings[ 'slide_id' ] ) || ! empty( $settings[ 'slide_cat' ] ) ) {

			$new_query = new \WP_Query( $args );
			if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post();
				$slide_post_ids[] = get_the_ID();
			endwhile; endif;
			wp_reset_postdata(); wp_reset_query();

		} else {
			echo sprintf( __( 'Select Query or create your first slide <a href="%s" target="_blank">here</a>!', 'vlthemes' ), admin_url('edit.php?post_type=slide' ) );
			return;
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'content-slider' ); ?>>

			<div class="swiper-wrapper" data-cursor="drag">

				<?php foreach( $slide_post_ids as $slide_id ) : ?>

					<div class="swiper-slide">

						<?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $slide_id, true ); ?>

					</div>

				<?php endforeach; ?>

			</div>

		</div>

	<?php

	}

}