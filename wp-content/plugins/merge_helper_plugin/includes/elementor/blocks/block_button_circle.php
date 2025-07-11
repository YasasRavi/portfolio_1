<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Button_Circle extends Widget_Base {

	public function get_name() {
		return 'vlt-button-circle';
	}

	public function get_title() {
		return esc_html__( 'Button Circle', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-button vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'button', 'link', 'action', 'circle' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Button Circle', 'vlthemes' ),
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
			'fill', [
				'label' => esc_html__( 'Fill', 'vlthemes' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content', [
				'label' => esc_html__( 'Content', 'vlthemes' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url'=> '#',
				]
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

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Button Style', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color', [
				'label' => esc_html__( 'Content Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-btn-circle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'fill_background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-btn-circle__fill' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'button-circle' => [
				'class' => 'vlt-btn-circle',
				'role' => 'button'
			]
		] );

		if ( $settings[ 'link' ][ 'url' ] ) {

			$this->add_render_attribute( 'button-circle', 'href', $settings[ 'link' ][ 'url' ] );

			if ( $settings[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'button-circle', 'target', '_blank' );
			}

			if ( $settings[ 'link' ][ 'nofollow' ] ) {
				$this->add_render_attribute( 'button-circle', 'rel', 'nofollow' );
			}

		}

		?>

		<a <?php echo $this->get_render_attribute_string( 'button-circle' ); ?>>

			<?php if ( ! empty( $settings[ 'fill' ][ 'value' ] ) ) : ?>

				<span class="vlt-btn-circle__fill">

					<?php Icons_Manager::render_icon( $settings[ 'fill' ], [ 'aria-hidden' => 'true' ] ); ?>

				</span>

			<?php endif; ?>

			<?php if ( ! empty( $settings[ 'content' ][ 'value' ] ) ) : ?>

				<span class="vlt-btn-circle__content">

					<?php Icons_Manager::render_icon( $settings[ 'content' ], [ 'aria-hidden' => 'true' ] ); ?>

				</span>

			<?php endif; ?>

		</a>

		<?php

	}

}