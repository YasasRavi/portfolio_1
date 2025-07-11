<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Slide_Photo extends Widget_Base {

	public function get_name() {
		return 'vlt-slide-photo';
	}

	public function get_title() {
		return esc_html__( 'Slide Photo', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-image vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'slide', 'photo', 'image' ];
	}

	public static function get_animations() {
		return [
			'none' => 'None',
			'bounce' => 'bounce',
			'flash' => 'flash',
			'pulse' => 'pulse',
			'rubberBand' => 'rubberBand',
			'shake' => 'shake',
			'headShake' => 'headShake',
			'swing' => 'swing',
			'tada' => 'tada',
			'wobble' => 'wobble',
			'jello' => 'jello',
			'bounceIn' => 'bounceIn',
			'bounceInDown' => 'bounceInDown',
			'bounceInLeft' => 'bounceInLeft',
			'bounceInRight' => 'bounceInRight',
			'bounceInUp' => 'bounceInUp',
			'bounceOut' => 'bounceOut',
			'bounceOutDown' => 'bounceOutDown',
			'bounceOutLeft' => 'bounceOutLeft',
			'bounceOutRight' => 'bounceOutRight',
			'bounceOutUp' => 'bounceOutUp',
			'fadeIn' => 'fadeIn',
			'fadeInDown' => 'fadeInDown',
			'fadeInDownSm' => 'fadeInDownSm',
			'fadeInDownBig' => 'fadeInDownBig',
			'fadeInLeft' => 'fadeInLeft',
			'fadeInLeftSm' => 'fadeInLeftSm',
			'fadeInLeftBig' => 'fadeInLeftBig',
			'fadeInRight' => 'fadeInRight',
			'fadeInRightSm' => 'fadeInRightSm',
			'fadeInRightBig' => 'fadeInRightBig',
			'fadeInUp' => 'fadeInUp',
			'fadeInUpSm' => 'fadeInUpSm',
			'fadeInUpBig' => 'fadeInUpBig',
			'fadeOut' => 'fadeOut',
			'fadeOutDown' => 'fadeOutDown',
			'fadeOutDownBig' => 'fadeOutDownBig',
			'fadeOutLeft' => 'fadeOutLeft',
			'fadeOutLeftBig' => 'fadeOutLeftBig',
			'fadeOutRight' => 'fadeOutRight',
			'fadeOutRightBig' => 'fadeOutRightBig',
			'fadeOutUp' => 'fadeOutUp',
			'fadeOutUpBig' => 'fadeOutUpBig',
			'flipInX' => 'flipInX',
			'flipInY' => 'flipInY',
			'flipOutX' => 'flipOutX',
			'flipOutY' => 'flipOutY',
			'lightSpeedIn' => 'lightSpeedIn',
			'lightSpeedOut' => 'lightSpeedOut',
			'rotateIn' => 'rotateIn',
			'rotateInDownLeft' => 'rotateInDownLeft',
			'rotateInDownRight' => 'rotateInDownRight',
			'rotateInUpLeft' => 'rotateInUpLeft',
			'rotateInUpRight' => 'rotateInUpRight',
			'rotateOut' => 'rotateOut',
			'rotateOutDownLeft' => 'rotateOutDownLeft',
			'rotateOutDownRight' => 'rotateOutDownRight',
			'rotateOutUpLeft' => 'rotateOutUpLeft',
			'rotateOutUpRight' => 'rotateOutUpRight',
			'hinge' => 'hinge',
			'jackInTheBox' => 'jackInTheBox',
			'rollIn' => 'rollIn',
			'rollOut' => 'rollOut',
			'zoomIn' => 'zoomIn',
			'zoomInDown' => 'zoomInDown',
			'zoomInLeft' => 'zoomInLeft',
			'zoomInRight' => 'zoomInRight',
			'zoomInUp' => 'zoomInUp',
			'zoomOut' => 'zoomOut',
			'zoomOutDown' => 'zoomOutDown',
			'zoomOutLeft' => 'zoomOutLeft',
			'zoomOutRight' => 'zoomOutRight',
			'zoomOutUp' => 'zoomOutUp',
			'slideInDown' => 'slideInDown',
			'slideInLeft' => 'slideInLeft',
			'slideInRight' => 'slideInRight',
			'slideInUp' => 'slideInUp',
			'slideOutDown' => 'slideOutDown',
			'slideOutLeft' => 'slideOutLeft',
			'slideOutRight' => 'slideOutRight',
			'slideOutUp' => 'slideOutUp',
			'heartBeat' => 'heartBeat',
		];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Slide Photo', 'vlthemes' ),
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
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Marquee', 'vlthemes' ),
			]
		);

		$this->add_control(
			'marquee_text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'marquee_speed', [
				'label' => esc_html__( 'Animation Duration', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'step' => 10
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Particles', 'vlthemes' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
				'condition' => [
					'image[id]!' => '',
				],
			]
		);

		$repeater->add_control(
			'particle_position', [
				'label' => esc_html__( 'Position', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => [
					'absolute' => esc_html__( 'Absolute', 'vlthemes' ),
					'relative' => esc_html__( 'Relative', 'vlthemes' ),
				],
				'default' => 'absolute',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'position: {{VALUE}};'
				],
				'separator' => 'before'
			]
		);

		$repeater->add_responsive_control(
			'particle_width', [
				'label' => esc_html__( 'Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$repeater->add_responsive_control(
			'particle_top', [
				'label' => esc_html__( 'Top', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;'
				],
			]
		);

		$repeater->add_responsive_control(
			'particle_bottom', [
				'label' => esc_html__( 'Bottom', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;'
				],
			]
		);

		$repeater->add_responsive_control(
			'particle_left', [
				'label' => esc_html__( 'Left', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}}; right: auto;'
				],
			]
		);

		$repeater->add_responsive_control(
			'particle_right', [
				'label' => esc_html__( 'Right', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'range' => [
					'%' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}}; left: auto;'
				],
			]
		);

		$repeater->add_control(
			'particle_negative_z_index', [
				'label' => esc_html__( 'Negative z-index', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(), [
				'name' => 'particle_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'vlthemes' ),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);

		$repeater->add_responsive_control(
			'particle_border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$repeater->add_control(
			'particle_animation_name', [
				'label' => esc_html__( 'Animation Name', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => self::get_animations(),
				'default' => 'none',
				'separator' => 'before'
			]
		);

		$repeater->add_control(
			'particle_animation_delay', [
				'label' => esc_html__( 'Animation Delay', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 100,
					],
				],
				'condition' => [
					'particle_animation_name!' => 'none',
				],
			]
		);

		$repeater->add_control(
			'particle_animation_duration', [
				'label' => esc_html__( 'Animation Duration', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 100,
					],
				],
				'condition' => [
					'particle_animation_name!' => 'none',
				],
			]
		);

		$repeater->add_control(
			'particle_rotate', [
				'label' => esc_html__( 'Rotate', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 360,
						'step' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} img' => 'transform: rotate({{SIZE}}deg);',
				]
			]
		);

		$this->add_control(
			'particles', [
				'label' => esc_html__( 'Particles', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Image Style', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'alignment', [
				'label' => esc_html__( 'Alignment', 'vlthemes' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'vlthemes' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'vlthemes' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'vlthemes' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->add_responsive_control(
			'max_width', [
				'label' => esc_html__( 'Max Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%', 'rem', 'px' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-slide-photo__inside' => 'max-width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), [
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'vlthemes' ),
				'selector' => '{{WRAPPER}} .vlt-slide-photo__inside',
			]
		);

		$this->add_control(
			'border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-slide-photo__inside' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin', [
				'label' => esc_html__( 'Margin', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-slide-photo__inside' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'inside_animation_name', [
				'label' => esc_html__( 'Animation Name', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => self::get_animations(),
				'default' => 'none',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'inside_animation_delay', [
				'label' => esc_html__( 'Animation Delay', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 100,
					],
				],
				'condition' => [
					'inside_animation_name!' => 'none',
				],
			]
		);

		$this->add_control(
			'inside_animation_duration', [
				'label' => esc_html__( 'Animation Duration', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 100,
					],
				],
				'condition' => [
					'inside_animation_name!' => 'none',
				],
			]
		);

		$this->end_controls_section();

	}

	public function render_particle( $instance, $id ) {

		$style = '';

		$style .= $instance[ 'particle_animation_delay' ][ 'size' ] ? ' --animate-delay: ' . $instance[ 'particle_animation_delay' ][ 'size' ] . 'ms;' : '';
		$style .= $instance[ 'particle_animation_duration' ][ 'size' ] ? ' --animate-duration: ' . $instance[ 'particle_animation_duration' ][ 'size' ] . 'ms;' : '';

		$this->add_render_attribute( 'particle-' . $id, [
			'class' => [
				'vlt-slide-photo__particle',
				'elementor-repeater-item-' . $id
			],
			'style' => $style
		] );

		if ( $instance[ 'particle_negative_z_index' ] == 'yes' ) {
			$this->add_render_attribute( 'particle-' . $id, 'class', 'negative-z-index' );
		}

		if ( $instance[ 'particle_animation_name' ] !== 'none' ) {

			$this->add_render_attribute( 'particle-' . $id, [
				'class' => 'vlt-animate-element',
				'data-animation-name' => $instance[ 'particle_animation_name' ],
			] );

		}

		?>

		<?php if ( ! empty( $instance[ 'image' ][ 'url' ] ) ) : ?>

			<div <?php echo $this->get_render_attribute_string( 'particle-' . $id ); ?>>

				<?php
					echo wp_get_attachment_image( $instance[ 'image' ][ 'id' ], $instance[ 'image_size' ], false, [
						'loading' => 'lazy'
					] );
				?>

			</div>

		<?php endif; ?>

		<?php

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'slide-photo', 'class', 'vlt-slide-photo' );
		$this->add_render_attribute( 'inside', 'class', 'vlt-slide-photo__inside' );

		if ( $settings[ 'inside_animation_name' ] !== 'none' ) {

			$style = '';

			$style .= $settings[ 'inside_animation_delay' ][ 'size' ] ? ' --animate-delay: ' . $settings[ 'inside_animation_delay' ][ 'size' ] . 'ms;' : '';
			$style .= $settings[ 'inside_animation_duration' ][ 'size' ] ? ' --animate-duration: ' . $settings[ 'inside_animation_duration' ][ 'size' ] . 'ms;' : '';

			$this->add_render_attribute( 'inside', [
				'class' => [
					'vlt-animate-element',
				],
				'data-animation-name' => $settings[ 'inside_animation_name' ],
				'style' => $style
			] );

		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'slide-photo' ); ?>>

			<?php if ( ! empty( $settings[ 'image' ][ 'url' ] ) ) : ?>

				<div <?php echo $this->get_render_attribute_string( 'inside' ); ?>>

					<?php

						if ( $settings[ 'marquee_text' ] ) :

							echo '<div class="vlt-marquee-text" data-marquee="horizontal" data-marquee-speed="' . $settings[ 'marquee_speed' ] . '">';

								echo '<span data-marquee-text class="vlt-display-1">' . $settings[ 'marquee_text' ] . merge_get_icon( 'star-fill') . '</span>';
								echo '<span data-marquee-text class="vlt-display-1">' . $settings[ 'marquee_text' ] . merge_get_icon( 'star-fill') . '</span>';
								echo '<span data-marquee-text class="vlt-display-1">' . $settings[ 'marquee_text' ] . merge_get_icon( 'star-fill') . '</span>';
								echo '<span data-marquee-text class="vlt-display-1">' . $settings[ 'marquee_text' ] . merge_get_icon( 'star-fill') . '</span>';
								echo '<span data-marquee-text class="vlt-display-1">' . $settings[ 'marquee_text' ] . merge_get_icon( 'star-fill') . '</span>';

							echo '</div>';

						endif;

					?>

					<?php
						echo wp_get_attachment_image( $settings[ 'image' ][ 'id' ], $settings[ 'image_size' ], false, [
							'loading' => 'lazy'
						] );
					?>

				</div>

			<?php endif; ?>

			<?php

				foreach ( $settings[ 'particles' ] as $particle ) {

					$this->render_particle( $particle, $particle['_id'] );

				}

			?>

		</div>

		<?php

	}

}