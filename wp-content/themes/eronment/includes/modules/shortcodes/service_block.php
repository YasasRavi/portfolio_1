<!--Sidebar Page Container-->
<div class="<?php echo esc_attr(wp_kses_post($class));?> sidebar-page-container three">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Side-->
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="services-single">
					<div class="inner-service">
						<div class="text">
						<!--Featured Blocks-->
							<div class="featured-blocks">
								<div class="clearfix">

									<?php foreach( $atts['blocks'] as $key => $item ): ?>

									<!--Featured Block Two-->
									<div class="featured-block-two col-md-4 col-sm-4 col-xs-12">
										<div class="inner-box">
											<div class="icon-box">
												<span class="icon"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" /></span>
											</div>
											<h3><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->title); ?></a></h3>
											<div class="text"><?php echo wp_kses_post($item->text); ?></div>
										</div>
									</div>

									<?php endforeach; ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>