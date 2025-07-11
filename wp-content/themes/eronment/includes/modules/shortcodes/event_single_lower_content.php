<!--Event Single Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> event-single-section two">
	<div class="auto-container">

		<!--Lower Content-->
            <div class="lower-content">
            	<h2><?php echo wp_kses_post($title);?></h2>
                <div class="bold-text"><?php echo wp_kses_post($text);?></div>
                <div class="text">
                	<p><?php echo wp_kses_post($text1);?></p>
                </div>
                <div class="ticket-box">
                	<div class="clearfix">
                    	
                        <div class="countdown-column pull-left">
                            <div class="time-counter"><div class="time-countdown count-style-two clearfix" data-countdown="2018/11/18"></div></div>
                        </div>
                        <div class="link-column pull-right">
                        	<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-two"><?php echo wp_kses_post($btn);?></a>
                        </div>
                        
                    </div>
                </div>
            </div>

	</div>
</section>
<!--End Event Single Section -->