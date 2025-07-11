<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Simple_Image extends Widget_Base {

	public function get_name() {
		return 'vlt-simple-image';
	}

	public function get_title() {
		return esc_html__( 'Simple Image', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-image vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'simple', 'photo', 'image' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Simple Image', 'vlthemes' ),
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
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
			]
		);

		$this->add_control(
			'ratio', [
				'label' => esc_html__( 'Ratio', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'vlthemes' ),
					'1x1' => esc_html__( '1x1', 'vlthemes' ),
					'4x3' => esc_html__( '4x3', 'vlthemes' ),
					'16x9' => esc_html__( '16x9', 'vlthemes' ),
					'21x9' => esc_html__( '21x9', 'vlthemes' ),
				]
			]
		);

		$this->add_control(
			'pinterest', [
				'label' => esc_html__( 'Pinterest', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'link_to', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None', 'vlthemes' ),
					'file' => esc_html__( 'Media File', 'vlthemes' ),
					'custom' => esc_html__( 'Custom URL', 'vlthemes' ),
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'condition' => [
					'link_to' => 'custom',
				],
			]
		);

		$this->add_control(
			'caption', [
				'label' => esc_html__( 'Caption', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'condition' => [
					'link_to' => 'file',
				],
			]
		);

		$this->add_control(
			'gallery_id', [
				'label' => esc_html__( 'Gallery ID', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'link_to' => 'file',
				],
			]
		);

		$this->end_controls_section();

	}

	private function get_link_url( $instance ) {

		if ( 'none' === $instance[ 'link_to' ] ) {
			return false;
		}

		if ( 'custom' === $instance[ 'link_to' ] ) {
			if ( empty( $instance[ 'link' ][ 'url' ] ) ) {
				return false;
			}

			return $instance[ 'link' ];
		}

		return [
			'url' => $instance[ 'image' ][ 'url' ],
		];

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'simple-image', 'class', 'vlt-simple-image' );

		$link = $this->get_link_url( $settings );

		if ( $link ) {

			$this->add_render_attribute( 'link', 'class', 'vlt-simple-image__link' );

			$this->add_link_attributes( 'link', $link );

			if ( 'custom' !== $settings[ 'link_to' ] ) {

				$this->add_render_attribute( 'link', [
					'data-cursor' => 'eye',
					'data-fancybox' => $settings[ 'gallery_id' ],
					'data-caption' => $settings[ 'caption' ]
				] );

			}

		}

		if ( $settings[ 'ratio' ] !== 'none' ) {
			$this->add_render_attribute( 'ratio', 'class', 'ratio ratio-' . $settings[ 'ratio' ] );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'simple-image' ); ?>>

			<?php if ( $settings[ 'pinterest' ] == 'yes' ) : ?>

					<a class="vlt-social-icon vlt-social-icon--style-2 pinterest" href="javascript:;" data-sharer="pinterest" data-image="<?php echo esc_url(  $settings[ 'image' ][ 'url' ] ); ?>"><i class="socicon-pinterest"></i></a>

			<?php endif; ?>

			<?php if ( $link ) : ?>

				<a <?php echo $this->get_render_attribute_string( 'link' ); ?>></a>

			<?php endif; ?>

			<?php if ( $settings[ 'image' ][ 'url' ] ) : ?>

				<?php if ( $settings[ 'ratio' ] !== 'none' ) : ?>

					<div <?php echo $this->get_render_attribute_string( 'ratio' ); ?>>

				<?php endif; ?>

				<?php echo Group_Control_Image_Size_2::get_attachment_image_html( $settings, 'image' ); ?>

				<?php if ( $settings[ 'ratio' ] !== 'none' ) : ?>

					</div>

				<?php endif; ?>

			<?php endif; ?>

		</div>

		<?php

	}

}