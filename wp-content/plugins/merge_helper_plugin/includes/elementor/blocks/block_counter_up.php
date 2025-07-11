<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Counter_Up extends Widget_Base {

	public function get_name() {
		return 'vlt-counter-up';
	}

	public function get_title() {
		return esc_html__( 'Counter Up', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-counter vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'count', 'counter', 'numbers' ];
	}

	public static function get_display_titles() {
		return [
			'none' => esc_html__( 'None', 'vlthemes' ),
			'display-1' => esc_html__( 'Display 1', 'vlthemes' ),
			'display-2' => esc_html__( 'Display 2', 'vlthemes' )
		];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Counter Up', 'vlthemes' ),
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
			'ending_number', [
				'label' => esc_html__( 'Ending Number', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1200,
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Counter Number',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
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
				]
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
			'display_title', [
				'label' => esc_html__( 'Display Title', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'display-1',
				'options' => self::get_display_titles()
			]
		);

		$this->add_control(
			'prefix', [
				'label' => esc_html__( 'Number Prefix', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => '~',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'suffix', [
				'label' => esc_html__( 'Number Suffix', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => 'k'
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
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
			'animation_speed', [
				'label' => esc_html__( 'Animation Duration', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 2000,
				'min' => 100,
				'step' => 100,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'thousand_separator', [
				'label' => esc_html__( 'Thousand Separator', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlthemes' ),
				'label_off' => esc_html__( 'Hide', 'vlthemes' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'thousand_separator_char', [
				'label' => esc_html__( 'Separator', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'vlthemes' ),
					'.' => esc_html__( 'Dot', 'vlthemes' ),
					' ' => esc_html__( 'Space', 'vlthemes' ),
				],
				'condition' => [
					'thousand_separator' => 'yes',
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

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Number', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'number_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .vlt-counter-up__number',
			]
		);

		$this->add_control(
			'prefix_color', [
				'label' => esc_html__( 'Prefix Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__number .prefix' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'suffix_color', [
				'label' => esc_html__( 'Suffix Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__number .suffix' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'number_width', [
				'label' => esc_html__( 'Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__number' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'number_padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'number_margin', [
				'label' => esc_html__( 'Margin', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-counter-up__title',
			]
		);

		$this->add_control(
			'title_indent', [
				'label' => esc_html__( 'Title Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-counter-up__title' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'counter-up' => [
				'class' => 'vlt-counter-up',
				'data-animation-speed' => $settings[ 'animation_speed' ]
			]
		] );

		if ( ! empty( $settings[ 'thousand_separator' ] ) ) {
			$delimiter = empty( $settings[ 'thousand_separator_char' ] ) ? ',' : $settings[ 'thousand_separator_char' ];
			$this->add_render_attribute( 'counter-up', 'data-delimiter', $delimiter );
		}

		$this->add_render_attribute( 'title', 'class', 'vlt-counter-up__title' );

		if ( $settings[ 'title_style' ] !== 'none' ) {
			$this->add_render_attribute( 'title', 'class', $settings[ 'title_style' ] );
		}

		if ( $settings[ 'display_title' ] !== 'none' ) {
			$this->add_render_attribute( 'title', 'class', 'vlt-' . $settings[ 'display_title' ] );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'counter-up' ); ?>>

			<div class="vlt-counter-up__number">

				<?php if ( ! empty( $settings[ 'prefix' ] ) ) : ?>
					<span class="prefix"><?php echo $settings[ 'prefix' ]; ?></span>
				<?php endif; ?>

				<?php

					if ( $settings[ 'ending_number' ] ) {
						echo '<span class="counter" data-value="' . $settings[ 'ending_number' ] . '">';
						echo $settings[ 'ending_number' ];
						echo '</span>';
					}

				?>

				<?php if ( ! empty( $settings[ 'suffix' ] ) ) : ?>
					<span class="suffix"><?php echo $settings[ 'suffix' ]; ?></span>
				<?php endif; ?>

			</div>

			<?php if ( $settings[ 'title' ] ) : ?>
				<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings[ 'title' ]; ?></<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>
			<?php endif; ?>

		</div>

	<?php

	}

}