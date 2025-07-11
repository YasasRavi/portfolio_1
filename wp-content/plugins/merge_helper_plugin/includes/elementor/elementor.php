<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class VLThemesInitElementor {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function include_widgets_files() {
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_action_block.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_alert_message.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_award_item.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_button_circle.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_button.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_contact_form_7.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_content_marquee.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_content_slider.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_countdown.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_counter_up.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_counter_up_small.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_divider.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_fact.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_fancy_text.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_google_map.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_heading.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_justified_gallery.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_marquee_text.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_page_title.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_partner.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_partners.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_phone_block.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_pie_chart.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_pricing_table.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_progress_bar.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_projects_slider.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_rewards.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_section_title.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_service_box.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_simple_icon.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_simple_image.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_simple_link.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_single_post.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_skill.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_slide_photo.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_slider_controls.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_social_icons.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_spacer.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_tab_content.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_tabs.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_team_member.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_template.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_testimonial.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_timeline_slider.php';
		require_once vlthemes_helper_plugin()->plugin_path . 'includes/elementor/blocks/block_video_button.php';
	}

	public function register_widgets() {
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Action_Block() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Alert_Message() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Award_Item() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Button_Circle() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Contact_Form_7() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Content_Marquee() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Content_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Counter_Up() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Counter_Up_Small() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Divider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Fact() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Fancy_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Google_Map() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Justified_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Marquee_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Page_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Partner() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Phone_Block() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Partners() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Pie_Chart() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Pricing_Table() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Progress_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Projects_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Rewards() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Section_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Service_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Simple_Icon() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Simple_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Simple_Link() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Single_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Skill() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Slide_Photo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Slider_Controls() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Social_Icons() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Spacer() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Tab_Content() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Template() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Timeline_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Widget_VLThemes_Video_Button() );
	}

	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'vlthemes-elements',
			array(
				'title' => esc_html__( 'VLThemes Elements', 'vlthemes' )
			)
		);
	}

	public function register_elementor_locations( $elementor_theme_manager ) {
		$elementor_theme_manager->register_location( 'header' );
		$elementor_theme_manager->register_location( 'footer' );
		$elementor_theme_manager->register_location( 'single' );
		$elementor_theme_manager->register_location( 'archive' );
		$elementor_theme_manager->register_location( '404' );
	}

	public function register_editor_styles() {
		wp_enqueue_style( 'vlthemes-elementor-style', vlthemes_helper_plugin()->plugin_url . 'includes/elementor/assets/css/elementor.css', array(), vlthemes_helper_plugin()->plugin_version );
	}

	public function __construct() {
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'register_editor_styles' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );
		add_action( 'elementor/theme/register_locations', [ $this, 'register_elementor_locations' ] );
	}

}

// Instantiate Plugin Class
VLThemesInitElementor::instance();