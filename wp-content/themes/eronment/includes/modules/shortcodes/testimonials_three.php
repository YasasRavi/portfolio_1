<?php $count = 1;
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);

if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Testimonial Section Two-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> testimonial-section-two">
	<div class="auto-container">
		<!--Title Box-->
		<div class="title-box">
			<h2><?php echo wp_kses_post($title);?></h2>
			<div class="text"><?php echo wp_kses_post($subtitle);?></div>
		</div>

		<div class="two-item-carousel owl-carousel owl-theme">
			
			<?php while($query->have_posts()): $query->the_post();
							global $post;
							$testimonials_meta = _WSH()->get_meta(); ?>

			<!--Testimonial Block-->
			<div class="testimonial-block-two">
				<div class="inner-box">
					<div class="content">
						<div class="image">
							<?php the_post_thumbnail();?>
						</div>
						<h3><?php the_title();?></h3>
						<div class="designation"><?php echo wp_kses_post(eronment_set($testimonials_meta, 'meta_designation')); ?></div>
						<div class="text"><?php echo wp_kses_post(eronment_trim(get_the_content(), $text_limit)); ?></div>
					</div>
				</div>
			</div>
			
			<?php endwhile;?>

		</div>

	</div>
</section>
<!--End Testimonial Section Two-->
    
<?php endif; wp_reset_postdata(); ?>


