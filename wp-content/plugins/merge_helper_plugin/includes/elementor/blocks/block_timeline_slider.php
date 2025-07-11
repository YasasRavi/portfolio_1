<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Timeline_Slider extends Widget_Base {

	public function get_name() {
		return 'vlt-timeline-slider';
	}

	public function get_title() {
		return esc_html__( 'Timeline Slider', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-number-field vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'experience', 'timeline', 'slider' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Timeline Slider', 'vlthemes' ),
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
			'logo', [
				'label' => esc_html__( 'Logo', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'logo', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
			]
		);

		$repeater->add_control(
			'logo_height', [
				'label' => esc_html__( 'Logo Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .vlt-timeline-item__brand > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$repeater->add_control(
			'year', [
				'label' => esc_html__( 'Year', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true
			]
		);

		$repeater->add_control(
			'subtitle', [
				'label' => esc_html__( 'Subtitle', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
			]
		);

		$this->add_control(
			'items', [
				'label' => esc_html__( 'Items', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'year' => '2022 - Present',
						'title' => 'Graphic Designer,<br>Art & Co.',
						'text' => 'Which firmament dominion first rule and tree. The seas he i were cattle Under living. It may beast every forth place.',
					],
				],
				'title_field' => '{{{ year }}}',
			]
		);

		$this->add_control(
			'navigation_anchor', [
				'label' => esc_html__( 'Navigation Anchor', 'vlthemes' ),
				'description' => esc_html__( 'Enter class / identifier that the navigation has.', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
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
			'items_per_slide', [
				'label' => esc_html__( 'Items Per Slide', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'speed', [
				'label' => esc_html__( 'Animation Speed', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 1000,
			]
		);

		$this->add_control(
			'autoplay', [
				'label' => esc_html__( 'Autoplay', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed', [
				'label' => esc_html__( 'Autoplay Speed', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes'
				]
			]
		);

		$this->add_control(
			'mousewheel', [
				'label' => esc_html__( 'Mousewheel', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Item Style', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'General', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'item_padding', [
				'label' => esc_html__( 'Item Padding', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .vlt-timeline-item + .vlt-timeline-item' => 'padding-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'item_border_color', [
				'label' => esc_html__( 'Border Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item + .vlt-timeline-item' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Year', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'year_typography',
				'selector' => '{{WRAPPER}} .vlt-timeline-item__year .vlt-badge',
			]
		);

		$this->add_control(
			'year_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item__year .vlt-badge' => 'color: {{VALUE}}; border-color: {{VALUE}};',
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
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-timeline-item__title',
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item__title' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .vlt-timeline-item__subtitle',
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item__subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'subtitle_indent', [
				'label' => esc_html__( 'Text Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item__subtitle' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		// $this->add_control(
		// 	'heading_' . $first_level++, [
		// 		'label' => esc_html__( 'Text', 'vlthemes' ),
		// 		'type' => Controls_Manager::HEADING,
		// 		'separator' => 'before'
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(), [
		// 		'name' => 'text_typography',
		// 		'selector' => '{{WRAPPER}} .vlt-timeline-item__text',
		// 	]
		// );

		// $this->add_control(
		// 	'text_color', [
		// 		'label' => esc_html__( 'Text Color', 'vlthemes' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .vlt-timeline-item__text' => 'color: {{VALUE}};',
		// 		],
		// 	]
		// );

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline-item__link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'timeline-slider' => [
				'class' => 'vlt-timeline-slider swiper',
				'data-navigation-anchor' => $settings[ 'navigation_anchor' ],
				'data-speed' => $settings[ 'speed' ],
				'data-autoplay' => $settings[ 'autoplay' ],
				'data-autoplay-speed' => $settings[ 'autoplay_speed' ],
				'data-mousewheel' => $settings[ 'mousewheel' ],
			]
		] );

		?>

		<div <?php echo $this->get_render_attribute_string( 'timeline-slider' ); ?>>

			<div class="swiper-wrapper" data-cursor="drag">

				<div class="d-none">

					<?php

						$counter = 0;

						foreach ( $settings[ 'items' ] as $item ) {

							echo '<div id="counter-'. $counter .'">';
							echo '<div class="vlt-timeline-tooltip"><div class="vlt-timeline-tooltip__fill"></div><div class="vlt-timeline-tooltip__text">' . $item[ 'text' ] . '</div></div>';
							echo '</div>';

							$counter++;

						}

					?>

				</div>

				<?php


					$counter = 0;

					foreach ( $settings[ 'items' ] as $item ) {

						if ( $counter % $settings[ 'items_per_slide' ] == 0 ) {
							echo '<div class="swiper-slide" data-swiper-slide-index="' . $counter . '">';
						}

						$this->add_render_attribute( 'btn-' . $item[ '_id' ], [
							'class' => 'vlt-timeline-item__link vlt-dot-link stretched-link',
							'href' => $item[ 'link' ][ 'url' ]
						] );

						if ( $item[ 'link' ][ 'is_external' ] ) {
							$this->add_render_attribute( 'btn-' . $item[ '_id' ], 'target', '_blank' );
						}

						if ( $item[ 'link' ][ 'nofollow' ] ) {
							$this->add_render_attribute( 'btn-' . $item[ '_id' ], 'rel', 'nofollow' );
						}

						?>

						<div class="vlt-timeline-item elementor-repeater-item-<?php echo $item['_id']; ?>" data-tippy-template="counter-<?php echo $counter; ?>">

							<?php if ( $item[ 'year' ] ) : ?>
								<div class="vlt-timeline-item__year"><span class="vlt-badge"><?php echo $item[ 'year' ]; ?></span></div>
							<?php endif; ?>

							<div class="vlt-timeline-item__header">

								<?php if ( $item[ 'title' ] ) : ?>

									<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> class="vlt-timeline-item__title">
										<?php echo $item[ 'title' ]; ?>
									</<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

								<?php endif; ?>

								<?php if ( $item[ 'subtitle' ] ) : ?>

									<div class="vlt-timeline-item__subtitle vlt-display-2"><?php echo $item[ 'subtitle' ]; ?></div>

								<?php endif; ?>

							</div>

							<?php if ( $item[ 'logo' ][ 'url' ] ) : ?>
								<div class="vlt-timeline-item__brand">
									<?php echo Group_Control_Image_Size_2::get_attachment_image_html( $item, 'logo' ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $item[ 'link' ][ 'url' ] ) : ?>

								<a <?php echo $this->get_render_attribute_string( 'btn-' . $item[ '_id' ] ); ?>><span class="vlt-dot-link__inner"><?php echo merge_get_icon( 'arrow-right' ); ?><span></span></span></a>

							<?php endif; ?>

						</div>

						<?php

						$counter++;

						if ( $counter % $settings[ 'items_per_slide' ] == 0 ) {
							echo '</div>';
						}

					}

					// close the last group if it is not complete
					if ($counter % $settings[ 'items_per_slide' ] != 0) {
						echo '</div>';
					}

				?>

			</div>

		</div>

		<?php

	}

}