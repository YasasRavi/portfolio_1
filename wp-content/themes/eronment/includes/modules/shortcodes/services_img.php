<?php global $post;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num, 'order_by' => $sort, 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Services Section Two-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> services-section-two">
	<div class="auto-container">
		<div class="title-box">
			<h2><?php echo wp_kses_post($title);?></h2>
			<div class="text"><?php echo wp_kses_post($text);?></div>
		</div>
		<div class="row clearfix">
			
			<?php while($query->have_posts()): $query->the_post();
						global $post;
						$services_meta = _WSH()->get_meta(); ?>

			<!--Services Block Four-->
			<div class="service-block-four col-md-<?php echo esc_attr(wp_kses_post($column));?> col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="image">
						<?php the_post_thumbnail();?>
						<div class="overlay-box">
							<div class="content">
								<a href="<?php echo esc_url(eronment_set($services_meta, 'meta_link')); ?>"><?php the_title(); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php endwhile; ?>

		</div>
	</div>
</section>
<!--End Services Section Two-->

<?php endif; wp_reset_postdata(); ?>


			