<!--Sidebar Page Container-->
<div class="<?php echo esc_attr(wp_kses_post($class));?> sidebar-page-container five">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Side-->
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="services-single">
					<div class="inner-service">
							<div class="gallery-image">
                            	<div class="row clearfix">
                                	<!--Image Column-->
                                    <div class="image-column col-md-7 col-sm-7 col-xs-12">
                                        <div class="image">
                                            <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
                                        </div>
                                    </div>
                                    <!--Image Column-->
                                    <div class="image-column col-md-5 col-sm-5 col-xs-12">
                                        <div class="image">
                                            <img src="<?php echo esc_url($image1); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2><?php echo wp_kses_post($title);?></h2>
                            <div class="text">
                            	<p><?php echo wp_kses_post($text);?></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>