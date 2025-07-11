<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Alert_Message extends Widget_Base {

	public function get_name() {
		return 'vlt-alert-message';
	}

	public function get_title() {
		return esc_html__( 'Alert Message', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-alert vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'alert', 'notice', 'message' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Alert Message', 'vlthemes' ),
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
			'icon', [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::ICONS
			]
		);

		$this->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => 'This is an alert message, check it out!',
			]
		);

		$this->add_control(
			'dismiss', [
				'label' => esc_html__( 'Dismiss Button', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'vlthemes' ),
				'label_off' => esc_html__( 'Hide', 'vlthemes' ),
				'default' => 'no',
				'separator' => 'before',
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
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-alert-message' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-alert-message',
			]
		);

		$this->add_responsive_control(
			'padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-alert-message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .vlt-alert-message__dismiss' => 'right: {{RIGHT}}{{UNIT}};'
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'margin', [
				'label' => esc_html__( 'Margin', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-alert-message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-alert-message' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'border',
				'selector' => '{{WRAPPER}} .vlt-alert-message',
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
					'{{WRAPPER}} .vlt-alert-message' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(), [
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .vlt-alert-message',
			]
		);

		$this->add_control(
			'dismiss_button_color', [
				'label' => esc_html__( 'Dismiss Button Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-alert-message__dismiss' => 'color: {{VALUE}};',
				],
				'condition' => [
					'dismiss' => 'yes',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'alert-message', 'class', 'vlt-alert-message' );

		if ( $settings[ 'dismiss' ] == 'yes' ) {
			$this->add_render_attribute( 'alert-message', 'class', 'vlt-alert-message--has-dismiss' );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'alert-message' ); ?>>

			<div class="vlt-alert-message__inner">

				<?php if ( ! empty( $settings[ 'icon' ][ 'value' ] ) ) : ?>

					<?php Icons_Manager::render_icon( $settings[ 'icon' ], [ 'aria-hidden' => 'true' ] ); ?>

				<?php endif; ?>

				<?php

					if ( $settings[ 'text' ] ) :
						echo wp_kses_post( $settings[ 'text' ] );
					endif;

				?>

				<?php if ( $settings[ 'dismiss' ] == 'yes' ) : ?>

					<a href="#" class="vlt-alert-message__dismiss" rel="nofollow">
						<?php echo merge_get_icon( 'close' ); ?>
					</a>

				<?php endif; ?>

			</div>

		</div>

		<?php

	}

}