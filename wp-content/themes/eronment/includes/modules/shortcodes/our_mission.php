<!--Mission Section Two-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> mission-section-two">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Column-->
			<div class="content-column col-md-8 col-xs-12 col-xs-12">
				<div class="inner-column">
					<div class="sec-title-two">
						<h2><?php echo wp_kses_post($title);?></h2>
					</div>
					<div class="text">
						<?php echo wp_kses_post($text);?>
						<h3><?php echo wp_kses_post($subtitle);?></h3>
						<?php echo wp_kses_post($text1);?>
					</div>
				</div>
			</div>

			<!--Image Column-->
			<div class="image-column col-md-4 col-xs-12 col-xs-12">
				<div class="inner-column">
					<div class="image">
						<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!--End Mission Section Two-->