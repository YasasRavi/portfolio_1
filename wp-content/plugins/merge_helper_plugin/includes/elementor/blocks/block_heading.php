<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Heading extends Widget_Base {

	public function get_name() {
		return 'vlt-heading';
	}

	public function get_title() {
		return esc_html__( 'Heading', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-t-letter vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'heading', 'title', 'text' ];
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
				'label' => esc_html__( 'Title', 'vlthemes' ),
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
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your title', 'vlthemes' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'vlthemes' ),
			]
		);

		$this->add_control(
			'html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h1',
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
				'default' => 'none',
				'options' => self::get_display_titles()
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'separator' => 'before'
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
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-heading',
			]
		);

		$this->add_control(
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-heading' => 'color: {{VALUE}};',
				],
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
			'blend_mode', [
				'label' => esc_html__( 'Blend Mode', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'vlthemes' ),
					'multiply' => esc_html__( 'Multiply', 'vlthemes' ),
					'screen' => esc_html__( 'Screen', 'vlthemes' ),
					'overlay' => esc_html__( 'Overlay', 'vlthemes' ),
					'darken' => esc_html__( 'Darken', 'vlthemes' ),
					'lighten' => esc_html__( 'Lighten', 'vlthemes' ),
					'color-dodge' => esc_html__( 'Color Dodge', 'vlthemes' ),
					'saturation' => esc_html__( 'Saturation', 'vlthemes' ),
					'color' => esc_html__( 'Color', 'vlthemes' ),
					'difference' => esc_html__( 'Difference', 'vlthemes' ),
					'exclusion' => esc_html__( 'Exclusion', 'vlthemes' ),
					'hue' => esc_html__( 'Hue', 'vlthemes' ),
					'luminosity' => esc_html__( 'Luminosity', 'vlthemes' ),
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-heading' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'heading', [
			'class' => 'vlt-heading',
			'id' => 'link-to-' . $this->get_ID()
		] );

		if ( $settings[ 'display_title' ] !== 'none' ) {
			$this->add_render_attribute( 'heading', 'class', 'vlt-' . $settings[ 'display_title' ] );
		}

		if ( $settings[ 'link' ][ 'url' ] ) {

			$this->add_render_attribute( 'link', [
				'href' => $settings[ 'link' ][ 'url' ]
			] );

			if ( $settings[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( $settings[ 'link' ][ 'nofollow' ] ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}

			if ( $settings[ 'stroke' ] !== 'yes' ) {
				$this->add_render_attribute( 'link', 'class', 'vlt-underline-link' );
			}

		}

		if ( $settings[ 'title_style' ] !== 'none' ) {
			$this->add_render_attribute( 'heading', 'class', $settings[ 'title_style' ] );
		}

		if ( $settings[ 'stroke' ] == 'yes' ) {
			$this->add_render_attribute( 'heading', 'class', 'vlt-is-stroke' );
		}

		?>

		<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> <?php echo $this->get_render_attribute_string( 'heading' ); ?>>

			<?php if ( $settings[ 'link' ][ 'url' ] ) : ?>
				<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
			<?php endif; ?>

			<?php if ( $settings[ 'title' ] ) : ?>
				<?php echo $settings[ 'title' ]; ?>
			<?php endif; ?>

			<?php if ( $settings[ 'link' ][ 'url' ] ) : ?>
				</a>
			<?php endif; ?>

		</<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

	<?php

	}

}