<section class="<?php echo esc_attr(wp_kses_post($class));?> comming-soon" style="background-image:url(<?php echo esc_url($bgimage); ?>)">
    	<div class="auto-container">
        	<div class="content">
            	<div class="content-inner">
                	<h2><?php echo wp_kses_post($title);?></h2>
                    <div class="time-counter"><div class="time-countdown count-style-one clearfix" data-countdown="2018/12/18"></div></div>
                    <div class="text"><?php echo wp_kses_post($text);?></div>
                    <!--Emailed Form-->
                    <div class="subscribe-form">
                        <?php echo do_shortcode($contact_form); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>