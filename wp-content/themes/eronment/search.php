<?php eronment_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(eronment_set($_GET, 'layout_style')) $layout = eronment_set($_GET, 'layout_style'); else
	$layout = eronment_set( $settings, 'search_page_layout', 'right' );
	$sidebar = eronment_set( $settings, 'search_page_sidebar', 'default-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	
	$layout = ( $layout ) ? $layout : 'right';
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	
	$classes = ( !$layout || $layout == 'full' || eronment_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-12 col-sm-12 col-xs-12 ' ;
	$bg = eronment_set($settings, 'search_page_header_img');
	$title = eronment_set($settings, 'search_title');
?>
<?php if(!eronment_set($options, 'srch_banner')):?>
 <?php get_template_part( 'post_bread' ); ?> 
<?php endif;?>

 <!-- Sidebar Page -->

    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
			
             <!-- sidebar area -->
                <?php if( $layout == 'left' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">	
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php }?>
                <?php endif; ?>
				<?php if(have_posts()):?>  
				<!--Content Side-->
                <div class="content-side <?php echo esc_attr($classes);?>">
                  <div class="our-blog">
                		<?php while( have_posts() ): the_post();?>
                                <!-- blog post item -->
                                <!-- Post -->
                                <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                                    <?php get_template_part( 'blog' ); ?>
                                <!-- blog post item -->
                                </div><!-- End Post -->
                        <?php endwhile;?> 
                        <!--Styled Pagination-->
						<div class="styled-pagination">
                            <?php eronment_the_pagination(); ?>
                        </div>
                        <!--End Styled Pagination-->
                    </div>
                </div>
				<?php else : ?>
				<div class="<?php echo esc_attr($classes);?> blog_post_area eco-search rt">
         
		  <div class="circle-onex"></div>
		
					<div class="col-md-5 col-sm-5 col-xs-12 error-column">
				<?php if(eronment_set($options, 'search_image')):?>
					<img src="<?php echo esc_url(eronment_set($options, 'search_image'));?>" alt="<?php esc_attr_e('Image', 'eronment');?> class="img-responsive">
					<?php else :?>
					<img src="<?php echo esc_url(get_template_directory_uri().'/images/search.png');?>" alt="<?php esc_attr_e('Image', 'eronment');?> class="img-responsive">
					<?php endif;?>
				</div>
					
					<div class="col-md-7 col-sm-7 col-xs-12 error-column search_s">
					<?php if(eronment_set($settings, 'search_text')):?>
					<h3><?php echo eronment_set($settings, 'search_text'); ?></a></h3>
					<?php else :?>
					<h3>
					<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for', 'eronment' ); ?></h3>
					<p><?php esc_html_e( '1. Check the spelling ', 'eronment' ); ?>
                    </p>
                    <p><?php esc_html_e( '2. Check the Caps Lock', 'eronment' ); ?>
</p>      
<p><?php esc_html_e( '3. Press Enter correctly or Press F5', 'eronment' ); ?>
</p> 
          
					<h4><?php esc_html_e( 'Perhaps Searching can help.', 'eronment' ); ?></h4>
					<?php endif;?>
					<br>
					
					<?php get_search_form('searchform' ); ?>
					
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><?php esc_html_e( 'Go Home', 'eronment' ); ?><span class="icon flaticon-next-4"></span></a>
					<br>
				</div>
				
				
				</div>
				<?php endif; ?>
                <!-- sidebar area -->
                <?php if( $layout == 'right' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">	
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php }?>
                <?php endif; ?>
                <!-- sidebar area -->
            </div>
        </div>
     </div>
<?php get_footer(); ?>