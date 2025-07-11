<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Countdown extends Widget_Base {

	public function get_name() {
		return 'vlt-countdown';
	}

	public function get_title() {
		return esc_html__( 'Countdown', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-countdown vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'countdown', 'timer' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Countdown', 'vlthemes' )
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
			'due_time', [
				'label' => esc_html__( 'Due Date', 'vlthemes' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => date( 'Y/m/d', strtotime( '+ 1 day' ) ),
			]
		);

		$this->add_control(
			'show_label', [
				'label' => esc_html__( 'Label', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlthemes' ),
				'label_off' => esc_html__( 'Hide', 'vlthemes' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'label_position', [
				'label' => esc_html__( 'Label Position', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Block', 'vlthemes' ),
					'inline' => esc_html__( 'Inline', 'vlthemes' ),
				],
				'condition' => [
					'show_label' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'countdown_label_indent', [
				'label' => esc_html__( 'Label Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown--inline .digits' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .vlt-countdown--block .digits' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_label' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'container_width', [
				'label' => esc_html__( 'Container Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [
					'%',
					'px'
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'columns', [
				'label' => esc_html__( 'Columns', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
					],
				],
				'default' => [
					'size' => 4,
				],
				'tablet_default' => [
					'size' => 2,
				],
				'mobile_default' => [
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown' => 'grid-template-columns: repeat({{SIZE}}, 1fr);',
				],
				'condition' => [
					'label_position' => 'block',
				],
			]
		);

		$this->add_responsive_control(
			'columns_gap', [
				'label' => esc_html__( 'Columns Gap', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown' => 'grid-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Content', 'vlthemes' )
			]
		);

		$this->add_control(
			'weeks', [
				'label' => esc_html__( 'Display Weeks', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => ''
			]
		);

		$this->add_control(
			'weeks_label', [
				'label' => esc_html__( 'Custom Label for Weeks', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Weeks', 'vlthemes' ),
				'description' => esc_html__( 'Leave blank to hide', 'vlthemes' ),
				'condition' => [
					'weeks' => 'yes',
				],
			]
		);

		$this->add_control(
			'days', [
				'label' => esc_html__( 'Display Days', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'days_label', [
				'label' => esc_html__( 'Custom Label for Days', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Days', 'vlthemes' ),
				'description' => esc_html__( 'Leave blank to hide', 'vlthemes' ),
				'condition' => [
					'days' => 'yes',
				],
			]
		);

		$this->add_control(
			'hours', [
				'label' => esc_html__( 'Display Hours', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'hours_label', [
				'label' => esc_html__( 'Custom Label for Hours', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Hours', 'vlthemes' ),
				'description' => esc_html__( 'Leave blank to hide', 'vlthemes' ),
				'condition' => [
					'hours' => 'yes',
				],
			]
		);

		$this->add_control(
			'minutes', [
				'label' => esc_html__( 'Display Minutes', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'minutes_label', [
				'label' => esc_html__( 'Custom Label for Minutes', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Minutes', 'vlthemes' ),
				'description' => esc_html__( 'Leave blank to hide', 'vlthemes' ),
				'condition' => [
					'minutes' => 'yes',
				],
			]
		);

		$this->add_control(
			'seconds', [
				'label' => esc_html__( 'Display Seconds', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'seconds_label', [
				'label' => esc_html__( 'Custom Label for Seconds', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Seconds', 'vlthemes' ),
				'description' => esc_html__( 'Leave blank to hide', 'vlthemes' ),
				'condition' => [
					'seconds' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Boxes', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown__item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), [
				'name' => 'item_box_shadow',
				'selector' => '{{WRAPPER}} .vlt-countdown__item',
			]
		);

		$this->add_responsive_control(
			'item_padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
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

		$this->add_responsive_control(
			'item_align', [
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .vlt-countdown__item' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Digits', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'digits_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .digits' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'digits_typography',
				'selector' => '{{WRAPPER}} .digits',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Label', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'label_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .label',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$get_due_date = esc_attr( $settings[ 'due_time' ] );
		$due_date = date( 'Y/m/d', strtotime( $get_due_date ) );

		$this->add_render_attribute( [
			'countdown' => [
				'class' => [
					'vlt-countdown',
					'vlt-countdown--' . $settings[ 'label_position' ]
				],
				'data-due-date' => $due_date,
			]
		] );

		?>

		<div <?php echo $this->get_render_attribute_string( 'countdown' ); ?>>

			<?php if ( ! empty( $settings[ 'weeks' ] ) ) : ?><div class="vlt-countdown__item vlt-countdown-item"><div class="weeks"><span data-weeks class="digits">00</span><?php if ( ! empty( $settings[ 'weeks_label' ] ) && $settings[ 'show_label' ] == 'yes' ) : ?><span class="label"><?php echo esc_attr( $settings[ 'weeks_label' ] ); ?></span><?php endif; ?></div></div><?php endif; ?>
			<?php if ( ! empty( $settings[ 'days' ] ) ) : ?><div class="vlt-countdown__item vlt-countdown-item"><div class="days"><span data-days class="digits">00</span><?php if ( ! empty( $settings[ 'days_label' ] ) && $settings[ 'show_label' ] == 'yes' ) : ?><span class="label"><?php echo esc_attr( $settings[ 'days_label' ] ); ?></span><?php endif; ?></div></div><?php endif; ?>
			<?php if ( ! empty( $settings[ 'hours' ] ) ) : ?><div class="vlt-countdown__item vlt-countdown-item"><div class="hours"><span data-hours class="digits">00</span><?php if ( ! empty( $settings[ 'hours_label' ] ) && $settings[ 'show_label' ] == 'yes' ) : ?><span class="label"><?php echo esc_attr( $settings[ 'hours_label' ] ); ?></span><?php endif; ?></div></div><?php endif; ?>
			<?php if ( ! empty( $settings[ 'minutes' ] ) ) : ?><div class="vlt-countdown__item vlt-countdown-item"><div class="minutes"><span data-minutes class="digits">00</span><?php if ( ! empty( $settings[ 'minutes_label' ] ) && $settings[ 'show_label' ] == 'yes' ) : ?><span class="label"><?php echo esc_attr( $settings[ 'minutes_label' ] ); ?></span><?php endif; ?></div></div><?php endif; ?>
			<?php if ( ! empty( $settings[ 'seconds' ] ) ) : ?><div class="vlt-countdown__item vlt-countdown-item"><div class="seconds"><span data-seconds class="digits">00</span><?php if ( ! empty( $settings[ 'seconds_label' ] ) && $settings[ 'show_label' ] == 'yes' ) : ?><span class="label"><?php echo esc_attr( $settings[ 'seconds_label' ] ); ?></span><?php endif; ?></div></div><?php endif; ?>

		</div>

		<?php

	}

}