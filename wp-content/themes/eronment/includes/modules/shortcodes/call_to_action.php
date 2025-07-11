    <!--Call To Action-->
    <section class="<?php echo esc_attr(wp_kses_post($class));?> call-to-action-section" style="background-image:url(<?php echo esc_url($bgimage); ?>)">
    	<div class="auto-container">
        	<div class="content">
            	<div class="title"><?php echo wp_kses_post($subtitle);?></div>
                <h2><?php echo wp_kses_post($ttitle);?></h2>
                <a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-two involved-btn"><?php echo wp_kses_post($btn);?></a>
                <div class="donate-percent"><?php echo wp_kses_post($text);?></div>
            </div>
        </div>
    </section>
    <!--End Call To Action-->
	
