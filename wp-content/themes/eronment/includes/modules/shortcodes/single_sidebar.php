    <!--Sidebar Page Container-->
    <div class="<?php echo esc_attr(wp_kses_post($class));?> sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Sidebar Side-->
               	<div class="sidebar-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   	<aside class="sidebar">
						
                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <ul class="blog-cat">
                                <li class="active"><a href="<?php echo esc_url($page_link);?>"><?php echo wp_kses_post($text2);?></a></li>
                                
                                <?php foreach( $atts['one'] as $key => $item ): ?>
                                
                                <li><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->text); ?></a></li>
                                
                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                        
                        <!--Donate Help Widget-->
                        <div class="sidebar-widget donate-help-widget">
                        	<div class="inner-box">
                            	<h2><?php echo wp_kses_post($title);?></h2>
                                <div class="text"><?php echo wp_kses_post($text);?></div>
                                <a href="<?php echo esc_url($link1);?>" class="theme-btn btn-style-three"><?php echo wp_kses_post($btn);?></a>
                            </div>
                        </div>
                        
                        <!--Download Widget-->
                        <div class="sidebar-widget download-widget">
                        	<div class="sidebar-title">
                        		<h2><?php echo wp_kses_post($title1);?></h2>
                            </div>
                            <a href="<?php echo esc_url($link2);?>" class="download-box"><?php echo wp_kses_post($text1);?> <span class="icon flaticon-download-button"></span></a>
                        </div>
                        
                    </aside>
                </div>
                
            </div>
        </div>
    </div>