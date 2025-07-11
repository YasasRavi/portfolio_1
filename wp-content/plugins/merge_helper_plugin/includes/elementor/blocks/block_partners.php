<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Partners extends Widget_Base {

	public function get_name() {
		return 'vlt-partners';
	}

	public function get_title() {
		return esc_html__( 'Patners', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-logo vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'partners', 'photo', 'image', 'logo' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Partner', 'vlthemes' ),
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
			'images', [
				'label' => esc_html__( 'Add Images', 'vlthemes' ),
				'show_label' => false,
				'type' => Controls_Manager::GALLERY,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'images', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Partner', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_height', [
				'label' => esc_html__( 'Image Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-partner img' => 'max-height: {{SIZE}}{{UNIT}}',
				],
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
			'image_opacity', [
				'label' => esc_html__( 'Image Opacity', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-partner img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_tab();

		// ANCHOR
		$this->start_controls_tab(
			'tab_' . $first_level++, [
				'label' => esc_html__( 'Hover', 'vlthemes' ),
			]
		);

		$this->add_control(
			'image_opacity_hover', [
				'label' => esc_html__( 'Image Opacity', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-partner:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(), [
				'name' => 'image_filter',
				'selector' => '{{WRAPPER}} .vlt-partner img',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'partners', 'class', 'vlt-partners' );

		?>

		<ul <?php echo $this->get_render_attribute_string( 'partners' ); ?>>

			<?php

				foreach ( $settings[ 'images' ] as $image ) {

					echo '<li class="vlt-partner">';
						$image_url = Group_Control_Image_Size_2::get_attachment_image_src( $image[ 'id' ], 'images', $settings );
						echo '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( Control_Media::get_image_alt( $image ) ) . '" loading="lazy"/>';
					echo '</li>';

				}

			?>

		</ul>

		<?php

	}

}