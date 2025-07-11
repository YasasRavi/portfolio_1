<!--Sidebar Page Container-->
<div class="<?php echo esc_attr(wp_kses_post($class));?> sidebar-page-container four">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Side-->
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="services-single">
					<div class="inner-service">
						<div class="text">
							<div class="two-column">
								<div class="row clearfix">
									<div class="column col-md-7 col-sm-7 col-xs-12">
										<h4><?php echo wp_kses_post($title);?></h4>
										<p><?php echo wp_kses_post($text);?></p>
										<ul class="list-style-four">
										
											<?php foreach( $atts['blocks'] as $key => $item ): ?>
										
											<li><?php echo wp_kses_post($item->text); ?></li>
											
											<?php endforeach; ?>
											
										</ul>
										
									</div>
									<div class="column col-md-5 col-sm-5 col-xs-12">

										<!--Compaign Box-->
										<div class="compaign-box">
											<div class="inner-box" style="background-image:url(<?php echo esc_url($image); ?>)">
												<div class="title"><?php echo wp_kses_post($title2);?></div>
												<h2><?php echo wp_kses_post($ttitle);?></h2>
												<a href="<?php echo esc_url($link);?>" class="theme-btn btn-style-three"><?php echo wp_kses_post($btn);?></a>
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
</div>