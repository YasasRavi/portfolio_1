<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Page_Title extends Widget_Base {

	public function get_name() {
		return 'vlt-page-title';
	}

	public function get_title() {
		return esc_html__( 'Page Title', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-archive-title vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'page', 'title', 'heading' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Page Title', 'vlthemes' ),
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
			'style', [
				'label' => esc_html__( 'Style', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'vlthemes' ),
					'style-2' => esc_html__( 'Style 2', 'vlthemes' ),
					'style-3' => esc_html__( 'Style 3', 'vlthemes' )
				],
			]
		);

		$this->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'style' => [ 'style-2', 'style-3' ]
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'condition' => [
					'style' => [ 'style-2', 'style-3' ]
				],
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Page Title'
			]
		);

		$this->add_control(
			'subtitle', [
				'label' => esc_html__( 'Subtitle', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'breadcrumbs',
				'options' => [
					'none' => esc_html__( 'None', 'vlthemes' ),
					'text' => esc_html__( 'Text', 'vlthemes' ),
					'breadcrumbs' => esc_html__( 'Breadcrumbs', 'vlthemes' )
				]
			]
		);

		$this->add_control(
			'text', [
				'label' => esc_html__( 'Subtitle', 'vlthemes' ),
				'type' => Controls_Manager::TEXTAREA,
				'condition' => [
					'subtitle' => [ 'text' ]
				],
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
				'selectors' => [
					'{{WRAPPER}} .vlt-page-title' => 'text-align: {{VALUE}};'
				],
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

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
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
			'large_heading', [
				'label' => esc_html__( 'Large Heading', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-page-title__title',
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-page-title__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Subtitle', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'subtitle!' => 'none'
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .vlt-breadcrumbs, {{WRAPPER}} .vlt-page-title__subtitle',
				'condition' => [
					'subtitle!' => 'none'
				],
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-breadcrumbs, {{WRAPPER}} .vlt-page-title__subtitle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'subtitle!' => 'none'
				],
			]
		);

		$this->add_control(
			'subtitle_link_color_hover', [
				'label' => esc_html__( 'Link Color Hover', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-breadcrumbs a:hover, {{WRAPPER}} .vlt-page-title__subtitle a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'subtitle!' => 'none'
				],
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Overlay', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'style' => [ 'style-2', 'style-3' ]
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'overlay_color', [
				'label' => esc_html__( 'Overlay Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-page-title__overlay' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => [ 'style-2', 'style-3' ]
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'page-title' => [
				'class' => [
					'vlt-page-title',
					'vlt-page-title--' . $this->get_id(),
					'vlt-page-title--' . $settings[ 'style' ]
				]
			]
		] );

		if ( ! empty( $settings[ 'image' ][ 'url' ] ) ) {
			$this->add_render_attribute( 'page-title', 'class', 'jarallax' );
		}

		$this->add_render_attribute( 'heading', 'class', 'vlt-page-title__title' );

		if ( $settings[ 'title_style' ] !== 'none' ) {
			$this->add_render_attribute( 'heading', 'class', $settings[ 'title_style' ] );
		}

		if ( $settings[ 'large_heading' ] == 'yes' ) {
			$this->add_render_attribute( 'heading', 'class', 'large-heading' );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'page-title' ); ?>>

			<?php

				switch( $settings[ 'style' ] ) {

					case 'style-1':

						echo '<div class="container">';

							if ( $settings[ 'title' ] ) {
								$this->add_render_attribute( 'heading', 'class', 'h1' );
								echo '<' . Utils::validate_html_tag( $settings[ 'html_tag' ] ) . ' ' . $this->get_render_attribute_string( 'heading' ) . '>' . $settings[ 'title' ] . '</' . Utils::validate_html_tag( $settings[ 'html_tag' ] ) . '>';
							}

							if ( $settings[ 'subtitle' ] == 'text' && $settings[ 'text' ] ) {

								echo '<p class="vlt-page-title__subtitle">' . $settings[ 'text' ] . '</p>';

							} elseif ( $settings[ 'subtitle' ] == 'breadcrumbs' && function_exists( 'merge_get_breadcrumbs' ) ) {

								echo merge_get_breadcrumbs();

							}

						echo '</div>';

					break;

					case 'style-2':

						if ( $settings[ 'image' ][ 'url' ] ) {

							echo Group_Control_Image_Size_2::get_attachment_image_html( $settings, 'image', 'image', 'jarallax-img' );

						}

						echo '<div class="vlt-page-title__overlay"></div>';

						echo '<div class="container lax" data-lax-translate-y="0 0, (-elh*2) elh" data-lax-opacity="0 1, (-elh*2) 0" data-lax-anchor=".vlt-page-title--' . $this->get_id() . '">';

							if ( $settings[ 'title' ] ) {
								echo '<' . Utils::validate_html_tag( $settings[ 'html_tag' ] ) . ' ' . $this->get_render_attribute_string( 'heading' ) . '>' . $settings[ 'title' ] . '</' . Utils::validate_html_tag( $settings[ 'html_tag' ] ) . '>';
							}

							if ( $settings[ 'subtitle' ] == 'text' && $settings[ 'text' ] ) {

								echo '<p class="vlt-page-title__subtitle">' . $settings[ 'text' ] . '</p>';

							} elseif ( $settings[ 'subtitle' ] == 'breadcrumbs' && function_exists( 'merge_get_breadcrumbs' ) ) {

								echo merge_get_breadcrumbs();

							}

						echo '</div>';

					break;

					case 'style-3':

						if ( $settings[ 'image' ][ 'url' ] ) {

							echo Group_Control_Image_Size_2::get_attachment_image_html( $settings, 'image', 'image', 'jarallax-img' );

						}

						echo '<div class="vlt-page-title__overlay"></div>';

						echo '<a href="#' . $this->get_id() . '" class="vlt-page-title__scroll-to vlt-scroll-to">';
							echo '<div class="overflow-hidden">';
								echo '<div class="icon">';
									echo merge_get_icon( 'arrow-down' );
								echo '</div>';
							echo '</div>';
						echo '</a>';

						echo '<div class="container lax" data-lax-translate-y="0 0, (-elh*2) elh" data-lax-opacity="0 1, (-elh*2) 0" data-lax-anchor=".vlt-page-title--' . $this->get_id() . '">';

							if ( $settings[ 'title' ] ) {
								echo '<' . Utils::validate_html_tag( $settings[ 'html_tag' ] ) . ' ' . $this->get_render_attribute_string( 'heading' ) . '">' . $settings[ 'title' ] . '</' . Utils::validate_html_tag( $settings[ 'html_tag' ] ) . '>';
							}

							if ( $settings[ 'subtitle' ] == 'text' && $settings[ 'text' ] ) {

								echo '<p class="vlt-page-title__subtitle">' . $settings[ 'text' ] . '</p>';

							} elseif ( $settings[ 'subtitle' ] == 'breadcrumbs' && function_exists( 'merge_get_breadcrumbs' ) ) {

								echo merge_get_breadcrumbs();

							}

						echo '</div>';

					break;

				}

			?>

		</div>

		<div id="<?php echo $this->get_id(); ?>"></div>

		<?php

	}

}