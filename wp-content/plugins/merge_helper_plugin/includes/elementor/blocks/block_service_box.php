<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Service_Box extends Widget_Base {

	public function get_name() {
		return 'vlt-service-box';
	}

	public function get_title() {
		return esc_html__( 'Service Box', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-icon-box vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'service', 'box' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Service Box', 'vlthemes' ),
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
				'type' => Controls_Manager::ICONS,
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Service Title'
			]
		);

		$this->add_control(
			'subtitle', [
				'label' => esc_html__( 'Subtitle', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '2 Projects'
			]
		);

		$this->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'I make web designs that engage your audience and create the user experience you want.'
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url'=> '#',
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'link_label', [
				'label' => esc_html__( 'Label', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Watch Pricing',
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

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'background',
				'label' => esc_html__( 'Background', 'vlthemes' ),
				'selector' => '{{WRAPPER}} .vlt-service-box__fill',
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
					'{{WRAPPER}} .vlt-service-box__fill' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .vlt-service-box::before' => 'left: calc({{LEFT}}{{UNIT}} / 2); right: calc({{RIGHT}}{{UNIT}} / 2); height: calc({{LEFT}}{{UNIT}} * 2);',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_size', [
				'label' => esc_html__( 'Icon Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Subtitle', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .vlt-service-box__subtitle',
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h4',
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
				'default' => 'h4',
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

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-service-box__title',
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .vlt-service-box__title' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-service-box__text',
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__text' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'text_indent', [
				'label' => esc_html__( 'Text Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__text' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'link_indent', [
				'label' => esc_html__( 'Link Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-service-box__link' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'service-box', 'class' , 'vlt-service-box' );

		$this->add_render_attribute( 'service-link', [
			'class' => 'vlt-service-box__link vlt-simple-link stretched-link',
			'href' => $settings[ 'link' ][ 'url' ]
		] );

		if ( $settings[ 'link' ][ 'is_external' ] ) {
			$this->add_render_attribute( 'service-link', 'target', '_blank' );
		}

		if ( $settings[ 'link' ][ 'nofollow' ] ) {
			$this->add_render_attribute( 'service-link', 'rel', 'nofollow' );
		}

		// title

		$this->add_render_attribute( 'title', 'class', 'vlt-service-box__title' );

		if ( $settings[ 'title_style' ] !== 'none' ) {
			$this->add_render_attribute( 'title', 'class', $settings[ 'title_style' ] );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'service-box' ); ?>>

			<div class="vlt-service-box__fill"></div>

			<div class="vlt-service-box__header">

				<?php if ( $settings[ 'icon' ][ 'value' ] ) : ?>

					<div class="vlt-service-box__icon">

						<?php Icons_Manager::render_icon( $settings[ 'icon' ], [ 'aria-hidden' => 'true' ] ); ?>

					</div>

				<?php endif; ?>

				<div class="vlt-service-box__meta">

					<?php if ( $settings[ 'subtitle' ] ) : ?>

						<div class="vlt-service-box__subtitle"><?php echo $settings[ 'subtitle' ]; ?></div>

					<?php endif; ?>

					<?php if ( $settings[ 'title' ] ) : ?>

						<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> <?php echo $this->get_render_attribute_string( 'title' ); ?>>

							<?php echo $settings[ 'title' ]; ?>

						</<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

					<?php endif; ?>

				</div>

			</div>

			<div>

				<?php if ( $settings[ 'text' ] ) : ?>

					<p class="vlt-service-box__text"><?php echo $settings[ 'text' ]; ?></p>

				<?php endif; ?>

				<?php if ( $settings[ 'link' ][ 'url' ] ) : ?>

					<a <?php echo $this->get_render_attribute_string( 'service-link' ); ?>>
						<span><?php echo $settings[ 'link_label' ]; ?></span>
						<?php echo merge_get_icon( 'star' ); ?>
					</a>

				<?php endif; ?>

			</div>

		</div>

		<?php

	}

}