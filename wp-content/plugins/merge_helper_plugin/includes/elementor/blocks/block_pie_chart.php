<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Pie_Chart extends Widget_Base {

	public function get_script_depends() {
		return [ 'inview', 'circle-progress' ];
	}

	public function get_name() {
		return 'vlt-pie-chart';
	}

	public function get_title() {
		return esc_html__( 'Pie Chart', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-counter-circle vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'progress', 'bar', 'circle', 'chart', 'pie' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Layout', 'vlthemes' ),
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
			'final_value', [
				'label' => esc_html__( 'Chart Value', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
			]
		);

		$this->add_control(
			'counter_html_tag', [
				'label' => esc_html__( 'Counter HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h5',
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
			'show_count', [
				'label' => esc_html__( 'Display Count', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'prefix_label', [
				'label' => esc_html__( 'Prefix Label', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'suffix_label', [
				'label' => esc_html__( 'Suffix Label', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '%'
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Settings', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_SETTINGS
			]
		);

		$this->add_control(
			'chart_animation_duration', [
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
				'default' => [
					'unit' => 'px',
					'size' => 1000,
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'General', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'chart_height', [
				'label' => esc_html__( 'Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 350,
						'step' => 10,
					],
				]
			]
		);

		$this->add_control(
			'chart_thickness', [
				'label' => esc_html__( 'Thickness', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Colors', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'chart_track_color', [
				'label' => esc_html__( 'Track Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'chart_bar_color', [
				'label' => esc_html__( 'Bar Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Typography', 'vlthemes' ),
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
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pie-chart__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-pie-chart__title',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Prefix', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'prefix_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pie-chart__title > .prefix' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'prefix_typography',
				'selector' => '{{WRAPPER}} .vlt-pie-chart__title > .prefix',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Suffix', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'suffix_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pie-chart__title > .suffix' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'suffix_typography',
				'selector' => '{{WRAPPER}} .vlt-pie-chart__title > .suffix',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$style = '';

		$style .= $settings[ 'chart_thickness' ][ 'size' ] ? '--thickness:' . $settings[ 'chart_thickness' ][ 'size' ] . 'px;' : '';
		$style .= $settings[ 'chart_height' ][ 'size' ] ? '--size:' . $settings[ 'chart_height' ][ 'size' ] . 'px;' : '';
		$style .= $settings[ 'chart_track_color' ] ? '--track-color:' . $settings[ 'chart_track_color' ] . ';' : '';
		$style .= $settings[ 'chart_bar_color' ] ? '--bar-color:' . $settings[ 'chart_bar_color' ] . ';' : '';

		$this->add_render_attribute( [
			'pie-chart' => [
				'class' => 'vlt-pie-chart',
				'data-chart-value' => $settings[ 'final_value' ][ 'size' ],
				'data-chart-animation-duration' => $settings[ 'chart_animation_duration' ][ 'size' ],
				'style' => $style
			]
		] );

		?>

		<div <?php echo $this->get_render_attribute_string( 'pie-chart' ); ?>>

			<?php if ( $settings[ 'show_count' ] == 'yes' ) : ?>

				<<?php echo esc_attr( $settings[ 'counter_html_tag' ] ); ?> class="vlt-pie-chart__title">

					<?php if ( isset( $settings[ 'prefix_label' ] ) ): ?>

						<span class="prefix"><?php echo esc_html( $settings[ 'prefix_label' ] ); ?></span>

					<?php endif; ?>

						<span class="counter">0</span>

					<?php if ( isset( $settings[ 'suffix_label' ] ) ): ?>

						<span class="suffix"><?php echo esc_html( $settings[ 'suffix_label' ] ); ?></span>

					<?php endif; ?>

				</<?php echo esc_attr( $settings[ 'counter_html_tag' ] ); ?>>

			<?php endif; ?>

		</div>

		<?php

	}

}