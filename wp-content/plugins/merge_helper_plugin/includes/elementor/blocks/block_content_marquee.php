<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Content_Marquee extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-content-marquee';
	}

	public function get_title() {
		return esc_html__( 'Content Marquee', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-animation vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'content', 'marquee' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Content Marquee', 'vlthemes' ),
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
			'marquee_template', [
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
				'label' => esc_html__( 'Content Marquee', 'vlthemes' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'stopable', [
				'label' => esc_html__( 'Stopable', 'vlthemes' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'content-marquee', 'class', 'vlt-content-marquee' );

		if ( $settings[ 'stopable' ] ) {
			$this->add_render_attribute( 'content-marquee', 'class', 'has-stopable' );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'content-marquee' ); ?>>

			<?php if ( $settings[ 'marquee_template' ] ) : ?>

				<?php

					if ( 'publish' !== get_post_status( $settings[ 'marquee_template' ] ) ) {
						return;
					}

				?>

				<div class="vlt-content-marquee__original">

					<?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $settings[ 'marquee_template' ], false ); ?>

				</div>

				<div class="vlt-content-marquee__copy">

					<?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $settings[ 'marquee_template' ], false ); ?>

				</div>

			<?php endif; ?>

		</div>

		<?php

	}

}