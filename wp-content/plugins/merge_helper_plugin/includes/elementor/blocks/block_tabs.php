<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Tabs extends Widget_Base {

	public function get_name() {
		return 'vlt-tabs';
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-tabs vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'tabs', 'accordion' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Tabs', 'vlthemes' ),
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

		$repeater = new Repeater();

		$repeater->add_control(
			'id', [
				'label' => esc_html__( 'ID', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'tabs', [
				'label' => esc_html__( 'Tabs', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ id }}} | {{{ title }}}',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Tabs', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'tabs_indent', [
				'label' => esc_html__( 'Tabs Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-tabs li + li' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Tab', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// ANCHOR
		$this->start_controls_tabs(
			'tabs_' . $first_level++
		);

		// ANCHOR
		$this->start_controls_tab(
			'tab_' . $first_level++, [
				'label' => esc_html__( 'Normal', 'vlthemes' ),
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Title Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-tab' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-tab' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		// ANCHOR
		$this->start_controls_tab(
			'tab_' . $first_level++, [
				'label' => esc_html__( 'Active', 'vlthemes' ),
			]
		);

		$this->add_control(
			'title_color_active', [
				'label' => esc_html__( 'Title Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-tab.is-active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color_active', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-tab.is-active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-tab',
			]
		);

		$this->add_responsive_control(
			'padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-tab' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vlt-tab' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tabs', 'class', 'vlt-tabs' );

	?>

	<ul <?php echo $this->get_render_attribute_string( 'tabs' ); ?>>

		<?php foreach( $settings[ 'tabs' ] as $key => $tab ) : ?>

			<?php

				if ( $key === array_key_first( $settings[ 'tabs' ] ) ) {
					$active_class = 'is-active';
				} else {
					$active_class = '';
				}

			?>

			<li>

				<?php if ( $tab[ 'title' ] ) : ?>

					<div class="vlt-tab <?php echo esc_attr( $active_class ); ?>" data-tab-id="tab-<?php echo esc_attr( $tab[ 'id' ] ); ?>"><?php echo $tab[ 'title' ]; ?></div>

				<?php endif; ?>

			</li>

		<?php endforeach; ?>

	</ul>

	<?php

	}

}