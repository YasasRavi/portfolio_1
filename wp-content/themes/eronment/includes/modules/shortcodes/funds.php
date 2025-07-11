<!--Funds Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> funds-section">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Column-->
			<div class="content-column col-md-7 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="sec-title">
						<h2><?php echo wp_kses_post($title);?></h2>
					</div>
					<div class="text"><?php echo wp_kses_post($text);?></div>
				</div>
			</div>

			<!--Skills Column-->
			<div class="skill-column col-md-5 col-sm-12 col-xs-12">
				<div class="inner-column">
					
					<?php foreach( $atts['skillfacts'] as $key => $item ): ?>

					<!--Skill Bar-->
					<div class="skill-outer">
						<div class="text"><?php echo wp_kses_post($item->title); ?></div>
						<div class="skill-bar">
							<div class="bar-inner">
								<div class="bar progress-line" data-width="50"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($item->ff_stop); ?>">0</span><?php echo wp_kses_post($item->ff_sign); ?></div></div>
							</div>
						</div>
					</div>
					
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>
</section>
<!--End Funds Section-->