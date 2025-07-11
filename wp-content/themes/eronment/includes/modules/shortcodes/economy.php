    <!--Economy Section-->
    <section class="<?php echo esc_attr(wp_kses_post($class));?> economy-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="sec-title centered">
            	<h2><?php echo wp_kses_post($title);?></h2>
                <div class="text"><?php echo wp_kses_post($text);?></div>
            </div>
            
            <!--Economy Tabs-->
            <div class="economy-tabs tabs-box">
                <div class="clearfix">
                	<!--Column-->
                    <div class="tab-btns-column">
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#prod-reduce" class="tab-btn active-btn"><span><?php echo wp_kses_post($tab);?></span></li>
                            <li data-tab="#prod-reuse" class="tab-btn"><span><?php echo wp_kses_post($tab1);?></span></li>
                            <li data-tab="#prod-recycle" class="tab-btn"><span><?php echo wp_kses_post($tab2);?></span></li>
                        </ul>
                    </div>
                    <!--Column-->
                    <div class="tab-contents-column">
                    	<!--Tabs Container-->
                        <div class="tabs-content">
                        
                            <!--Tab / Active Tab-->
                            <div class="tab active-tab" id="prod-reduce">
                            	<div class="content">
									<div class="row clearfix">
                                    	<!--Image Column-->
                                        <div class="image-column col-md-5 col-sm-12 col-xs-12">
                                        	<div class="image">
                                            	<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
                                            </div>
                                        </div>
                                        <!--Content Column-->
                                        <div class="content-column col-md-7 col-sm-12 col-xs-12">
                                        	<div class="inner-column">
                                            	<h2><?php echo wp_kses_post($title1);?></h2>
                                                <div class="bold-text"><?php echo wp_kses_post($text1);?></div>
                                                <div class="text"><?php echo wp_kses_post($text2);?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Tab -->
                            <div class="tab" id="prod-reuse">
                            	<div class="content">
									<div class="row clearfix">
                                    	<!--Image Column-->
                                        <div class="image-column col-md-5 col-sm-12 col-xs-12">
                                        	<div class="image">
                                            	<img src="<?php echo esc_url($image1); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
                                            </div>
                                        </div>
                                        <!--Content Column-->
                                        <div class="content-column col-md-7 col-sm-12 col-xs-12">
                                        	<div class="inner-column">
                                            	<h2><?php echo wp_kses_post($title2);?></h2>
                                                <div class="bold-text"><?php echo wp_kses_post($text3);?></div>
                                                <div class="text"><?php echo wp_kses_post($text4);?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Tab -->
                            <div class="tab" id="prod-recycle">
                            	<div class="content">
									<div class="row clearfix">
                                    	<!--Image Column-->
                                        <div class="image-column col-md-5 col-sm-12 col-xs-12">
                                        	<div class="image">
                                            	<img src="<?php echo esc_url($image2); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
                                            </div>
                                        </div>
                                        <!--Content Column-->
                                        <div class="content-column col-md-7 col-sm-12 col-xs-12">
                                        	<div class="inner-column">
                                            	<h2><?php echo wp_kses_post($title1);?></h2>
                                                <div class="bold-text"><?php echo wp_kses_post($text1);?></div>
                                                <div class="text"><?php echo wp_kses_post($text2);?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--End Economy Section-->