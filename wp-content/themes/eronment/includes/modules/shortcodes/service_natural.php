<!--Sidebar Page Container-->
<div class="<?php echo esc_attr(wp_kses_post($class));?> sidebar-page-container two">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Side-->
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="services-single">
					<div class="inner-service">
						<div class="text">
							<div class="two-column">
								<div class="row clearfix">

									<div class="column col-md-6 col-sm-6 col-xs-12">
										<h3><?php echo wp_kses_post($title);?></h3>
										<p><?php echo wp_kses_post($text);?></p>
										<ul class="list-style-three">

											<?php foreach( $atts['blocks'] as $key => $item ): ?>

											<li><?php echo wp_kses_post($item->text); ?></li>

											<?php endforeach; ?>

										</ul>
									</div>
									<div class="column col-md-6 col-sm-6 col-xs-12">
										<div class="image padd-left">
											<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
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
</div>