    <!--Campaigns Section-->
    <section class="<?php echo esc_attr(wp_kses_post($class));?> campaigns-section">
    	<div class="auto-container">
        	<div class="sec-title centered">
            	<h2><?php echo wp_kses_post($title);?></h2>
            </div>
            <div class="row clearfix">
            
                <?php foreach( $atts['skillfacts'] as $key => $item ): ?>
            	
                <!--Compaign Block-->
                <div class="compaign-block col-md-<?php echo esc_attr(wp_kses_post($column));?> col-sm-6 col-xs-12">
                	<div class="inner-box">
                    	<div class="image">
                        	<a href="<?php echo esc_url($item->link); ?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" /></a>
                        </div>
                        <div class="lower-content">
                        	<!--Donate Bar-->
                            <div class="donate-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="50"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($item->ff_stop); ?>">0</span>%</div></div>
                                </div>
                            </div>
                            <h3><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->title); ?></a></h3>
                            <a href="<?php echo esc_url($item->link); ?>" class="theme-btn btn-style-one"><?php echo wp_kses_post($item->btn); ?></a>
                        </div>
                    </div>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>
    </section>
	