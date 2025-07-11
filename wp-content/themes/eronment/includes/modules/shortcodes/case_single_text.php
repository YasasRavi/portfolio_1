<!--Case Single Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> case-single-section two">
	<div class="auto-container">

		<div class="lower-content">
            	<h2><?php echo wp_kses_post($title);?></h2>
                <div class="text">
                	<p><?php echo wp_kses_post($text);?></p>
                    <div class="case-blockquote">
                    	<div class="blockquote-inner">
                        	<div class="quote-icon">
                            	<span class="icon fa fa-quote-left"></span>
                            </div>
                            <div class="quote-text"><?php echo wp_kses_post($text1);?></div>
                            <div class="quote-author"><?php echo wp_kses_post($text2);?></div>
                        </div>
                    </div>
                    <p><?php echo wp_kses_post($text3);?></p>
                </div>
                <ul class="social-icon-four">
                	<li class="share"><?php echo wp_kses_post($title1);?></li>
                   
                    <?php foreach( $atts['social'] as $key => $item ): ?>
                   
                    <li><a href="#"><span class="icon fa <?php echo esc_attr($item->icon); ?>"></span></a></li>
                    
                    <?php endforeach; ?>
                    
                </ul>
            </div>

	</div>
</section>
<!--End Case Single Section -->