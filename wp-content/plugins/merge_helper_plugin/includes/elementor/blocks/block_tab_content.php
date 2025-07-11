<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Tab_Content extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-tab-content';
	}

	public function get_title() {
		return esc_html__( 'Tab Content', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-tabs vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'tab', 'content' ];
	}

	public function is_reload_preview_required() {
		return false;
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Tab Content', 'vlthemes' ),
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
			'id', [
				'label' => esc_html__( 'ID', 'vlthemes' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'template', [
				'label' => esc_html__( 'Choose Template', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->vlthemes_get_elementor_templates(),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content', [
				'label' => esc_html__( 'Content', 'vlthemes' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ id }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tab-content', 'class', 'vlt-tab-content' );

		?>

		<div <?php echo $this->get_render_attribute_string( 'tab-content' ); ?>>

			<?php foreach( $settings[ 'content' ] as $key => $item ) : ?>

				<?php

					if ( 'publish' !== get_post_status( $item[ 'template' ] ) ) {
						return;
					}

					echo '<div class="vlt-tab-content__item" data-content-id="tab-' . $item[ 'id' ] . '">' . \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $item[ 'template' ] ) . '</div>';

				?>

			<?php endforeach; ?>

		</div>

		<?php

	}

}