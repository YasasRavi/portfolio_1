<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Testimonial extends Widget_Base {

	public function get_name() {
		return 'vlt-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-testimonial vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'testimonial', 'review', 'blockquote' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Testimonial', 'vlthemes' ),
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
			'avatar', [
				'label' => esc_html__( 'Avatar', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'avatar', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
				'default' => 'thumbnail',
				'condition' => [
					'avatar[id]!' => '',
				],
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Awesome Design and Support',
				'label_block' => true,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'name', [
				'label' => esc_html__( 'Name', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Joseph Bridges'
			]
		);

		$this->add_control(
			'function', [
				'label' => esc_html__( 'Function', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Designer',
			]
		);

		$this->add_control(
			'content', [
				'label' => esc_html__( 'Content', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => '6',
				'default' => '"Set creepeth seasons dominion moving their lesser over above the i was good. Meat is without he beginning, our him male."',
			]
		);

		$this->add_control(
			'stars', [
				'label' => esc_html__( 'Stars', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Testimonial', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__fill' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__fill' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .vlt-testimonial::before' => 'left: calc({{LEFT}}{{UNIT}} / 2); right: calc({{LEFT}}{{UNIT}} / 2);',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Content', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size', [
				'label' => esc_html__( 'Icon Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__icon' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial__title',
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial__text',
			]
		);

		$this->add_control(
			'text_indent', [
				'label' => esc_html__( 'Text Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__text' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Avatar', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'avatar[url]!' => '',
				],
			]
		);

		$this->add_control(
			'image_height', [
				'label' => esc_html__( 'Image Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__avatar' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__avatar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_border_color', [
				'label' => esc_html__( 'Border Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__avatar' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'image_indent', [
				'label' => esc_html__( 'Avatar Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__meta' => 'gap: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Meta', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Name', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h6',
				'options' => [
					'h1' => esc_html__( 'Heading 1', 'vlthemes' ),
					'h2' => esc_html__( 'Heading 2', 'vlthemes' ),
					'h3' => esc_html__( 'Heading 3', 'vlthemes' ),
					'h4' => esc_html__( 'Heading 4', 'vlthemes' ),
					'h5' => esc_html__( 'Heading 5', 'vlthemes' ),
					'h6' => esc_html__( 'Heading 6', 'vlthemes' ),
					'div' => esc_html__( 'div', 'vlthemes' ),
					'span' => esc_html__( 'span', 'vlthemes' ),
					'p' => esc_html__( 'p', 'vlthemes' )
				],
			]
		);

		$this->add_control(
			'title_style', [
				'label' => esc_html__( 'Title Style', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'vlthemes' ),
					'h1' => esc_html__( 'Heading 1', 'vlthemes' ),
					'h2' => esc_html__( 'Heading 2', 'vlthemes' ),
					'h3' => esc_html__( 'Heading 3', 'vlthemes' ),
					'h4' => esc_html__( 'Heading 4', 'vlthemes' ),
					'h5' => esc_html__( 'Heading 5', 'vlthemes' ),
					'h6' => esc_html__( 'Heading 6', 'vlthemes' ),
					'h1 large-heading' => esc_html__( 'Heading 1 (Large)', 'vlthemes' ),
				]
			]
		);

		$this->add_control(
			'name_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial__name',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Function', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'function_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__function' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'function_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial__function',
			]
		);

		$this->add_control(
			'function_indent', [
				'label' => esc_html__( 'Function Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__function' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Review', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'review_title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__review .vlt-display-2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'review_title_typography',
				'selector' => '{{WRAPPER}} .vlt-testimonial__review .vlt-display-2',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Stars', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'star_color', [
				'label' => esc_html__( 'Star Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__stars' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'star_active_color', [
				'label' => esc_html__( 'Star Color (Active)', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__stars svg.is-active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'stars_indent', [
				'label' => esc_html__( 'Stars Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-testimonial__stars' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render_meta( $instance ) {

		$has_avatar = ! ! $instance[ 'avatar' ][ 'url' ];
		$has_name = ! ! $instance[ 'name' ];
		$has_function = ! ! $instance[ 'function' ];

		if ( ! $has_avatar && ! $has_name && ! $has_function ) {
			return;
		}

		if ( $instance[ 'link' ][ 'url' ] ) {

			$this->add_render_attribute( 'link', [
				'href' => $instance[ 'link' ][ 'url' ]
			] );

			if ( $instance[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( ! empty( $instance[ 'link' ][ 'nofollow' ] ) ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}

		}

		if ( $has_avatar || $has_name || $has_function ) : ?>

			<div class="vlt-testimonial__meta">

				<?php if ( $has_avatar ) : ?>

					<div class="vlt-testimonial__avatar">

						<?php echo Group_Control_Image_Size_2::get_attachment_image_html( $instance, 'avatar' ); ?>

					</div>

				<?php endif; ?>

				<?php if ( $has_name || $has_function ) : ?>

					<div class="vlt-testimonial__details">

						<?php if ( $has_name ) :

							$this->add_render_attribute( 'name', 'class', 'vlt-testimonial__meta-name' );

							$testimonial_name_html = $instance[ 'name' ];

							if ( $instance[ 'link' ][ 'url' ] ) :
								$testimonial_name_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $testimonial_name_html . '</a>';
							endif;

							?>

							<<?php echo $instance[ 'html_tag' ]; ?> class="vlt-testimonial__name <?php if ( $instance[ 'title_style' ] !== 'none' ) { echo $instance[ 'title_style' ]; } ?>">

								<?php echo $testimonial_name_html; ?>

							</<?php echo $instance[ 'html_tag' ]; ?>>

						<?php endif; ?>

						<?php if ( $has_function ) : ?>

							<p class="vlt-testimonial__function"><?php echo $instance[ 'function' ]; ?></p>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div><?php

		endif;

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'testimonial', 'class', 'vlt-testimonial' );

		$stars = 2;

		?>

		<div <?php echo $this->get_render_attribute_string( 'testimonial' ); ?>>

			<div class="vlt-testimonial__fill"></div>

			<div class="vlt-testimonial__icon">

				<?php echo merge_get_icon( 'quote' ); ?>

			</div>

			<div class="vlt-testimonial__content">

				<?php if ( $settings[ 'title' ] ) : ?>

					<h6 class="vlt-testimonial__title"><?php echo $settings[ 'title' ]; ?></h6>

				<?php endif; ?>

				<?php if ( $settings[ 'content' ] ) : ?>


					<div class="vlt-testimonial__text"><?php echo $settings[ 'content' ]; ?></div>

				<?php endif; ?>

			</div>

			<div class="vlt-testimonial__footer">

				<?php echo $this->render_meta( $settings ); ?>

				<?php if ( $settings[ 'stars' ][ 'size' ] !== 0 ) : ?>

					<div class="vlt-testimonial__review">

						<div class="vlt-display-2"><?php esc_html_e( 'Review Score', 'vlthemes' ); ?></div>

						<div class="vlt-testimonial__stars">

							<?php

								for ( $i = 1; $i <= 5; $i++ ) {
									if ( $i <= $settings[ 'stars' ][ 'size' ] ) {
										echo merge_get_icon( 'star-fill', 'is-active' );
									} else {
										echo merge_get_icon( 'star-outline' );
									}

								}

							?>

						</div>

					</div>

				<?php endif; ?>

			</div>


		</div>

	<?php

	}

}