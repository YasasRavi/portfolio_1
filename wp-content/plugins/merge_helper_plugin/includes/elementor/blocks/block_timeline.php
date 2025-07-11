<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Timeline extends Widget_Base {

	public function get_name() {
		return 'vlt-timeline';
	}

	public function get_title() {
		return esc_html__( 'Timeline', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-time-line vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'time', 'line', 'timeline' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Timeline', 'vlthemes' ),
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
			'date', [
				'label' => esc_html__( 'Date', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'position', [
				'label' => esc_html__( 'Position', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
			]
		);

		$repeater->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'items', [
				'label' => esc_html__( 'List Items', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'date' => '2017',
						'position' => 'Stevens Institute of Technology',
						'title' => 'User Experience',
						'link' => [ 'url'=> '#' ],
						'text' => 'Divided won\'t have is fourth give, fly together it creepeth day two it beginning gathered. Is his divide brought.',
					],
					[
						'date' => '2013',
						'position' => 'CUNY',
						'title' => 'Fronted Development',
						'link' => [ 'url'=> '#' ],
						'text' => 'Air created beast dry firmament greater beast. Land have female Midst moved meat set there grass evening.',
					],
					[
						'date' => '2010',
						'position' => 'The New School',
						'title' => 'Graphic Designer',
						'link' => [ 'url'=> '#' ],
						'text' => 'Said won\'t earth female to cattle every have tree creature deep and gathering under thing heaven blessed.',
					],
				],
				'title_field' => '{{{ date }}} - {{{ title }}}',
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
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Line', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'line_color', [
				'label' => esc_html__( 'Border Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Dot', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'dot_border_color', [
				'label' => esc_html__( 'Border Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content::before' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'dot_background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content::before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Meta', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'meta_padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Content', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'content_padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Meta', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Date', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'date_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__meta-date' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .vlt-timeline__meta-date'
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Position', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'position_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__meta-position' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'position_typography',
				'selector' => '{{WRAPPER}} .vlt-timeline__meta-position'
			]
		);

		$this->add_responsive_control(
			'position_indent', [
				'label' => esc_html__( 'Position Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__meta-position' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Content', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING
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
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content-title' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-timeline__content-title'
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content-text' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-timeline__content-text'
			]
		);

		$this->add_responsive_control(
			'text_indent', [
				'label' => esc_html__( 'Text Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-timeline__content-text' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'timeline', 'class', 'vlt-timeline' );

		?>

		<ul <?php echo $this->get_render_attribute_string( 'timeline' ); ?>>

			<?php foreach ( $settings[ 'items' ] as $item ) : ?>

				<?php

					$link_key = 'link_' . $item[ '_id' ];

					if ( $item[ 'link' ][ 'url' ] ) {

						$this->add_render_attribute( $link_key, [
							'class' => 'vlt-underline-link',
							'href' => $item[ 'link' ][ 'url' ]
						] );

						if ( $item[ 'link' ][ 'is_external' ] ) {
							$this->add_render_attribute( $link_key, 'target', '_blank' );
						}

						if ( $item[ 'link' ][ 'nofollow' ] ) {
							$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
						}

					}

				?>

				<li class="vlt-timeline__item">

					<div class="vlt-timeline__meta">

						<?php if ( $item[ 'date' ] ) : ?>

							<span class="vlt-timeline__meta-date <?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>"><?php echo $item[ 'date' ]; ?></span>

						<?php endif; ?>

						<?php if ( $item[ 'position' ] ) : ?>

							<span class="vlt-timeline__meta-position"><?php echo $item[ 'position' ]; ?></span>

						<?php endif; ?>

					</div>

					<div class="vlt-timeline__content">

						<?php if ( $item[ 'title' ] ) : ?>

							<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> class="vlt-timeline__content-title <?php if ( $settings[ 'title_style' ] !== 'none' ) { echo $settings[ 'title_style' ]; } ?>">

								<?php if ( $item[ 'link' ][ 'url' ] ) : ?>

									<a <?php echo $this->get_render_attribute_string( $link_key ); ?>>

								<?php endif; ?>

								<?php echo $item[ 'title' ]; ?>

								<?php if ( $item[ 'link' ][ 'url' ] ) : ?>

									</a>

								<?php endif; ?>

							</<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

						<?php endif; ?>

						<?php if ( $item[ 'text' ] ) : ?>

							<p class="vlt-timeline__content-text"><?php echo $item[ 'text' ]; ?></p>

						<?php endif; ?>

					</div>

				</li>

			<?php endforeach; ?>

		</ul>

	<?php

	}

}