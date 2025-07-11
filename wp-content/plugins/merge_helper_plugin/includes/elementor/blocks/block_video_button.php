<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Video_Button extends Widget_Base {

	public function get_script_depends() {
		return [ 'fancybox' ];
	}

	public function get_style_depends() {
		return [ 'fancybox' ];
	}

	public function get_name() {
		return 'vlt-video-button';
	}

	public function get_title() {
		return esc_html__( 'Video Button', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-play vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'video', 'play', 'popup', 'button', 'fancybox' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Video Button', 'vlthemes' ),
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
			'video_type', [
				'label' => esc_html__( 'Video Type', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'vimeo',
				'options' => [
					'youtube'=> esc_html__( 'YouTube', 'vlthemes' ),
					'vimeo'=> esc_html__( 'Vimeo', 'vlthemes' ),
				]
			]
		);

		$this->add_control(
			'caption', [
				'label' => esc_html__( 'Caption', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true
			]
		);

		$this->add_control(
			'gallery_id', [
				'label' => esc_html__( 'Gallery ID', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'url', [
				'label' => esc_html__( 'Video URL', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'url',
				'label_block' => true,
				'default' => 'https://vimeo.com/367945766',
			]
		);

		$this->add_control(
			'start_time', [
				'label' => esc_html__( 'Start Time', 'vlthemes' ),
				'description' => esc_html__( 'Specify a start time (in seconds)', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 0,
				'condition' => [
					'video_type' => 'youtube'
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'end_time', [
				'label' => esc_html__( 'End Time', 'vlthemes' ),
				'description' => esc_html__( 'Specify an end time (in seconds)', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'condition' => [
					'video_type' => 'youtube'
				]
			]
		);

		$this->add_control(
			'auto_play', [
				'label' => esc_html__( 'Auto Play', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'vlthemes' ),
				'label_off' => esc_html__( 'No', 'vlthemes' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mute', [
				'label' => esc_html__( 'Mute', 'vlthemes' ),
				'description' => esc_html__( 'This will play the video muted', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'vlthemes' ),
				'label_off' => esc_html__( 'No', 'vlthemes' ),
				'default' => 'no',
			]
		);

		$this->add_control(
			'loop', [
				'label' => esc_html__( 'Loop', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'vlthemes' ),
				'label_off' => esc_html__( 'No', 'vlthemes' ),
				'default' => 'no',
			]
		);

		$this->add_control(
			'show_controls', [
				'label' => esc_html__( 'Show Controls', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'vlthemes' ),
				'label_off' => esc_html__( 'No', 'vlthemes' ),
				'default' => 'no',
			]
		);

		$this->add_control(
			'video_width', [
				'label' => esc_html__( 'Video Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 640,
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'video_height', [
				'label' => esc_html__( 'Video Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 360,
				],
			]
		);

		$this->add_control(
			'label', [
				'label' => esc_html__( 'Label', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Watch Video',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'label_position', [
				'label' => esc_html__( 'Label Position', 'vlthemes' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'vlthemes' ),
						'icon' => 'eicon-v-align-bottom',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'vlthemes' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
				'condition' => [
					'label!' => '',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'General', 'vlthemes' ),
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
			'button_size', [
				'label' => esc_html__( 'Button Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'em' ],
				'range' => [
					'em' => [
						'min' => 1,
						'max' => 30,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'button_icon_size', [
				'label' => esc_html__( 'Icon Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'em' ],
				'range' => [
					'em' => [
						'min' => 1,
						'max' => 30,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a > i, {{WRAPPER}} .vlt-video-button > a > svg' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'button_border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a::before' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// ANCHOR
		$this->start_controls_tabs(
			'tabs_' . $first_level++
		);

		// ANCHOR
		$this->start_controls_tab(
			'tab_' . $first_level++, [
				'label' =>esc_html__( 'Normal', 'vlthemes' )
			]
		);

		$this->add_control(
			'button_color', [
				'label' =>esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a, {{WRAPPER}} .vlt-video-button > a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color', [
				'label' =>esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a::before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), [
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .vlt-video-button > a::before',
			]
		);

		$this->end_controls_tab();

		// ANCHOR
		$this->start_controls_tab(
			'tab_' . $first_level++, [
				'label' =>esc_html__( 'Hover', 'vlthemes' ),
			]
		);

		$this->add_control(
			'button_color_hover', [
				'label' =>esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color_hover', [
				'label' =>esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button > a:hover::before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), [
				'name' => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .vlt-video-button > a:hover::before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Label', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'label!' => '',
				],
			]
		);

		$this->add_control(
			'label_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button__label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .vlt-video-button__label',
			]
		);

		$this->add_responsive_control(
			'label_margin', [
				'label' => esc_html__( 'Margin', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-video-button__label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings[ 'url' ] ) ) {
			return;
		}

		switch ( $settings[ 'video_type' ] ) {

			case 'youtube':

			$prepend_url = add_query_arg( array(
				'autoplay' => $settings[ 'auto_play' ] == 'yes' ? 1 : 0,
				'loop' => $settings[ 'loop' ] == 'yes' ? 1 : 0,
				'controls' => $settings[ 'show_controls' ] == 'yes' ? 1 : 0,
				'mute' => $settings[ 'mute' ] == 'yes' ? 1 : 0,
				'start' => $settings[ 'start_time' ],
				'end' => $settings[ 'end_time' ],
				'showinfo' => 0
			), $settings[ 'url' ] );

			break;

			case 'vimeo':

			$prepend_url = add_query_arg( array(
				'autoplay' => $settings[ 'auto_play' ] == 'yes' ? 1 : 0,
				'loop' => $settings[ 'loop' ] == 'yes' ? 1 : 0,
				'controls' => $settings[ 'show_controls' ] == 'yes' ? 1 : 0,
				'muted' => $settings[ 'mute' ] == 'yes' ? 1 : 0,
			), $settings[ 'url' ] );

			break;
		}

		$this->add_render_attribute( 'video-button', [
			'class' => [
				'vlt-video-button',
				'vlt-video-button--label-' . $settings[ 'label_position' ]
			]
		] );

		$this->add_render_attribute( 'video-button-link', [
			'data-fancybox' => $settings[ 'gallery_id' ],
			'data-small-btn' => 'true',
			'data-width' => $settings[ 'video_width' ][ 'size' ],
			'data-height' => $settings[ 'video_height' ][ 'size' ],
			'data-caption' => $settings[ 'caption' ],
			'href' => $prepend_url
		] );

		?>

		<div <?php echo $this->get_render_attribute_string( 'video-button' ); ?>>

			<a <?php echo $this->get_render_attribute_string( 'video-button-link' ); ?>>
				<?php echo merge_get_icon( 'play' ); ?>
			</a>

			<?php if ( $settings[ 'label' ] ) : ?>
				<span class="vlt-video-button__label"><?php echo $settings[ 'label' ]; ?></span>
			<?php endif; ?>

		</div>

	<?php

	}

}