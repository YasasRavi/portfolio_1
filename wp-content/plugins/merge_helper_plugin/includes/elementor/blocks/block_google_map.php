<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Google_Map extends Widget_Base {

	public function get_script_depends() {
		return [ 'gmap-api-key' ];
	}

	public function get_name() {
		return 'vlt-google-map';
	}

	public function get_title() {
		return esc_html__( 'Google Map', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-google-maps vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'map', 'google', 'locate' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Google Map', 'vlthemes' ),
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
			'lat', [
				'label' => esc_html__( 'Latitude', 'vlthemes' ),
				'description' => __( '<a href="https://www.latlong.net/" target="_blank">Here is a tool</a> where you can find Latitude &amp; Longitude of your location.' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => '40.713669',
				'default' => '40.713669',
			]
		);

		$this->add_control(
			'lng', [
				'label' => esc_html__( 'Longitude', 'vlthemes' ),
				'description' => __( '<a href="https://www.latlong.net/" target="_blank">Here is a tool</a> where you can find Latitude &amp; Longitude of your location.' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => '-74.007266',
				'default' => '-74.007266',
			]
		);

		$this->add_control(
			'zoom', [
				'label' => esc_html__( 'Zoom Level', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 25,
					],
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'map_height', [
				'label' => esc_html__( 'Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%', 'vh' ],
				'default' => [
					'unit' => 'px',
					'size' => 450,
				],
				'range' => [
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
					'px' => [
						'min' => 40,
						'max' => 1440,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-google-map' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .vlt-google-map' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'map_type', [
				'label' => esc_html__( 'Map Type', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'roadmap' => esc_html__( 'Road Map', 'vlthemes' ),
					'satellite' => esc_html__( 'Satellite', 'vlthemes' ),
					'hybrid' => esc_html__( 'Hybrid', 'vlthemes' ),
					'terrain' => esc_html__( 'Terrain', 'vlthemes' ),
				],
				'default' => 'roadmap',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'gesture_handling', [
				'label' => esc_html__( 'Gesture Handling', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'auto' => esc_html__( 'Auto', 'vlthemes' ),
					'cooperative' => esc_html__( 'Cooperative', 'vlthemes' ),
					'greedy' => esc_html__( 'Greedy', 'vlthemes' ),
					'none' => esc_html__( 'None', 'vlthemes' ),
				],
				'default' => 'auto',
				'description' => __( 'Understand more about Gesture Handling by reading it <a href="https://developers.google.com/maps/documentation/javascript/reference/3/#MapOptions" target="_blank">here.</a> Basically it control how it handles gestures on the map. Used to be draggable and scroll wheel function which is deprecated.' ),
			]
		);

		$this->add_control(
			'zoom_control', [
				'label' => esc_html__( 'Zoom Control', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'zoom_control_position', [
				'label' => esc_html__( 'Control Position', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'RIGHT_BOTTOM' => esc_html__( 'Bottom Right', 'vlthemes' ),
					'TOP_LEFT' => esc_html__( 'Top Left', 'vlthemes' ),
					'TOP_CENTER' => esc_html__( 'Top Center', 'vlthemes' ),
					'TOP_RIGHT' => esc_html__( 'Top Right', 'vlthemes' ),
					'LEFT_CENTER' => esc_html__( 'Left Center', 'vlthemes' ),
					'RIGHT_CENTER' => esc_html__( 'Right Center', 'vlthemes' ),
					'BOTTOM_LEFT' => esc_html__( 'Bottom Left', 'vlthemes' ),
					'BOTTOM_CENTER' => esc_html__( 'Bottom Center', 'vlthemes' ),
					'BOTTOM_RIGHT' => esc_html__( 'Bottom Right', 'vlthemes' ),
				],
				'default' => 'RIGHT_BOTTOM',
				'condition' => [
					'zoom_control' => 'yes',
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'default_ui', [
				'label' => esc_html__( 'Default UI', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'map_type_control', [
				'label' => esc_html__( 'Map Type Control', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'map_type_control_style', [
				'label' => esc_html__( 'Control Style', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'DEFAULT' => esc_html__( 'Default', 'vlthemes' ),
					'HORIZONTAL_BAR' => esc_html__( 'Horizontal Bar', 'vlthemes' ),
					'DROPDOWN_MENU' => esc_html__( 'Dropdown Menu', 'vlthemes' ),
				],
				'default' => 'DEFAULT',
				'condition' => [
					'map_type_control' => 'yes',
				],
			]
		);

		$this->add_control(
			'map_type_control_position', [
				'label' => esc_html__( 'Control Position', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'TOP_LEFT' => esc_html__( 'Top Left (Default)', 'vlthemes' ),
					'TOP_CENTER' => esc_html__( 'Top Center', 'vlthemes' ),
					'TOP_RIGHT' => esc_html__( 'Top Right', 'vlthemes' ),
					'LEFT_CENTER' => esc_html__( 'Left Center', 'vlthemes' ),
					'RIGHT_CENTER' => esc_html__( 'Right Center', 'vlthemes' ),
					'BOTTOM_LEFT' => esc_html__( 'Bottom Left', 'vlthemes' ),
					'BOTTOM_CENTER' => esc_html__( 'Bottom Center', 'vlthemes' ),
					'BOTTOM_RIGHT' => esc_html__( 'Bottom Right', 'vlthemes' ),
				],
				'default' => 'TOP_LEFT',
				'condition' => [
					'map_type_control' => 'yes',
				],
			]
		);

		$this->add_control(
			'streetview_control', [
				'label' => esc_html__( 'Streetview Control', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'streetview_control_position', [
				'label' => esc_html__( 'Streetview Position', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'RIGHT_BOTTOM' => esc_html__( 'Bottom Right (Default)', 'vlthemes' ),
					'TOP_LEFT' => esc_html__( 'Top Left', 'vlthemes' ),
					'TOP_CENTER' => esc_html__( 'Top Center', 'vlthemes' ),
					'TOP_RIGHT' => esc_html__( 'Top Right', 'vlthemes' ),
					'LEFT_CENTER' => esc_html__( 'Left Center', 'vlthemes' ),
					'RIGHT_CENTER' => esc_html__( 'Right Center', 'vlthemes' ),
					'BOTTOM_LEFT' => esc_html__( 'Bottom Left', 'vlthemes' ),
					'BOTTOM_CENTER' => esc_html__( 'Bottom Center', 'vlthemes' ),
					'BOTTOM_RIGHT' => esc_html__( 'Bottom Right', 'vlthemes' ),
				],
				'default' => 'RIGHT_BOTTOM',
				'condition' => [
					'streetview_control' => 'yes',
				],
			]
		);

		$this->add_control(
			'map_style', [
				'label' => esc_html__( 'Map Style', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'description' => __( 'Add style from <a href="https://mapstyle.withgoogle.com/" target="_blank">Google Map Styling Wizard</a> or <a href="https://snazzymaps.com/explore" target="_blank">Snazzy Maps</a>. Copy and Paste the style in the textarea.' ),
				'condition' => [
					'map_type' => 'roadmap',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Marker Pins', 'vlthemes' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'pin_lat', [
				'label' => esc_html__( 'Latitude', 'vlthemes' ),
				'description' => __( '<a href="https://www.latlong.net/" target="_blank">Here is a tool</a> where you can find Latitude &amp; Longitude of your location.' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'pin_lng', [
				'label' => esc_html__( 'Longitude', 'vlthemes' ),
				'description' => __( '<a href="https://www.latlong.net/" target="_blank">Here is a tool</a> where you can find Latitude &amp; Longitude of your location.' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'pin_icon', [
				'label' => esc_html__( 'Marker Icon', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'vlthemes' ),
					'custom' => esc_html__( 'Custom', 'vlthemes' ),
				],
			]
		);

		$repeater->add_control(
			'pin_icon_custom', [
				'label' => esc_html__( 'Choose Image', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'pin_icon' => 'custom'
				]
			]
		);

		$repeater->add_control(
			'pin_title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Pin Title',
			]
		);

		$repeater->add_control(
			'pin_text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => 'Pin content.'
			]
		);

		$this->add_control(
			'pins', [
				'label' => esc_html__( 'Pins', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'show_label' => false,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pin_lat' => '40.713669',
						'pin_lng' => '-74.007266',
						'pin_title' => 'Pin Title',
						'pin_text' => 'Pin content.'
					],
				],
				'title_field' => '{{{ pin_title }}}',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Info Window', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'info_window_width', [
				'label' => esc_html__( 'Width', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 250
				]
			]
		);

		$this->add_responsive_control(
			'delayainfo_window_content_align', [
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
					'justify' => [
						'title' => esc_html__( 'Justify', 'vlthemes' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .vlt-google-map__container' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'info_window_title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-google-map__container h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'info_window_title_typography',
				'selector' => '{{WRAPPER}} .vlt-google-map__container h6',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'info_window_text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-google-map__container div' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'info_window_text_typography',
				'selector' => '{{WRAPPER}} .vlt-google-map__container div',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		// prepend map style
		$map_style = $settings[ 'map_style' ];
		$map_style = strip_tags( $map_style );
		$map_style = preg_replace( '/\s/', '', $map_style );

		// prepend map markers
		$mapmarkers = [];
		foreach ( $settings[ 'pins' ] as $item ) :
			$mapmarkers[] = array(
				'lat' => $item[ 'pin_lat' ],
				'lng' => $item[ 'pin_lng' ],
				'title' => htmlspecialchars( $item[ 'pin_title' ], ENT_QUOTES & ~ENT_COMPAT ),
				'text' => htmlspecialchars( $item[ 'pin_text' ], ENT_QUOTES & ~ENT_COMPAT ),
				'pin_icon' => $item[ 'pin_icon' ],
				'pin_icon_custom' => $item[ 'pin_icon_custom' ] ? $item[ 'pin_icon_custom' ][ 'url' ] : ''
			);
		endforeach;

		$this->add_render_attribute( 'google-map', [
			'class' => 'vlt-google-map',
			'data-map-lat' => $settings[ 'lat' ],
			'data-map-lng' => $settings[ 'lng' ],
			'data-map-zoom' => $settings[ 'zoom' ][ 'size' ],
			'data-map-gesture-handling' => $settings[ 'gesture_handling' ],
			'data-map-zoom-control' => $settings[ 'zoom_control' ],
			'data-map-zoom-control-position' => $settings[ 'zoom_control_position' ],
			'data-map-default-ui' => $settings[ 'default_ui' ],
			'data-map-type' => $settings[ 'map_type' ],
			'data-map-type-control' => $settings[ 'map_type_control' ],
			'data-map-type-control-style' => $settings[ 'map_type_control_style' ],
			'data-map-type-control-position' => $settings[ 'map_type_control_position' ],
			'data-map-streetview-control' => $settings[ 'streetview_control' ],
			'data-map-streetview-position' => $settings[ 'streetview_control_position' ],
			'data-map-info-window-width' => $settings[ 'info_window_width' ][ 'size' ],
			'data-map-locations' => json_encode( $mapmarkers ),
			'data-map-style' => $map_style
		] );

		?>

		<div <?php echo $this->get_render_attribute_string( 'google-map' ); ?>></div>

		<?php

	}

}