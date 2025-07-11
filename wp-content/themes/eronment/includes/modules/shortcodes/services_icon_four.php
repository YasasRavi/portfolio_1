<?php global $post;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Services Section Three-->
<section class="services-section-three">
	<div class="auto-container">
		<div class="inner-container clearfix">
			
			<?php while($query->have_posts()): $query->the_post();
						global $post;
						$services_meta = _WSH()->get_meta(); ?>

			<!--Service Block Five-->
			<div class="service-block-five col-md-<?php echo esc_attr(wp_kses_post($column));?> col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="icon-box">
						<span class="icon <?php echo esc_attr(eronment_set($services_meta, 'meta_icon'));?>"></span>
					</div>
					<h3><?php the_title(); ?></h3>
					<div class="text"><?php echo wp_kses_post(eronment_trim(get_the_content(), $text_limit)); ?></div>
					<a href="<?php echo esc_url(eronment_set($services_meta, 'meta_link')); ?>" class="read-more"><?php echo wp_kses_post($btn);?></a>
				</div>
			</div>
			
			<?php endwhile; ?>

		</div>
	</div>
</section>
<!--End Services Section Three-->

<?php endif; wp_reset_postdata(); ?>
	