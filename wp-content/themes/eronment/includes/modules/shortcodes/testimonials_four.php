<?php $count = 1;
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);

if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Testimonial Page Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> testimonial-page-section">
	<div class="auto-container">

		<?php while($query->have_posts()): $query->the_post();
							global $post;
							$testimonials_meta = _WSH()->get_meta(); ?>

		<!--Testimonial Block Three-->
		<div class="testimonial-block-three">
			<div class="inner-box">
				<div class="text"><?php echo wp_kses_post(eronment_trim(get_the_content(), $text_limit)); ?></div>
				<div class="image">
					<?php the_post_thumbnail();?>
				</div>
				<div class="author"><?php the_title();?></div>
			</div>
		</div>

		<?php endwhile;?>

	</div>
</section>
<!--End Testimonial Page Section -->
    
<?php endif; wp_reset_postdata(); ?>


