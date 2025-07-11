<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Phone_Block extends Widget_Base {

	public function get_name() {
		return 'vlt-phone-block';
	}

	public function get_title() {
		return esc_html__( 'Phone Block', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-tel-field vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'phone', 'link', 'action' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Phone Block', 'vlthemes' ),
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
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Make a call',
			]
		);

		$this->add_control(
			'style', [
				'label' => esc_html__( 'Style', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'phone' => esc_html__( 'Phone', 'vlthemes' ),
					'email' => esc_html__( 'Email', 'vlthemes' ),
				],
				'default' => 'phone',
			]
		);

		$this->add_control(
			'phone', [
				'label' => esc_html__( 'Phone', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '+44 987 065 908',
				'label_block' => true,
				'condition' => [
					'style' => 'phone'
				]
			]
		);

		$this->add_control(
			'email', [
				'label' => esc_html__( 'Email', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'hello@miblerr.com',
				'label_block' => true,
				'condition' => [
					'style' => 'email'
				]
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'tel:PHONE or mailto:EMAIL',
				'default' => [
					'url'=> 'tel:+44987065908',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Style', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-phone-block__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size', [
				'label' => esc_html__( 'Icon Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-phone-block__icon' => 'font-size: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'icon_indent', [
				'label' => esc_html__( 'Icon Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-phone-block__icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-phone-block__title',
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-phone-block__title' => 'color: {{VALUE}};',
				],
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
					'{{WRAPPER}} .vlt-phone-block__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-phone-block__text',
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-phone-block__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'phone-block', [
			'class' => [
				'vlt-phone-block',
				'vlt-phone-block--' . $settings[ 'style' ],
			]
		] );

		if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) {

			$this->add_render_attribute( 'link', 'href', $settings[ 'link' ][ 'url' ] );

			if ( $settings[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( $settings[ 'link' ][ 'nofollow' ] ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}

		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'phone-block' ); ?>>

			<?php

				switch( $settings[ 'style' ] ) {

					case 'phone':

						echo '<div class="vlt-phone-block__icon vlt-simple-icon">';
						echo merge_get_icon( 'phone' );
						echo '</div>';

					break;

					case 'email':

						echo '<div class="vlt-phone-block__icon vlt-simple-icon">';
						echo merge_get_icon( 'mail' );
						echo '</div>';

					break;

				}

			?>

			<?php if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) : ?>

				<div class="vlt-phone-block__text">

					<?php if ( ! empty( $settings[ 'title' ] ) ) : ?>

						<h5 class="vlt-phone-block__title vlt-display-2"><?php echo $settings[ 'title' ]; ?></h5>

					<?php endif; ?>

					<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>

						<?php

							switch( $settings[ 'style' ] ) {

								case 'phone':

									echo $settings[ 'phone' ];

								break;

								case 'email':

									echo $settings[ 'email' ];

								break;

							}

						?>

					</a>

				</div>

			<?php endif; ?>

		</div>

		<?php

	}

}