<!--Event Single Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> event-single-section one">
	<div class="auto-container">

		<div class="upper-box">
			<div class="row clearfix">
				<!--Image Column-->
				<div class="image-column col-lg-9 col-md-8 col-sm-12 col-xs-12">
					<div class="image">
						<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
					</div>
				</div>
				<!--Content Column-->
				<div class="content-column col-lg-3 col-md-4 col-sm-12 col-xs-12">
					<div class=" inner-column">
						<ul>
							<li><?php echo wp_kses_post($text);?></li>
							<li><?php echo wp_kses_post($text1);?></li>
						</ul>
						<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-three"><?php echo wp_kses_post($btn);?></a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!--End Event Single Section -->