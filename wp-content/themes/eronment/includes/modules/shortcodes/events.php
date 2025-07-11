<!--Events Page Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> events-page-section">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2><?php echo wp_kses_post($title);?></h2>
			<div class="text"><?php echo wp_kses_post($text);?></div>
		</div>
		<div class="row clearfix">

			<?php foreach( $atts['events'] as $key => $item ): ?>

			<!--Event Block Three-->
			<div class="event-block-three col-md-6 col-sm-12 col-xs-12">
				<div class="inner-box">
					<div class="image">
						<a href="<?php echo esc_url($item->link); ?>"><img src="<?php echo esc_url($item->image); ?>" alt="<?php esc_attr_e('Image', 'eronment');?>" /></a>
						<div class="post-date"><?php echo wp_kses_post($item->date); ?></div>
					</div>
					<div class="lower-content">
						<h3><a href="<?php echo esc_url($item->link); ?>"><?php echo wp_kses_post($item->title); ?></a></h3>
						<ul class="post-meta">
							<li><?php echo wp_kses_post($item->time); ?></li>
							<li><?php echo wp_kses_post($item->subtitle); ?></li>
						</ul>
						<div class="text"><?php echo wp_kses_post($item->text); ?></div>
						<a href="<?php echo esc_url($item->link); ?>" class="theme-btn btn-style-three"><?php echo wp_kses_post($item->btn); ?></a>
					</div>
				</div>
			</div>

			<?php endforeach; ?>

		</div>
	</div>
</section>
<!--End Events Page Section -->