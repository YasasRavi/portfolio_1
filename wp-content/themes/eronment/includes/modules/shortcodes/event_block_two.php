<!--Events Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> events-section style-two" style="background-image:url(<?php echo esc_url($bgimage); ?>)">
	<div class="auto-container">
	<div class="row clearfix">

		<!--Column-->
		<div class="column col-md-7 col-sm-12 col-xs-12">
			
			<!--Sec Title Two-->
			<div class="sec-title-two light">
				<h2><?php echo wp_kses_post($title);?></h2>
			</div>

			<?php foreach( $atts['fact'] as $key => $item ): ?>

			<!--Event Block-->
			<div class="event-block style-two">
				<div class="inner-box">
					<div class="row clearfix">

						<!--Image Column-->
						<div class="image-column col-md-5 col-sm-6 col-xs-12">
							<div class="image">
								<a href="<?php echo esc_url($item->link); ?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" /></a>
								<div class="post-date"><?php echo wp_kses_post($item->date); ?></div>
							</div>
						</div>

						<!--Content Column-->
						<div class="content-column col-md-7 col-sm-6 col-xs-12">
							<div class="inner-column">
								<h3><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->title); ?></a></h3>
								<ul>
									<li><?php echo wp_kses_post($item->time); ?></li>
									<li><?php echo wp_kses_post($item->subtitle); ?></li>
								</ul>
								<div class="text"><?php echo wp_kses_post($item->text); ?></div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<?php endforeach; ?>

		</div>

		<!--Column-->
		<div class="column col-md-5 col-sm-12 col-xs-12">
			<!--Sec Title Two-->
			<div class="sec-title-two light">
				<h2><?php echo wp_kses_post($title1);?></h2>
			</div>

			<?php foreach( $atts['fact_two'] as $key => $item ): ?>

			<!--Event Block Two-->
			<div class="event-block-two style-two">
				<div class="inner-box">
					<div class="post-date"><?php echo wp_kses_post($item->date); ?></div>
					<h3><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->title); ?></a></h3>
					<ul>
						<li><?php echo wp_kses_post($item->time); ?></li>
						<li><?php echo wp_kses_post($item->subtitle); ?></li>
					</ul>
					<div class="text"><?php echo wp_kses_post($item->text); ?></div>
				</div>
			</div>

			<?php endforeach; ?>

		</div>

	</div>

</div>
</section>
<!--End Events Section-->