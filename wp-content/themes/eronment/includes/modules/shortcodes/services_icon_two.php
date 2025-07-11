<?php global $post;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--We Do Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> we-do-section">
	<div class="auto-container">
		<!--Sec Title Two-->
		<div class="sec-title-two">
			<h2><?php echo wp_kses_post($title);?></h2>
			<div class="text"><?php echo wp_kses_post($text);?></div>
		</div>
		<div class="row clearfix">
			
			<?php while($query->have_posts()): $query->the_post();
						global $post;
						$services_meta = _WSH()->get_meta(); ?>

			<!--Services Block Two-->
			<div class="service-block-two col-md-<?php echo esc_attr(wp_kses_post($column));?> col-lg-4 col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="icon-box">
						<span class="icon <?php echo esc_attr(eronment_set($services_meta, 'meta_icon'));?>"></span>
					</div>
					<h3><a href="<?php echo esc_url(eronment_set($services_meta, 'meta_link')); ?>"><?php the_title(); ?></a></h3>
					<div class="text"><?php echo wp_kses_post(eronment_trim(get_the_content(), $text_limit)); ?></div>
				</div>
			</div>
			
			<?php endwhile; ?>

		</div>
	</div>
</section>
<!--End We Do Section-->

<?php endif; wp_reset_postdata(); ?>
	