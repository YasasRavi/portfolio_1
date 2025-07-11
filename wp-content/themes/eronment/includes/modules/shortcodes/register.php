<!--Register Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> register-section">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Column-->
			<div class="content-column col-md-8 col-sm-12 col-xs-12">
				<div class="inner-column">
					<h2><?php echo wp_kses_post($title);?></h2>
					<div class="text">
						<?php echo wp_kses_post($text);?>
					</div>
					<a href="<?php echo esc_url($link);?>" class="more-about"><?php echo wp_kses_post($btn);?></a>
				</div>
			</div>

			<!--Form Column-->
			<div class="form-column col-md-4 col-sm-12 col-xs-12">
				<div class="inner-column">
					<h2><?php echo wp_kses_post($ttitle);?></h2>
					<div class="text"><?php echo wp_kses_post($text1);?></div>
					<!--Emailed Form-->
					<div class="emailed-form">
						<?php echo do_shortcode($contact_form); ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!--End Register Section-->