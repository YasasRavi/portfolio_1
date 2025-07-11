<!--Sidebar Page Container-->
<div class="<?php echo esc_attr(wp_kses_post($class));?> sidebar-page-container one">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Side-->
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="services-single">
					<div class="inner-service">
						<div class="single-image">
							<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
						</div>
						<h2><?php echo wp_kses_post($title);?></h2>
						<div class="text">
							<?php echo wp_kses_post($text);?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>