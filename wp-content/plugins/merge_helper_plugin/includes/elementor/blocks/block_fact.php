<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Fact extends Widget_Base {

	public function get_name() {
		return 'vlt-fact';
	}

	public function get_title() {
		return esc_html__( 'Fact', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-banner vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'fact' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Fact', 'vlthemes' ),
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
			'avatars', [
				'label' => esc_html__( 'Add Images', 'vlthemes' ),
				'type' => Controls_Manager::GALLERY,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'avatars', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
			]
		);


		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '100+ Happy Customers',
				'separator' => 'before'
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
			'text', [
				'label' => esc_html__( 'Text', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Work with people and brands worldwide.'
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
			'avatars_height', [
				'label' => esc_html__( 'Avatars Height', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-fact__avatars > img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'avatars_indent', [
				'label' => esc_html__( 'Avatars Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-fact' => 'gap: {{SIZE}}{{UNIT}};',
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
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-fact__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-fact__title',
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
			'text_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-fact__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .vlt-fact__text',
			]
		);

		$this->add_control(
			'text_indent', [
				'label' => esc_html__( 'Text Indent', 'vlthemes' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .vlt-fact__text' => 'margin-top: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'fact', 'class', 'vlt-fact' );

		?>

		<div <?php echo $this->get_render_attribute_string( 'fact' ); ?>>

			<?php

				if ( $settings[ 'avatars' ] ) {

					echo '<div class="vlt-fact__avatars">';

					foreach ( $settings[ 'avatars' ] as $image ) {

						$image_url = Group_Control_Image_Size_2::get_attachment_image_src( $image[ 'id' ], 'avatars', $settings );
						echo '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( Control_Media::get_image_alt( $image ) ) . '" loading="lazy"/>';

					}

					echo '</div>';

				}

			?>

			<div class="vlt-fact__content">

				<?php if ( $settings[ 'title' ] ) : ?>
					<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> class="vlt-fact__title"><?php echo $settings[ 'title' ]; ?></<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>
				<?php endif; ?>

				<?php if ( $settings[ 'text' ] ) : ?>

					<p class="vlt-fact__text"><?php echo $settings[ 'text' ]; ?></p>

				<?php endif; ?>

			</div>

		</div>

		<?php

	}

}