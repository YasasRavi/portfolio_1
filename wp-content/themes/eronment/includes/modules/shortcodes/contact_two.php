<!--Case Page Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> in-touch-section contact-page-section">
	<div class="auto-container">
		<!--Sec Title Two-->
		<div class="sec-title-two">
			<h2><?php echo wp_kses_post($title);?></h2>
			<div class="text"><?php echo wp_kses_post($text);?></div>
		</div>

		<div class="row clearfix">

			<!--Info Column-->
			<div class="info-column col-md-5 col-sm-12 col-xs-12">
				<div class="inner-column">
					<h3><?php echo wp_kses_post($title1);?></h3>
					<div class="text"><?php echo wp_kses_post($text1);?></div>
					<ul class="list-style-two style-two">
					
						<?php foreach( $atts['contact'] as $key => $item ): ?>
					
						<li><span class="icon fa <?php echo esc_attr($item->icon); ?>"></span><strong><?php echo wp_kses_post($item->title); ?></strong><?php echo wp_kses_post($item->text); ?></li>
						
						<?php endforeach; ?>
						
					</ul>
				</div>
			</div>

			<!--Content Column-->
			<div class="content-column col-md-7 col-sm-12 col-xs-12">
				<div class="inner-column">

					<!-- Default Form -->
					<div class="contact-form default-form">
						<form method="post" action="sendemail.php" id="contact-form">
							<div class="form-group">
								<input type="text" name="username" placeholder="Name" required>
							</div>

							<div class="form-group">
								<input type="email" name="email" placeholder="Email" required>
							</div>

							<div class="form-group">
								<input type="text" name="subject" placeholder="Subject" required>
							</div>

							<div class="form-group">
								<textarea name="message" placeholder="Message" ></textarea>
							</div>

							<div class="form-group">
								<button class="theme-btn btn-style-two" type="submit" name="submit-form">Submit now</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!--End contact Page Section -->