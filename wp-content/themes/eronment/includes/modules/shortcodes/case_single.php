<!--Case Single Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> case-single-section one">
	<div class="auto-container">

		<!--Case Single Block-->
		<div class="case-single-block">
			<div class="inner-box">
				<div class="image">
					<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
				</div>
				<div class="lower-box">
					<!--Percentage Bar-->
					<div class="percentage-bar">
						<div class="bar-inner">
							<div class="bar progress-line" data-width="50"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($ff_stop); ?>">0</span>%</div></div>
						</div>
					</div>
					<h3><?php echo wp_kses_post($title);?></h3>
					<div class="row clearfix">
						
						<?php foreach( $atts['skillfacts'] as $key => $item ): ?>

						<div class="column col-md-3 col-sm-6 col-xs-12">
							<h2><?php echo wp_kses_post($item->title); ?></h2>
							<div class="title"><?php echo wp_kses_post($item->text); ?></div>
						</div>
						
						<?php endforeach; ?>

					</div>
					<div class="donate-box text-center">
						<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-two"><?php echo wp_kses_post($btn);?></a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!--End Case Single Section -->