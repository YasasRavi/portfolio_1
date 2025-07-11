<section class="<?php echo esc_attr(wp_kses_post($class));?> donation-section">
	<div class="auto-container">
		<div class="inner-container">
			<h2><?php echo wp_kses_post($ttitle);?></h2>
			<div class="lower-content">
				<h3><?php echo wp_kses_post($title);?></h3>
				<!--Donate Form-->
				<div class="donate-form">
					<div class="upper-box">
						<?php echo do_shortcode($contact_form); ?>
					</div>
					
					<div class="row clearfix">
						
						<?php echo do_shortcode($contact_form1); ?>
					</div>
					
					<div class="lower-box">
						<h4><?php echo wp_kses_post($title1);?></h4>
						<div class="clearfix">
							<?php echo do_shortcode($contact_form2); ?>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
</section>