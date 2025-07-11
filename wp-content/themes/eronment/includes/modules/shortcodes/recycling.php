<!--Recycling Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> recycling-section">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Title Column-->
			<div class="title-column col-md-4 col-sm-12 col-xs-12">
				<div class="inner-column">
					<h2><?php echo wp_kses_post($title);?></h2>
					<div class="title"><?php echo wp_kses_post($subtitle);?></div>
				</div>
			</div>

			<!--Content Column-->
			<div class="content-column col-md-8 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="text">
						<?php echo wp_kses_post($text);?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!--End Recycling Section-->