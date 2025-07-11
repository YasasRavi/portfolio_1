<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Marquee_Text extends Widget_Base {

	public function get_name() {
		return 'vlt-marquee-text';
	}

	public function get_title() {
		return esc_html__( 'Marquee Text', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-animation vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'text', 'marquee' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Marquee Text', 'vlthemes' ),
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
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'speed', [
				'label' => esc_html__( 'Animation Duration', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'step' => 10,
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Marquee Text', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-marquee-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-marquee-text',
			]
		);

		$this->add_control(
			'stroke', [
				'label' => esc_html__( 'Stroke', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'stroke_fill_width', [
				'label' => esc_html__( 'Stroke Fill Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 1
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-is-stroke' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'stroke!' => '',
				],
			]
		);

		$this->add_control(
			'text_width', [
				'label' => esc_html__( 'Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%', 'vw' ],
				'selectors' => [
					'{{WRAPPER}} [data-marquee-text]' => 'min-width: {{SIZE}}{{UNIT}};'
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'marquee-text', [
			'class' => 'vlt-marquee-text',
			'data-marquee' => $settings[ 'speed' ]
		] );

		if ( $settings[ 'stroke' ] == 'yes' ) {
			$this->add_render_attribute( 'marquee-text', 'class', 'vlt-is-stroke' );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'marquee-text' ); ?>>

			<?php

				if ( $settings[ 'text' ] ) {
					echo '<span data-marquee-text>' . $settings[ 'text' ] . '</span>';
					echo '<span data-marquee-text>' . $settings[ 'text' ] . '</span>';
					echo '<span data-marquee-text>' . $settings[ 'text' ] . '</span>';
				}

			?>

		</div>

		<?php

	}

}