<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Tabs_Images extends Widget_Base {

	public function get_name() {
		return 'vlt-tabs-images';
	}

	public function get_title() {
		return esc_html__( 'Tabs Images', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-tabs vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'tab', 'images' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Tabs Images', 'vlthemes' ),
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
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
			]
		);

		$this->add_control(
			'images', [
				'label' => esc_html__( 'Images', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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

		$this->add_responsive_control(
			'height', [
				'label' => esc_html__( 'Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', '%', 'vh' ],
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
					'{{WRAPPER}} .vlt-tabs-images' => 'height: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tabs-images', 'class', 'vlt-tabs-images' );

		?>

		<ul <?php echo $this->get_render_attribute_string( 'tabs-images' ); ?>>

			<?php

				if ( $settings[ 'images' ] ) {

					foreach ( $settings[ 'images' ] as $image ) {

						if ( $image[ 'image' ][ 'url' ] ) {

							echo '<li class="vlt-tabs-images__image">';

							echo wp_get_attachment_image( $image[ 'image' ][ 'id' ], $image[ 'image_size' ], false, [
								'loading' => 'lazy'
							] );

							echo '</li>';

						}

					}

				}

			?>

		</ul>

		<?php

	}

}