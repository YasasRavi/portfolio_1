<!--Faq Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> faq-section">
	<div class="auto-container">
		<div class="row clearfix">

			<div class="column col-md-7 col-sm-12 col-xs-12">
				<div class="sec-title-two">
					<h2><?php echo wp_kses_post($title);?></h2>
				</div>

				<!--Accordian Box-->
				<ul class="accordion-box">
					
					<?php foreach( $atts['faq'] as $key => $item ): ?>

					<!--Block-->
					<li class="accordion block active-block">
						<div class="acc-btn <?php if($key == 2) echo 'active'; ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-caret-right"></span></div><?php echo wp_kses_post($item->title); ?></div>
						<div class="acc-content  <?php if($key == 2) echo 'current'; ?>">
							<div class="content">
								<div class="text">
									<p><?php echo wp_kses_post($item->text); ?></p>
								</div>
							</div>
						</div>
					</li>
					
					<?php endforeach;?>

				</ul>

			</div>

			<div class="column col-md-5 col-sm-12 col-xs-12">
				<div class="sec-title-two">
					<h2><?php echo wp_kses_post($title1);?></h2>
				</div>

				<!-- Faq Form -->
				<div class="faq-form">
					<?php echo do_shortcode($contact_form); ?>
				</div>

			</div>

		</div>
	</div>
</section>
<!--End Faq Section -->