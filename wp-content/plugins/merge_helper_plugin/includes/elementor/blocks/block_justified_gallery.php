<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Justified_Gallery extends Widget_Base {

	public function get_name() {
		return 'vlt-justified-gallery';
	}

	public function get_title() {
		return esc_html__( 'Justified Gallery', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-gallery-justified vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'gallery', 'photo', 'image', 'justified' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Justified Gallery', 'vlthemes' ),
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
			'gallery', [
				'label' => esc_html__( 'Add Images', 'vlthemes' ),
				'type' => Controls_Manager::GALLERY,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'gallery', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
			]
		);

		$this->add_control(
			'pinterest', [
				'label' => esc_html__( 'Pinterest', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
			'row_height', [
				'label' => esc_html__( 'Row Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 600,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 360
				]
			]
		);

		$this->add_control(
			'margins', [
				'label' => esc_html__( 'Margins', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30
				]
			]
		);

		$this->add_control(
			'last_row', [
				'label' => esc_html__( 'Last Row', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'justify',
				'options' => [
					'justify' => esc_html__( 'Justify', 'vlthemes' ),
					'nojustify' => esc_html__( 'Nojustify', 'vlthemes' )
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'justified-gallery', [
			'class' => 'vlt-justified-gallery',
			'data-row-height' => $settings[ 'row_height' ][ 'size' ],
			'data-margins' => $settings[ 'margins' ][ 'size' ],
			'data-last-row' => $settings[ 'last_row' ]
		] );

		?>

		<div <?php echo $this->get_render_attribute_string( 'justified-gallery' ); ?>>

			<?php

				foreach ( $settings[ 'gallery' ] as $image ) {

					echo '<div class="vlt-simple-image">'; ?>

						<?php if ( $settings[ 'pinterest' ] == 'yes' ) : ?>

							<a class="vlt-social-icon vlt-social-icon--style-2 pinterest" href="javascript:;" data-sharer="pinterest" data-image="<?php echo wp_get_attachment_image_src( $image[ 'id' ], 'full' )[0]; ?>"><i class="socicon-pinterest"></i></a>

						<?php endif; ?>

					<?php
						echo '<a class="vlt-simple-image__link" data-cursor="eye" data-fancybox="' . esc_attr( $this->get_id() ) . '" href="' . wp_get_attachment_image_src( $image[ 'id' ], 'full' )[0] . '"></a>';

						$image_url = Group_Control_Image_Size_2::get_attachment_image_src( $image[ 'id' ], 'gallery', $settings );
						echo '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( Control_Media::get_image_alt( $image ) ) . '" loading="lazy"/>';

					echo '</div>';

				}

			?>

		</div>

		<?php

	}

}