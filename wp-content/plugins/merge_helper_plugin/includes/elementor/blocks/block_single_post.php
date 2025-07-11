<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_VLThemes_Single_Post extends Widget_Base {

	use \VLThemes_Elementor\Traits\Helper;

	public function get_name() {
		return 'vlt-single-post';
	}

	public function get_title() {
		return esc_html__( 'Single Post', 'vlthemes' );
	}

	public function get_icon() {
		return 'eicon-post vlthemes-badge';
	}

	public function get_categories() {
		return [ 'vlthemes-elements' ];
	}

	public function get_keywords() {
		return [ 'post', 'single', 'news', 'article' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// ANCHOR
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Single Post', 'vlthemes' ),
			]
		);

		$this->add_control(
			'style', [
				'label' => esc_html__( 'Style', 'vlthemes' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'vlthemes' ),
					'style-2' => esc_html__( 'Style 2', 'vlthemes' )
				],
			]
		);

		$this->add_control(
			'post_id', [
				'label' => esc_html__( 'Select Post', 'vlthemes' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => $this->vlthemes_get_post_name(),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( ! $settings[ 'post_id' ] ) {
			return;
		}

		$args = array(
			'post_type' => 'post',
			'p' => $settings[ 'post_id' ],
			'post_status' => 'publish',
		);

		$new_query = new \WP_Query( $args );

	?>

	<?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>

		<?php get_template_part( 'template-parts/post/post', $settings[ 'style' ] ); ?>

	<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>

	<?php

	}

}
