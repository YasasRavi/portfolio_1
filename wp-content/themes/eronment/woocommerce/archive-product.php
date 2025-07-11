<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive. 
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version      3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_layout_settings', get_option( 'woocommerce_shop_page_id' ));
$meta1 = _WSH()->get_meta('_bunch_header_settings', get_option( 'woocommerce_shop_page_id' ));

$layout = eronment_set( $meta, 'layout');
$layout = eronment_set( $_GET, 'layout' ) ? $_GET['layout'] : $layout; 
if(eronment_set($_GET, 'layout_style')) $layout = eronment_set($_GET, 'layout_style'); else

$layout = eronment_set( $meta, 'layout');
$sidebar = eronment_set( $meta, 'sidebar');

$layout = ($layout) ? $layout : eronment_set($options, 'woo_cat_page_layout');
$sidebar = ($sidebar) ? $sidebar : eronment_set($options, 'woocommerce_cat_page_sidebar');
 
$classes = ( !$layout || $layout == 'full' || eronment_set($_GET, 'layout_style')=='full' ) ? 'col-lg-12 col-md-12 col-sm-12 col-xs-12' : 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
  
$title = eronment_set($meta1, 'header_title');

$title = ($title) ? $title : eronment_set($options, 'woocommerce_page_header_title');
$meta2 = _WSH()->get_meta('_bunch_header_settings');
$bg = eronment_set($meta2, 'header_img');
get_header( 'shop' ); ?>

 <?php get_template_part( 'post_bread' ); ?> 
 
<div class="sidebar-page-container no-padd-top">
    <div class="auto-container">
        <div class="row clearfix">
			
			<!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="sidebar-side col-lg-3 col-md-3 col-sm-12 col-xs-12">        
				<aside class="sidebar default-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
                    <?php
						/**
						 * woocommerce_sidebar hook
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>

			<!-- sidebar area -->
			
			<div class="<?php echo esc_attr($classes);?>">
            	<div class="shop-section">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                	<div class="items-sorting">
                        <div class="row clearfix">
                            <div class="results-column col-md-6 col-sm-6 col-xs-12">
                                <h4> <?php woocommerce_result_count();?></h4>
                            </div>
                            <div class="select-column pull-right col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <?php
                                        /**
                                         * woocommerce_before_shop_loop hook
                                         *
                                         * @hooked woocommerce_result_count - 20
                                         * @hooked woocommerce_catalog_ordering - 30
                                         */
                                        do_action( 'woocommerce_before_shop_loop' );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
				<?php
                    /**
                     * woocommerce_before_main_content hook
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     */
                    do_action( 'woocommerce_before_main_content' );
                ?>
                
                <?php
                    /**
                     * woocommerce_archive_description hook
                     *
                     * @hooked woocommerce_taxonomy_archive_description - 10
                     * @hooked woocommerce_product_archive_description - 10
                     */
                    do_action( 'woocommerce_archive_description' );
                ?>

				<?php if ( have_posts() ) : ?>
        
                    <?php woocommerce_product_loop_start(); ?>
        
                        <?php woocommerce_product_subcategories(); ?>
                    
                            <div class="our-shops">
                                    
                                <?php while ( have_posts() ) : the_post(); ?>

                                    <?php wc_get_template_part( 'content', 'product' ); ?>

                                <?php endwhile; // end of the loop. ?>
                                    
                            </div>
        
                    <?php woocommerce_product_loop_end(); ?>
        
                    <?php
                        /**
                         * woocommerce_after_shop_loop hook
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    ?>
        
                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
        
                    <?php wc_get_template( 'loop/no-products-found.php' ); ?>
        
                <?php endif; ?>

				<?php
                    /**
                     * woocommerce_after_main_content hook
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action( 'woocommerce_after_main_content' );
                ?>
	
				</div>
            </div>

            <!-- sidebar area -->
            <?php if( $layout == 'right' ): ?>
            <?php if ( is_active_sidebar( $sidebar ) ) { ?>
            <div class="sidebar-side col-lg-3 col-md-3 col-sm-12 col-xs-12">        
				<aside class="sidebar default-sidebar">
                    <?php dynamic_sidebar( $sidebar ); ?>
                    <?php
                        /**
                         * woocommerce_sidebar hook
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    ?>
                </aside>
            </div>
            <?php } ?>
            <?php endif; ?>
    <!--Sidebar-->
    
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
