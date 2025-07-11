    <!--Fluid Section One-->
    <section class="<?php echo esc_attr(wp_kses_post($class));?> fluid-section-one">
    	<div class="circle-one"></div>
        <div class="circle-two"></div>
    	<div class="outer-container clearfix">
        	<!--Image Column-->
            <div class="image-column" style="background-image:url(<?php echo esc_url($bgimage); ?>);">
            	<figure class="image-box"><img src="<?php echo esc_url($bgimage); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>"></figure>
            </div>
        	<!--Content Column-->
            <div class="content-column">
            	<div class="inner-column">
					<h2><?php echo wp_kses_post($title);?></h2>
                    <ul class="list-style-one">
                    
                    	<?php foreach( $atts['art_block'] as $key => $item ): ?>
                    
                    	<li><?php echo wp_kses_post($item->text); ?></li>
                        
                        <?php endforeach; ?>
                        
                    </ul>
                    <div class="buttons-box">
                    	<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-three"><?php echo wp_kses_post($btn);?></a>
                        <a href="<?php echo esc_url($link1);?>" class="theme-btn btn-style-four"><?php echo wp_kses_post($btn1);?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fluid Section One-->