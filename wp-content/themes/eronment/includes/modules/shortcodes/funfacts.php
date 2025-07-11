<!--Default Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> default-section" style="background-image:url(<?php echo esc_url($bgimage); ?>)">
	<div class="auto-container">

		<!--Counter Section-->
		<div class="counter-section">
			<div class="inner-section">
				<div class="fact-counter">
					<div class="row clearfix">
						
						<?php foreach( $atts['funfacts'] as $key => $item ): ?>

						<!--Column-->
						<div class="column counter-column col-md-<?php echo esc_attr(wp_kses_post($column));?> col-sm-6 col-xs-12">
							<div class="inner">
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item->ff_stop); ?>">0</span><?php echo wp_kses_post($item->ff_sign); ?>
								</div>
								<h4 class="counter-title"><?php echo wp_kses_post($item->title); ?></h4>
							</div>
						</div>
						
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
		<!--End Counter Section-->

	</div>
</section>
<!--End Default Section-->


	