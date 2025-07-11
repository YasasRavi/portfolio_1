<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Pricing_Table extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-pricing-table';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-price-table vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'price', 'table', 'plan', 'pricing' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Header', 'vlthemes' ),
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
			'is_featured', [
				'label' => esc_html__( 'Is Featured?', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

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
				'default' => 'Standard Plan',
			]
		);

		$this->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Creative Package'
			]
		);

		$this->add_control(
			'html_tag', [
				'label' => esc_html__( 'HTML Tag', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h5',
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

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Pricing', 'vlthemes' ),
			]
		);

		$this->add_control(
			'currency_symbol', [
				'label' => esc_html__( 'Curency Symbol', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '$'
			]
		);

		$this->add_control(
			'price', [
				'label' => esc_html__( 'Price', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '39',
			]
		);

		$this->add_control(
			'sale', [
				'label' => esc_html__( 'Sale', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'vlthemes' ),
				'label_off' => esc_html__( 'Off', 'vlthemes' ),
			]
		);

		$this->add_control(
			'original_price', [
				'label' => esc_html__( 'Original Price', 'vlthemes' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 59,
				'condition' => [
					'sale' => 'yes',
				],
			]
		);

		$this->add_control(
			'period', [
				'label' => esc_html__( 'Period', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => '/ per month',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Features', 'vlthemes' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Item', 'vlthemes' ),
			]
		);

		$repeater->add_control(
			'active', [
				'label' => esc_html__( 'Active', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'features_list', [
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'vlthemes' ),
						'active' => 'yes',
					],
					[
						'text' => esc_html__( 'List Item #2', 'vlthemes' ),
						'active' => 'yes',
					],
					[
						'text' => esc_html__( 'List Item #3', 'vlthemes' ),
						'active' => '',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Footer', 'vlthemes' ),
			]
		);

		$this->add_control(
			'footer_template', [
				'label' => esc_html__( 'Choose Template', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->vlthemes_get_elementor_templates(),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Price Table', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'background',
				'label' => esc_html__( 'Background', 'vlthemes' ),
				'selector' => '{{WRAPPER}} .vlt-pricing-table__fill',
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
					'{{WRAPPER}} .vlt-pricing-table__fill' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding', [
				'label' => esc_html__( 'Padding', 'vlthemes' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Header', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'box_size', [
				'label' => esc_html__( 'Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%' ],
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__icon' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'box_background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_border_radius', [
				'label' => esc_html__( 'Border Radius', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__icon' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__icon' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .vlt-pricing-table__icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-pricing-table__title',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Description', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'description_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .vlt-pricing-table__subtitle',
			]
		);

		$this->add_responsive_control(
			'description_indent', [
				'label' => esc_html__( 'Description Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__subtitle' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'header_indent', [
				'label' => esc_html__( 'Header Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Pricing', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Price', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'price_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__price' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .vlt-pricing-table__price',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Currency', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'currency_typography',
				'selector' => '{{WRAPPER}} .currency',
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'currency_size', [
				'label' => esc_html__( 'Size', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .currency' => 'font-size: calc({{SIZE}}em/100)',
				],
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'currency_position', [
				'label' => esc_html__( 'Position', 'vlthemes' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'before' => [
						'title' => esc_html__( 'Before', 'vlthemes' ),
						'icon' => 'eicon-h-align-left',
					],
					'after' => [
						'title' => esc_html__( 'After', 'vlthemes' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'before',
			]
		);

		$this->add_control(
			'currency_vertical_position', [
				'label' => esc_html__( 'Vertical Position', 'vlthemes' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'vlthemes' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'vlthemes' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'vlthemes' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'bottom',
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'selectors' => [
					'{{WRAPPER}} .currency' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'currency_symbol!' => '',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Original Price', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-original' => 'color: {{VALUE}}',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'original_price_typography',
				'selector' => '{{WRAPPER}} .price-original',
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_indent', [
				'label' => esc_html__( 'Price Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .price-original' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'original_price_vertical_position', [
				'label' => esc_html__( 'Vertical Position', 'vlthemes' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'vlthemes' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'vlthemes' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'vlthemes' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'default' => 'bottom',
				'selectors' => [
					'{{WRAPPER}} .price-original' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'sale' => 'yes',
					'original_price!' => '',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Period', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'period_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .period' => 'color: {{VALUE}}',
				],
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'period_typography',
				'selector' => '{{WRAPPER}} .period',
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_control(
			'period_vertical_position', [
				'label' => esc_html__( 'Vertical Position', 'vlthemes' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'top' => [
						'title' => esc_html__( 'Top', 'vlthemes' ),
						'icon' => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'vlthemes' ),
						'icon' => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'vlthemes' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors_dictionary' => [
					'top' => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'default' => 'bottom',
				'selectors' => [
					'{{WRAPPER}} .period' => 'align-self: {{VALUE}}',
				],
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_control(
			'period_indent', [
				'label' => esc_html__( 'Period Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .period' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'period!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'price_indent', [
				'label' => esc_html__( 'Price Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__price' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Features', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'features_list_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'features_active_list_color', [
				'label' => esc_html__( 'Active Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content li.active' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'features_list_typography',
				'selector' => '{{WRAPPER}} .vlt-pricing-table__content li',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Icon', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color', [
				'label' => esc_html__( 'Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content li:not(.active) .icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_active_background_color', [
				'label' => esc_html__( 'Active Background Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content li.active .icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'features_list_indent', [
				'label' => esc_html__( 'Features List Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'features_indent', [
				'label' => esc_html__( 'Features Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__content' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Footer', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'footer_indent', [
				'label' => esc_html__( 'Footer Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-pricing-table__footer' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}

	private function render_currency_symbol( $symbol, $location ) {

		$currency_position = $this->get_settings( 'currency_position' );
		$location_setting = ! empty( $currency_position ) ? $currency_position : 'before';

		if ( ! empty( $symbol ) && $location === $location_setting ) {
			echo '<span class="currency currency--' . $location . '">' . $symbol . '</span>';
		}

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'price-table', 'class', 'vlt-pricing-table' );

		if ( $settings[ 'is_featured' ] == 'yes' ) {
			$this->add_render_attribute( 'price-table', 'class', 'vlt-pricing-table--featured' );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'price-table' ); ?>>

			<div class="vlt-pricing-table__fill"></div>

			<?php if ( $settings[ 'title' ] || $settings[ 'description' ] ) : ?>

				<div class="vlt-pricing-table__header">

					<?php if ( $settings[ 'icon' ][ 'value' ] ) : ?>

						<div class="vlt-pricing-table__icon">

							<?php Icons_Manager::render_icon( $settings[ 'icon' ], [ 'aria-hidden' => 'true' ] ); ?>

						</div>

					<?php endif; ?>

					<div>

						<?php if ( ! empty( $settings[ 'title' ] ) ) : ?>

							<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> class="vlt-pricing-table__title <?php if ( $settings[ 'title_style' ] !== 'none' ) { echo $settings[ 'title_style' ]; } ?>">
								<?php echo $settings[ 'title' ]; ?>
							</<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

						<?php endif; ?>

						<?php if ( ! empty( $settings[ 'description' ] ) ) : ?>

							<p class="vlt-pricing-table__subtitle">
								<?php echo $settings[ 'description' ]; ?>
							</p>

						<?php endif; ?>

					</div>

				</div>

			<?php endif; ?>

			<div class="vlt-divider"></div>

			<div class="vlt-pricing-table__price">

				<?php if ( 'yes' === $settings[ 'sale' ] && ! empty( $settings[ 'original_price' ] ) ) : ?>

					<div class="price-original">
						<?php echo $settings[ 'currency_symbol' ] . $settings[ 'original_price' ]; ?>
					</div>

				<?php endif; ?>

				<?php $this->render_currency_symbol( $settings[ 'currency_symbol' ], 'before' ); ?>

				<?php if ( ! empty( $settings[ 'price' ] ) ) : ?>
					<span class="price"><?php echo $settings[ 'price' ]; ?></span>
				<?php endif; ?>

				<?php $this->render_currency_symbol( $settings[ 'currency_symbol' ], 'after' ); ?>

				<?php if ( ! empty( $settings[ 'period' ] ) ) : ?>
					<span class="period"><?php echo $settings[ 'period' ]; ?></span>
				<?php endif; ?>

			</div>

			<?php if ( ! empty( $settings[ 'features_list' ] ) ) : ?>

				<div class="vlt-pricing-table__content">

					<ul>

						<?php foreach ( $settings[ 'features_list' ] as $item ) : ?>

							<li class="<?php echo $item[ 'active' ] ? 'active' : ''; ?>">

								<?php if ( ! empty( $item[ 'text' ] ) ) : ?>

									<span class="icon"><?php echo merge_get_icon( 'check' ); ?></span>

									<?php echo $item[ 'text' ]; ?>

								<?php endif; ?>

							</li>

						<?php endforeach; ?>

					</ul>

				</div>

			<?php endif; ?>

			<?php if ( ! empty( $settings[ 'footer_template' ] ) ) : ?>

				<div class="vlt-pricing-table__footer">

					<?php

						if ( 'publish' !== get_post_status( $settings[ 'footer_template' ] ) ) {
							return;
						}

						echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $settings[ 'footer_template' ], true );

					?>

				</div>

			<?php endif; ?>

		</div>

		<?php

	}

}