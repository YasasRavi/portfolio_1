<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Award_Item extends Widget_Base {

	public function get_name() {
		return 'vlt-award-item';
	}

	public function get_title() {
		return esc_html__( 'Award Item', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-rating vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'award', 'logo', 'image' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Award Item', 'vlthemes' ),
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
			'ending_number', [
				'label' => esc_html__( 'Number', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 19
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Honors'
			]
		);

		$this->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Fish living female life, saying years gathering seed abundantly land.'
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
				'default' => 'All Awards',
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
				'label' => esc_html__( 'Logo', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'logo_size', [
				'label' => esc_html__( 'Logo Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__logo' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'logo_indent', [
				'label' => esc_html__( 'Logo Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'logo_border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__logo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'logo_padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .vlt-award-item__logo' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__logo' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Number', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'number_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .vlt-award-item__number',
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
				'default' => 'h6',
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
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-award-item__title',
			]
		);

		$this->add_control(
			'title_indent', [
				'label' => esc_html__( 'Title Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
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

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'description_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .vlt-award-item__description',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .vlt-award-item__link',
			]
		);

		$this->add_control(
			'link_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_indent', [
				'label' => esc_html__( 'Link Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-award-item__link' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'award', [
			'class' => 'vlt-award-item',
			'data-animation-speed' => $settings[ 'animation_speed' ]
		] );

		if ( ! empty( $settings[ 'thousand_separator' ] ) ) {
			$delimiter = empty( $settings[ 'thousand_separator_char' ] ) ? ',' : $settings[ 'thousand_separator_char' ];
			$this->add_render_attribute( 'award', 'data-delimiter', $delimiter );
		}

		if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) {

			$this->add_render_attribute( 'award-link', [
				'class' => 'vlt-simple-link vlt-award-item__link',
				'role' => 'button',
				'href' => $settings[ 'link' ][ 'url' ]
			] );

			if ( $settings[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'award-link', 'target', '_blank' );
			}

			if ( $settings[ 'link' ][ 'nofollow' ] ) {
				$this->add_render_attribute( 'award-link', 'rel', 'nofollow' );
			}

		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'award' ); ?>>

			<div class="vlt-award-item__logo">

				<?php

					if ( $settings[ 'icon' ][ 'value' ] ) {

						Icons_Manager::render_icon( $settings[ 'icon' ], [ 'aria-hidden' => 'true' ] );

					}

				?>

				<?php

					if ( $settings[ 'ending_number' ] ) {
						echo '<div class="vlt-award-item__number">';
						echo '<span class="counter" data-value="' . $settings[ 'ending_number' ] . '">';
						echo $settings[ 'ending_number' ];
						echo '</span>';
						echo '</div>';
					}

				?>

				<?php if ( $settings[ 'title' ] ) : ?>
					<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> class="vlt-award-item__title vlt-display-2"><?php echo $settings[ 'title' ]; ?></<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>
				<?php endif; ?>

			</div>

			<div class="vlt-award-item__content">

				<?php if ( $settings[ 'description' ] ) : ?>
					<p class="vlt-award-item__description"><?php echo $settings[ 'description' ]; ?></p>
				<?php endif; ?>

				<?php if ( $settings[ 'link' ][ 'url' ] ) : ?>
					<a <?php echo $this->get_render_attribute_string( 'award-link' ); ?>>
						<span><?php echo $settings[ 'link_label' ]; ?></span>
						<?php echo merge_get_icon( 'star' ); ?>
					</a>
				<?php endif; ?>

			</div>

		</div>

		<?php

	}

}