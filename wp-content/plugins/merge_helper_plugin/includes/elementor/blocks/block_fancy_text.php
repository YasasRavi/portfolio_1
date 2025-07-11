<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Fancy_Text extends Widget_Base {

	public function get_name() {
		return 'vlt-fancy-text';
	}

	public function get_title() {
		return esc_html__( 'Fancy Text', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-animation-text vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'fancy', 'typed', 'text', 'animation' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Fancy Text', 'vlthemes' ),
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
			'prefix', [
				'label' => esc_html__( 'Prefix', 'vlthemes' ),
				'placeholder' => esc_html__( 'Enter your prefix text', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'This is the', 'vlthemes' ),
				'separator' => 'before',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'string', [
				'label' => esc_html__( 'String', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'show_label' => false,
				'label_block' => true,
			]
		);

		$this->add_control(
			'strings', [
				'label' => esc_html__( 'Strings', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'string' => 'First string'
					],
					[
						'string' => 'Second string'
					],
					[
						'string' => 'Third string'
					]
				],
				'title_field' => '{{{ string }}}',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'suffix', [
				'label' => esc_html__( 'Suffix', 'vlthemes' ),
				'placeholder' => esc_html__( 'Enter your suffix text', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'of the sentence.', 'vlthemes' ),
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
 				'label' => esc_html__( 'Settings', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_SETTINGS
 			]
		);


		$this->add_control(
			'animation_type', [
				'label' => esc_html__( 'Animation Type', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'typing',
				'options' => [
					'typing' => esc_html__( 'Typing', 'vlthemes' ),
					'fadeIn' => esc_html__( 'Fade', 'vlthemes' ),
					'fadeInUp' => esc_html__( 'Fade Up', 'vlthemes' ),
					'fadeInDown' => esc_html__( 'Fade Down', 'vlthemes' ),
					'fadeInLeft' => esc_html__( 'Fade Left', 'vlthemes' ),
					'fadeInRight' => esc_html__( 'Fade Right', 'vlthemes' ),
					'zoomIn' => esc_html__( 'Zoom', 'vlthemes' ),
					'bounceIn' => esc_html__( 'Bounce', 'vlthemes' ),
					'swing' => esc_html__( 'Swing', 'vlthemes' ),
				],
			]
		);

		$this->add_control(
			'typing_speed', [
				'label' => esc_html__( 'Typing Speed', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 50,
				'condition' => [
					'animation_type' => 'typing',
				],
			]
		);

		$this->add_control(
			'typing_loop', [
				'label' => esc_html__( 'Loop the Typing', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'animation_type' => 'typing',
				],
			]
		);

		$this->add_control(
			'type_cursor', [
				'label' => esc_html__( 'Display Type Cursor', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'animation_type' => 'typing',
				],
			]
		);

		$this->add_control(
			'type_cursor_symbol', [
				'label' => esc_html__( 'Type Cursor Symbol', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '|',
				'condition' => [
					'animation_type' => 'typing',
					'type_cursor' => 'yes',
				],
			]
		);

		$this->add_control(
			'delay', [
				'label' => esc_html__( 'Delay on Change', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 2500
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Text Settings', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h2',
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
					'{{WRAPPER}} .vlt-fancy-text' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Prefix Styles', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'prefix[value]!' => '',
				],
			]
		);

		$this->add_control(
			'prefix_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .prefix' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name' => 'prefix_typography',
				'selector' => '{{WRAPPER}} .prefix',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Fancy Text Styles', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'strings_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strings' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'strings_typography',
				'selector' => '{{WRAPPER}} .strings, {{WRAPPER}} .typed-cursor',
			]
		);

		$this->add_control(
			'strings_background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .strings' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'strings_border',
				'selector' => '{{WRAPPER}} .strings',
			]
		);

		$this->add_control(
			'strings_border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .strings' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'strings_padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .strings' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'strings_margin', [
				'label' => esc_html__( 'Margin', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .strings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'typing_cursor_color', [
				'label' => esc_html__( 'Typing Cursor Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .typed-cursor' => 'color: {{VALUE}};',
				],
				'condition' => [
					'type_cursor' => 'yes',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'suffix_styles', [
				'label' => esc_html__( 'Suffix Styles', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'suffix[value]!' => '',
				],
			]
		);

		$this->add_control(
			'suffix_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .suffix' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'suffix_typography',
				'selector' => '{{WRAPPER}} .suffix',
			]
		);

		$this->end_controls_section();

	}

	public function fancy_text( $settings ) {
		$fancy_text = array();
		foreach ( $settings as $item ) {
			if ( ! empty( $item[ 'string' ] ) ) {
				$fancy_text[] = $item[ 'string' ] ;
			}
		}
		$fancy_text = implode( '|', $fancy_text );
		return $fancy_text;
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'fancy-text', [
			'class' => 'vlt-fancy-text',
			'data-fancy-text' => $this->fancy_text( $settings[ 'strings' ] ),
			'data-animation-type' => $settings[ 'animation_type' ],
			'data-typing-speed' => $settings[ 'typing_speed' ],
			'data-delay' => $settings[ 'delay' ],
			'data-type-cursor' => $settings[ 'type_cursor' ],
			'data-type-cursor-symbol' => $settings[ 'type_cursor_symbol' ],
			'data-typing-loop' => $settings[ 'typing_loop' ],
		] );

		if ( $settings[ 'title_style' ] !== 'none' ) {
			$this->add_render_attribute( 'fancy-text', 'class', $settings[ 'title_style' ] );
		}

		?>

		<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> <?php echo $this->get_render_attribute_string( 'fancy-text' ); ?>>

			<?php if ( ! empty( $settings[ 'prefix' ] ) ) : ?>
				<span class="prefix"><?php echo wp_kses_post( $settings[ 'prefix' ] ); ?></span>
			<?php endif; ?>

			<?php if ( $settings[ 'animation_type' ] == 'typing' ) : ?>
				<span class="strings"></span>
			<?php endif; ?>

			<?php if ( $settings[ 'animation_type' ] !== 'typing' ) : ?>
				<span class="strings" style="display: none;">
					<?php
						$strings_list = '';
						foreach ( $settings[ 'strings' ] as $item ) {
							$strings_list .= $item[ 'string' ] . ', ';
						}
						echo rtrim( $strings_list, ', ');
					?>
				</span>
			<?php endif; ?>

			<?php if ( ! empty( $settings[ 'suffix' ] ) ) : ?>
				<span class="suffix"><?php echo wp_kses_post( $settings[ 'suffix' ] ); ?></span>
			<?php endif; ?>

		</<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

		<div class="clearfix"></div>

	<?php

	}

}