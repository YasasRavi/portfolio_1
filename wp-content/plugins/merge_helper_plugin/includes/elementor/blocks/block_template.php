<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Template extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-template';
	}

	public function get_title() {
		return esc_html__( 'Template', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-document-file vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'template', 'library', 'block', 'page', 'section', 'element' ];
	}

	public function is_reload_preview_required() {
		return true;
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Template', 'vlthemes' ),
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
			'template', [
				'label' => esc_html__( 'Choose Template', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->vlthemes_get_elementor_templates(),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$template_id = $this->get_settings( 'template' );

		if ( 'publish' !== get_post_status( $template_id ) ) {
			return;
		}

		?>

		<div class="vlt-elementor-template">

			<?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template_id, true ); ?>

		</div>

		<?php

	}

}