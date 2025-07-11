<?php eronment_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option();
	if(eronment_set($_GET, 'layout_style')) $layout = eronment_set($_GET, 'layout_style'); else
	$layout = eronment_set( $settings, 'archive_page_layout', 'right' );
	if( !$layout || $layout == 'full' || eronment_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = eronment_set( $settings, 'archive_page_sidebar', 'blog-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || eronment_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = eronment_set($settings, '404_page_header_img');
	$title = eronment_set($settings, '404_page_header_title');
?>

<?php get_template_part( 'post_bread' ); ?> 


<!--Error Section-->
  <?php if($bg):?>
<section class="error-section sp-one" style="background-image:url(<?php echo esc_attr($bg)?>)">
 <?php else :?>
<section class="error-section sp-one" style="background-image:url(<?php echo esc_url(get_template_directory_uri().'/images/background/9.jpg');?>)">
<?php endif;?>
  
        <div class="auto-container">
        <?php if(eronment_set($settings, '404_text')):?>    
			<div class="content">
                <h1><span class="left-icon now-in-view"></span><?php if($title) echo wp_kses_post($title); else wp_title(''); ?><span class="right-icon now-in-view"></span></h1>
                <div class="text"><?php echo wp_kses_post(eronment_set($settings, '404_text')); ?></div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"> <?php esc_html_e( 'Go to Home', 'eronment' ); ?></a>
            </div>
		<?php else :?> 	
			<div class="content">
                <h1><span class="left-icon now-in-view"></span><?php esc_html_e( '404', 'eronment' ); ?><span class="right-icon now-in-view"></span></h1>
                <h2><?php esc_html_e( 'Oops! That page can not be found', 'eronment' ); ?></h2>
                <div class="text"><?php esc_html_e( 'Sorry, but the page you are looking for does not existing', 'eronment' ); ?></div>
                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-three"> <?php esc_html_e( 'Go to Home', 'eronment' ); ?></a>
            </div>
		<?php endif;?>	
        </div>
    </section>
<?php get_footer(); ?>