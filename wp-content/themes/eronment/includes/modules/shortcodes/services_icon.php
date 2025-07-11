<?php global $post;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Mission Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> mission-section">
	<!--Upper Section-->
	<div class="upper-section">
		<div class="auto-container">
			<!--Sec Title-->
			<div class="sec-title light centered">
				<h2><?php echo wp_kses_post($title);?></h2>
				<h3><?php echo wp_kses_post($subtitle);?></h3>
				<div class="text"><?php echo wp_kses_post($text);?></div>
			</div>
		</div>
	</div>
	<!--Lower Section-->
	<div class="lower-section">
		<div class="auto-container">
			<div class="three-item-carousel owl-carousel owl-theme">
				
				<?php while($query->have_posts()): $query->the_post();
						global $post;
						$services_meta = _WSH()->get_meta(); ?> 

				<!--Services Block One-->
				<div class="service-block">
					<div class="inner-box">
						<div class="icon-box">
							<span class="icon"><?php the_post_thumbnail();?></span>
						</div>
						<h3><a href="<?php echo esc_url(eronment_set($services_meta, 'meta_link')); ?>"><?php the_title(); ?></a></h3>
						<div class="text"><?php echo wp_kses_post(eronment_trim(get_the_content(), $text_limit)); ?></div>
					</div>
				</div>

				<?php endwhile; ?>

			</div>
		</div>
	</div>
</section>
<!--End Mission Section-->

<?php endif; wp_reset_postdata(); ?>
	