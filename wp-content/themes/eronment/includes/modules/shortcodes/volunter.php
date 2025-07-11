<!--Volunter Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> volunter-section">
	<div class="auto-container">
		<div class="inner-container">
			<div class="row clearfix">
				<!--Image Column-->
				<div class="image-column col-md-6 col-sm-12 col-xs-12">
					<div class="image">
						<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
					</div>
				</div>
				<!--Content Column-->
				<div class="content-column col-md-6 col-sm-12 col-xs-12">
					<div class="inner-column">
						<h2><?php echo wp_kses_post($title);?></h2>
						<div class="text"><?php echo wp_kses_post($text);?></div>
						<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-four"><?php echo wp_kses_post($btn);?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--End Volunter Section-->