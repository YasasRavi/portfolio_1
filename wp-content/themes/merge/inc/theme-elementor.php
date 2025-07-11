<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

/**
 * Miblerr Widgets Priority
 */
if ( ! class_exists( 'ElementorPro\Plugin' ) ) {
	add_filter( 'elementor/editor/localize_settings', function( $settings ) {
		if ( ! empty( $settings[ 'promotionWidgets' ] ) ) {
			$settings[ 'promotionWidgets' ] = [];
		}
		return $settings;
	}, 20 );
}

/**
 * Add Jarallax to column/container/section
 */
if ( ! function_exists( 'merge_add_jarallax_to_elementor' ) ) {
	function merge_add_jarallax_to_elementor( $section, $args ) {

		$section->start_controls_section(
			'section_jarallax', [
				'label' => esc_html__( 'Jarallax', 'merge' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$section->add_control(
			'jarallax', [
				'label' => esc_html__( 'Jarallax', 'merge' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'jarallax',
				'prefix_class' => ''
			]
		);

		$section->add_control(
			'jarallax_speed', [
				'label' => esc_html__( 'Speed', 'merge' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1,
						'max' => 2,
						'step' => 0.1
					],
				],
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$section->add_control(
			'jarallax_image_size', [
				'label' => esc_html__( 'Image Size', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'merge' ),
					'auto' => esc_html__( 'Auto', 'merge' ),
					'cover' => esc_html__( 'Cover', 'merge' ),
					'contain' => esc_html__( 'Contain', 'merge' ),
				],
				'default' => '',
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$section->add_control(
			'jarallax_image_position', [
				'label' => esc_html__( 'Image Position', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'merge' ),
					'unset' => esc_html__( 'Unset', 'merge' ),
					'center center' => esc_html__( 'Center Center', 'merge' ),
					'center left' => esc_html__( 'Center Left', 'merge' ),
					'center right' => esc_html__( 'Center Right', 'merge' ),
					'top center' => esc_html__( 'Top Center', 'merge' ),
					'top left' => esc_html__( 'Top Left', 'merge' ),
					'top right' => esc_html__( 'Top Right', 'merge' ),
					'bottom center' => esc_html__( 'Bottom Center', 'merge' ),
					'bottom left' => esc_html__( 'Bottom Left', 'merge' ),
					'bottom right' => esc_html__( 'Bottom Right', 'merge' ),
					'custom' => esc_html__( 'Custom', 'merge' ),
				],
				'default' => '',
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$section->add_control(
			'jarallax_image_position_custom', [
				'label' => esc_html__( 'Image Position', 'merge' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'jarallax_image_position' => 'custom'
				]
			]
		);

		$section->add_control(
			'jarallax_video_link', [
				'label' => esc_html__( 'Video Link', 'merge' ),
				'description' => esc_html__( 'Don\'t forget "mp4:" prefix for link if you use self-hosted video.', 'merge' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$section->end_controls_section();

	}
}
add_action( 'elementor/element/container/section_background/after_section_end', 'merge_add_jarallax_to_elementor', 10, 2 );
add_action( 'elementor/element/section/section_background/after_section_end', 'merge_add_jarallax_to_elementor', 10, 2 );
add_action( 'elementor/element/column/section_background/after_section_end', 'merge_add_jarallax_to_elementor', 10, 2 );

/**
 * Render Jarallax
 */
if ( ! function_exists( 'merge_render_jarallax' ) ) {
	function merge_render_jarallax( $widget ) {
		$settings = $widget->get_settings_for_display();

		if ( isset( $settings[ 'jarallax' ] ) && $settings[ 'jarallax' ] == 'jarallax' ) {
			$widget->add_render_attribute( '_wrapper', 'data-jarallax-video', $settings[ 'jarallax_video_link' ] );
		}

		if ( isset( $settings[ 'jarallax_speed' ] ) ) {
			$widget->add_render_attribute( '_wrapper', 'data-speed', $settings[ 'jarallax_speed' ][ 'size' ] );
		}

		if ( isset( $settings[ 'jarallax_image_size' ] ) ) {
			$widget->add_render_attribute( '_wrapper', 'data-img-size', $settings[ 'jarallax_image_size' ] );
		}

		if ( isset( $settings[ 'jarallax_image_position' ] ) && $settings[ 'jarallax_image_position' ] == 'custom' ) {
			if ( isset( $settings[ 'jarallax_image_position_custom' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-img-position', $settings[ 'jarallax_image_position_custom' ] );
			}
		} else {
			if ( isset( $settings[ 'jarallax_image_position' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-img-position', $settings[ 'jarallax_image_position' ] );
			}
		}

	}
}
add_action( 'elementor/frontend/container/before_render', 'merge_render_jarallax', 10 );
add_action( 'elementor/frontend/section/before_render', 'merge_render_jarallax', 10 );
add_action( 'elementor/frontend/column/before_render', 'merge_render_jarallax', 10 );

/**
 * Add AnimateCSS animations to column/container/section/widget
 */
if ( ! function_exists( 'merge_add_animateCSS_to_elementor' ) ) {
	function merge_add_animateCSS_to_elementor( $section, $args ) {
		$section->start_controls_section(
			'animateCSS_animation_section', [
				'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
				'label' => esc_html__( 'Animation', 'merge' ),
			]
		);

		$section->add_control(
			'animateCSS_animation_name', [
				'label' => esc_html__( 'Animation Name', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => 'None',
					'merge' => 'Merge',
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
					'heartBeat' => 'heartBeat'
				],
				'default' => 'none',
				'frontend_available' => true,
				'render_type' => 'none',
			]
		);

		$section->add_control(
			'animateCSS_animation_delay', [
				'label' => esc_html__( 'Animation Delay', 'merge' ),
				'description' => esc_html__( 'Delay before the animation starts', 'merge' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 50,
				'condition' => [
					'animateCSS_animation_name!' => 'none',
				],
			]
		);

		$section->add_control(
			'animateCSS_animation_duration', [
				'label' => esc_html__( 'Animation Duration', 'merge' ),
				'description' => esc_html__( 'Change the animation duration', 'merge' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 50,
				'condition' => [
					'animateCSS_animation_name!' => 'none',
				],
				'frontend_available' => true,
				'render_type' => 'none',
			]
		);

		$section->end_controls_section();
	}
}
add_action( 'elementor/element/container/section_layout/after_section_end', 'merge_add_animateCSS_to_elementor', 10, 2 );
add_action( 'elementor/element/section/section_layout/after_section_end', 'merge_add_animateCSS_to_elementor', 10, 2 );
add_action( 'elementor/element/column/section_layout/after_section_end', 'merge_add_animateCSS_to_elementor', 10, 2 );
add_action( 'elementor/element/common/_section_style/after_section_end', 'merge_add_animateCSS_to_elementor', 10, 2 );

/**
 * Render AnimateCSS
 */
if ( ! function_exists( 'merge_render_animateCSS_animation' ) ) {
	function merge_render_animateCSS_animation( $widget ) {
		$settings = $widget->get_settings_for_display();

		if ( isset( $settings['_reset_on_devices'] ) ) {
			$widget->add_render_attribute( '_wrapper', 'data-reset-on-devices', $settings['_reset_on_devices'] );
		}

		if ( isset( $settings['_reset_padding_to_container_on_devices'] ) ) {
			$widget->add_render_attribute( '_wrapper', 'data-reset-padding-to-container-on-devices', $settings['_reset_padding_to_container_on_devices'] );
		}

		if ( isset( $settings[ 'animateCSS_animation_name' ] ) && $settings[ 'animateCSS_animation_name' ] !== 'none' ) {

			$widget->add_render_attribute( '_wrapper', 'class', 'vlt-animate-element' );

			if ( ! empty( $settings[ 'animateCSS_animation_name' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-animation-name', $settings[ 'animateCSS_animation_name' ] );
			}

			if ( ! empty( $settings[ 'animateCSS_animation_delay' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-animation-delay', $settings[ 'animateCSS_animation_delay' ] );
			}

			if ( ! empty( $settings[ 'animateCSS_animation_duration' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-animation-duration', $settings[ 'animateCSS_animation_duration' ] );
			}

		}

	}
}

add_action( 'elementor/frontend/section/before_render', 'merge_render_animateCSS_animation', 10 );
add_action( 'elementor/frontend/column/before_render', 'merge_render_animateCSS_animation', 10 );
add_action( 'elementor/frontend/container/before_render', 'merge_render_animateCSS_animation', 10 );
add_action( 'elementor/widget/before_render_content', 'merge_render_animateCSS_animation', 10 );

/**
 * Add AnimateCSS animations to column/container/section/widget
 */
if ( ! function_exists( 'merge_add_options_to_elementor_container' ) ) {
	function merge_add_options_to_elementor_container( $container ) {

		$container->add_control(
			'_sticky_column', [
				'label' => esc_html__( 'Sticky Column', 'merge' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'has-sticky-column',
				'prefix_class' => '',
				'separator' => 'before'
			]
		);

		$container->add_control(
			'_sticky_column_reset_offset', [
				'label' => esc_html__( 'Reset Offset', 'merge' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'has-sticky-column-reset-offset',
				'prefix_class' => '',
				'condition' => [
					'_sticky_column' => 'has-sticky-column'
				]
			]
		);

		$container->add_control(
			'_stretch', [
				'label' => esc_html__( 'Stretch', 'merge' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'prefix_class' => '',
				'separator' => 'before'
			]
		);

		$container->add_control(
			'_stretch_side', [
				'label' => esc_html__( 'Side', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'to-left',
				'options' => [
					'to-left' => esc_html__( 'Left', 'merge' ),
					'to-right' => esc_html__( 'Right', 'merge' )
				],
				'prefix_class' => 'has-stretch-block-',
				'condition' => [
					'_stretch' => 'yes'
				]
			]
		);

		$reset_breakpoints_list = array(
			'desktop' => esc_html__( 'Desktop', 'merge' ),
			'tablet' => esc_html__( 'Tablet', 'merge' ),
			'mobile' => esc_html__( 'Mobile', 'merge' ),
		);

		$container->add_control(
			'_reset_on_devices', [
				'label' => esc_html__( 'Reset On Device', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'label_block' => 'true',
				'default' => [ 'mobile' ],
				'options' => $reset_breakpoints_list,
				'condition' => [
					'_stretch' => 'yes'
				]
			]
		);

		$container->add_control(
			'_padding_to_container', [
				'label' => esc_html__( 'Padding to Container', 'merge' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'prefix_class' => '',
				'separator' => 'before'
			]
		);

		$container->add_control(
			'_padding_to_container_side', [
				'label' => esc_html__( 'Side', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'to-left',
				'options' => [
					'to-left' => esc_html__( 'Left', 'merge' ),
					'to-right' => esc_html__( 'Right', 'merge' )
				],
				'prefix_class' => 'has-padding-block-',
				'condition' => [
					'_padding_to_container' => 'yes'
				]
			]
		);

		$reset_breakpoints_list = array(
			'desktop' => esc_html__( 'Desktop', 'merge' ),
			'tablet' => esc_html__( 'Tablet', 'merge' ),
			'mobile' => esc_html__( 'Mobile', 'merge' ),
		);

		$container->add_control(
			'_reset_padding_to_container_on_devices', [
				'label' => esc_html__( 'Reset On Device', 'merge' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'label_block' => 'true',
				'default' => [ 'mobile' ],
				'options' => $reset_breakpoints_list,
				'condition' => [
					'_padding_to_container' => 'yes'
				]
			]
		);

	}
}
add_action( 'elementor/element/container/section_layout/before_section_end', 'merge_add_options_to_elementor_container', 10, 1 );

/**
 * Add Force padding to container
 */
if ( ! function_exists( 'merge_force_padding_to_elementor_container' ) ) {
	function merge_force_padding_to_elementor_container( $container ) {
		$container->add_control(
			'_force_container_padding', [
				'label' => esc_html__( 'Force Container Padding', 'merge' ),
				'description' => esc_html__( 'Use the default space inside the container.', 'merge' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'has-force-padding',
				'prefix_class' => '',
				'separator' => 'before'
			]
		);
	}
}
add_action( 'elementor/element/container/section_layout_container/before_section_end', 'merge_force_padding_to_elementor_container', 10, 1 );