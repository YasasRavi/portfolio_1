    <!--Main Banner Section-->
    <section class="<?php echo esc_attr(wp_kses_post($class));?> main-banner-section">
    	<div class="auto-container">
        	<div class="image">
            	<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
                <div class="content">
                	<h2><?php echo wp_kses_post($ttitle);?></h2>
                </div>
            </div>
        </div>
    </section>
    <!--End Main Banner Section-->