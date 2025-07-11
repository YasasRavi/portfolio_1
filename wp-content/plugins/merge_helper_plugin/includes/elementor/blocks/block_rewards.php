<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Rewards extends Widget_Base {

	public function get_name() {
		return 'vlt-rewards';
	}

	public function get_title() {
		return esc_html__( 'Rewards', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-star-o vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'rewards', 'awards' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Rewards', 'vlthemes' ),
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
			'logo', [
				'label' => esc_html__( 'Logo', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'logo', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
			]
		);

		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'vlthemes' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(), [
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `testimonial_image_size` and `testimonial_image_custom_dimension`.
			]
		);

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'year', [
				'label' => esc_html__( 'Year', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
			]
		);

		$this->add_control(
			'items', [
				'label' => esc_html__( 'Items', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ year }}} | {{{ title }}}',
			]
		);

		$this->end_controls_section();

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'General', 'vlthemes' ),
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
			'title_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-reward__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .vlt-reward__title',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Year', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'year_color', [
				'label' => esc_html__( 'Text Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-reward__year' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'year_typography',
				'selector' => '{{WRAPPER}} .vlt-reward__year',
			]
		);

		$this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Link', 'vlthemes' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'icon_color', [
				'label' => esc_html__( 'Icon Color', 'vlthemes' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vlt-reward__link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'rewards', 'class', 'vlt-rewards' );

		?>

		<div <?php echo $this->get_render_attribute_string( 'rewards' ); ?>>

			<?php foreach ( $settings[ 'items' ] as $index => $item ) : ?>

				<?php

					$this->add_render_attribute( 'btn-' . $item[ '_id' ], [
						'class' => 'vlt-reward__link vlt-dot-link stretched-link',
						'data-cursor' => 'eye',
						'href' => $item[ 'link' ][ 'url' ]
					] );

					if ( $item[ 'link' ][ 'is_external' ] ) {
						$this->add_render_attribute( 'btn-' . $item[ '_id' ], 'target', '_blank' );
					}

					if ( $item[ 'link' ][ 'nofollow' ] ) {
						$this->add_render_attribute( 'btn-' . $item[ '_id' ], 'rel', 'nofollow' );
					}

				?>

				<div class="vlt-reward">

					<?php if ( $item[ 'logo' ][ 'url' ] ) : ?>

						<div class="vlt-reward__brand">

							<?php echo Group_Control_Image_Size_2::get_attachment_image_html( $item, 'logo' ); ?>

						</div>

					<?php endif; ?>

					<?php if ( $item[ 'title' ] ) : ?>

						<<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?> class="vlt-reward__title"><?php echo $item[ 'title' ]; ?></<?php echo Utils::validate_html_tag( $settings[ 'html_tag' ] ); ?>>

					<?php endif; ?>

					<?php if ( $item[ 'year' ] ) : ?>

						<div class="vlt-reward__year"><?php echo $item[ 'year' ]; ?></div>

					<?php endif; ?>

					<?php if ( $item[ 'image' ][ 'url' ] ) : ?>

						<div class="vlt-reward__image">

							<?php echo Group_Control_Image_Size_2::get_attachment_image_html( $item, 'image' ); ?>

						</div>

					<?php endif; ?>

					<?php if ( $item[ 'link' ][ 'url' ] ) : ?>

						<a <?php echo $this->get_render_attribute_string( 'btn-' . $item[ '_id' ] ); ?>><span class="vlt-dot-link__inner"><?php echo merge_get_icon( 'arrow-right' ); ?><span></span></span></a>

					<?php endif; ?>

				</div>

			<?php endforeach; ?>

		</div>

		<?php

	}

}