<?php add_action('after_setup_theme', 'eronment_bunch_theme_setup');
function eronment_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('ERONMENT_VERSION')) define('ERONMENT_VERSION', '1.0');
	if( !defined( 'ERONMENT_ROOT' ) ) define('ERONMENT_ROOT', get_template_directory().'/');
	if( !defined( 'ERONMENT_URL' ) ) define('ERONMENT_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';
	
	
	load_theme_textdomain('eronment', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( "custom-header");
	add_theme_support( "custom-background") ;
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'eronment'),
				'onepage_menu' => esc_html__('Onepage', 'eronment'),
				'portfolio_menu' => esc_html__('Portfolio', 'eronment'),
				'extra_menu' => esc_html__('Extra Menu', 'eronment'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'eronment360x250', 360, 250, true ); //'360x250 Our Services'
	add_image_size( 'eronment7979', 79, 79, true ); //'79x79 Testimonials 1'
	add_image_size( 'eronment370x295', 370, 295, true ); //'370x295 Latest Projects'
	add_image_size( 'eronment360x240', 360, 240, true ); //'360x240 Latest News'
	add_image_size( 'eronment480x400', 480, 400, true ); //'480x400 Services Carousel'
	add_image_size( 'eronment270x220', 270, 220, true ); //'270x220 Our Team'
	
}

function eronment_bunch_widget_init()
{
	$options = _WSH()->option();
	global $wp_registered_sidebars;
	
	$theme_options = _WSH()->option();
	
	if( class_exists( 'eronment_RecentNews1' ) )register_widget( 'eronment_RecentNews1' );
	if( class_exists( 'eronment_RecentNews2' ) )register_widget( 'eronment_RecentNews2' );
	if( class_exists( 'eronment_AboutUs3' ) )register_widget( 'eronment_AboutUs3' );
	if( class_exists( 'eronment_Subscribeus' ) )register_widget( 'eronment_Subscribeus' );
	if( class_exists( 'eronment_Gallery' ) )register_widget( 'eronment_Gallery' );
	if( class_exists( 'eronment_Twitter' ) )register_widget( 'eronment_Twitter' );
	
	
	
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'eronment' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'eronment' ),
	  'before_widget'=>'<div id="%1$s" class="mrside sidebar blog-sidebar widget sidebar-widget %2$s "><div class="widget-inner">',
	  'after_widget'=>'</div></div>',
	  'before_title' => '<div class="sidebar-title"><h2>',
	  'after_title' => '</h2></div>'
	));
//'.  eronment_set($options, 'footercolumn').'
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'eronment' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'eronment' ),
	  'before_widget'=>'<div id="%1$s" class="mrfooter col-md-'.  eronment_set($options, 'footercolumn').' col-sm-4 footer-column footer-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h2 class="widget-title footer_title">',
	  'after_title' => '</h2>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'eronment' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'eronment' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	   'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = eronment_set(eronment_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(eronment_set($sidebar , 'topcopy')) continue ;
		
		$name = eronment_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = eronment_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title( $slug ) ,
			'before_widget' => '<div id="%1$s" class="side-bar widget sidebar_widget %2$s">',
			'after_widget' => "</div>",
			 'before_title' => '<div class="sidebar-title"><h3>',
	         'after_title' => '</h3></div>'
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'eronment_bunch_widget_init' );

// Update items in cart via AJAX
function eronment_load_head_scripts() {
	$options = _WSH()->option();
    if ( !is_admin() ) {
		$protocol = is_ssl() ? 'https://' : 'http://';
	if(function_exists('bunch_google_map'))  bunch_google_map($map_IP = '');
	}
}
add_action( 'wp_enqueue_scripts', 'eronment_load_head_scripts' );

//global variables
function eronment_bunch_global_variable() {
    global $wp_query;
}

function eronment_enqueue_scripts() {
    //styles
	//Basic Style
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css' );
	//Default Style
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css' );
	
	//add from html//
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css' );
	wp_enqueue_style( 'bootstrap-touchspin', get_template_directory_uri() . '/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'color', get_template_directory_uri() . '/css/color.css' );
	wp_enqueue_style( 'fancybox-min', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
	

	//Main Style
	wp_enqueue_style( 'eronment-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'eronment-responsive', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'eronment-custom-style', get_template_directory_uri() . '/css/custom.css' );
	if(class_exists('woocommerce')) wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	
	//Color Change
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.js', array(), false, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/js/owl.js', array(), false, true );
	
	
	
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'validate', get_template_directory_uri().'/js/validate.js', array(), false, true );
	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js', array(), false, true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/js/appear.js', array(), false, true );
	
	
	//add from html//
	wp_enqueue_script( 'easing', get_template_directory_uri().'/js/jquery.easing.min.js', array(), false, true );
	wp_enqueue_script( 'bootstrap-touchspin', get_template_directory_uri().'/js/jquery.bootstrap-touchspin.js', array(), false, true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/js/jquery.countdown.js', array(), false, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.js', array(), false, true );

	
	//Extra Scripts
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/js/mixitup.js', array(), false, true );

	//Main Script
	wp_enqueue_script( 'eronment-main-script', get_template_directory_uri().'/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'eronment_enqueue_scripts' );

/*-------------------------------------------------------------*/
function eronment_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'eronment' );
	$poppins = _x( 'on', 'Poppins font: on or off', 'eronment' );
 
    if ( 'off' !== $open_sans || 'off' !== $poppins ) {
        $font_families = array();
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
        }
		
		if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:300,400,500,600,700';
        }
 
        $opt = get_option('eronment'.'_theme_options');
		if ( eronment_set( $opt, 'body_custom_font' ) ) {
			if ( $custom_font = eronment_set( $opt, 'body_font_family' ) )
				$font_families[] = $custom_font . ':300,300i,400,400i,600,700';
		}
		if ( eronment_set( $opt, 'use_custom_font' ) ) {
			$font_families[] = eronment_set( $opt, 'h1_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = eronment_set( $opt, 'h2_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = eronment_set( $opt, 'h3_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = eronment_set( $opt, 'h4_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = eronment_set( $opt, 'h5_font_family' ) . ':300,300i,400,400i,600,700';
			$font_families[] = eronment_set( $opt, 'h6_font_family' ) . ':300,300i,400,400i,600,700';
		}
		$font_families = array_unique( $font_families);
        
		$query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function eronment_theme_slug_scripts_styles() {
    wp_enqueue_style( 'eronment-theme-slug-fonts', eronment_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'eronment_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function eronment_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'eronment_add_editor_styles' );
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function eronment_woo_related_products_limit() {
  global $product;
  $options = _WSH()->option();
  
  $num = eronment_set($options, 'number_of_products_per_page');
  $num = ($num) ? $num : 6;
	
	$args['posts_per_page'] = $num;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'eronment_jk_related_products_args' );
  function eronment_jk_related_products_args( $args ) {
	$options = _WSH()->option();
	
	$rel_num = eronment_set($options, 'number_of_related_products');
    $rel_num = ($rel_num) ? $rel_num : 4;
  
	$args['posts_per_page'] = $rel_num; // 4 related products
	$args['columns'] = $rel_num; // arranged in 2 columns
	return $args;
}		