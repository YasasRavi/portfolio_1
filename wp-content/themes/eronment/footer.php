<?php $options = get_option('eronment'.'_theme_options');?>

<footer class="main-footer">
		<div class="auto-container">
        	<!--Widgets Section-->
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ): ?>
			<div class="widgets-section">
            	<div class="row clearfix">
                	<?php dynamic_sidebar( 'footer-sidebar' );?>
                </div>
            </div>
            <?php endif;?>
			
            <!--Footer Bottom-->
			<?php if(!(eronment_set($options, 'bottom_footer_show'))):?>
            <div class="footer-bottom clearfix">
                <?php if(!eronment_set($options, 'copy_show')):?>
				<div class="pull-left">
                    <div class="copyright"><?php echo wp_kses_post(eronment_set($options, 'copy_right')); ?></div>
                </div>
				<?php endif;?>
                <div class="pull-right">
                    <div class="created"><?php echo wp_kses_post(eronment_set($options, 'footer_title1')); ?></div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
    </footer>
<!--End pagewrapper-->
</div>
</div>
<?php if(!(eronment_set($options, 'footer_to_top'))):?>
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<?php endif;?>
<?php wp_footer(); ?>
</body>
</html>