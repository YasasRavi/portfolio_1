<!--Featured Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?>featured-section">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Image Column-->
			<div class="image-column col-md-6 col-sm-12 col-xs-12">
				<div class="image">
					<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" />
				</div>
			</div>

			<!--Content Column-->
			<div class="content-column col-md-6 col-sm-12 col-xs-12">
				<div class="inner-column">
					<div class="sec-title-two">
						<h2><?php echo wp_kses_post($title);?></h2>
					</div>
					<div class="text"><?php echo wp_kses_post($text);?></div>
					
					<?php foreach( $atts['services'] as $key => $item ): ?>

					<!--Featured Block-->
					<div class="featured-block">
						<div class="featured-inner">
							<div class="icon-box">
								<span class="icon <?php echo esc_attr($item->icon); ?>"></span>
							</div>
							<h3><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->title); ?></a></h3>
							<div class="featured-text"><?php echo wp_kses_post($item->text); ?></div>
						</div>
					</div>
					
					<?php endforeach;?>
					
				</div>
			</div>

		</div>
	</div>
</section>
<!--End Featured Section-->

