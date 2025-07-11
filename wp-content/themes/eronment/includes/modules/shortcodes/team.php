<?php $count = 1;
$query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);

if( $cat ) $query_args['team_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Default Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> default-section">
	<div class="auto-container">

		<!--Team Section-->
		<div class="team-section">
			<div class="row clearfix">

				<!--Title Column-->
				<div class="title-column col-lg-3 col-md-12 col-sm-12 col-xs-12">
					<div class="title-inner">
						<div class="sec-title">
							<h2><?php echo wp_kses_post($title);?></h2>
							<div class="text"><?php echo wp_kses_post($text);?></div>
						</div>
						<a href="<?php echo esc_url($link);?>" class="view-team"><?php echo wp_kses_post($btn);?></a>
					</div>
				</div>
				
				<?php while($query->have_posts()): $query->the_post();
					global $post ; 
					$teams_meta = _WSH()->get_meta();
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				   ?>

				<!--Team Block-->
				<div class="team-block col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="inner-box">
						<div class="image">
							<?php the_post_thumbnail(); ?>
							<div class="overlay-box">
							
								<?php if($socials = eronment_set($teams_meta, 'bunch_team_social')):?>
							
								<ul class="social-icon-one">
									
									<?php foreach($socials as $key => $value):?>
									
									<li><a href="<?php echo esc_url(eronment_set($value, 'social_link')); ?>"><span class="fa <?php echo esc_attr(eronment_set($value, 'social_icon'));?>"></span></a></li>
									
									<?php endforeach;?>
									
								</ul>
								
								<?php endif;?>
								
							</div>
						</div>
						<div class="lower-box">
							<h3><a href="<?php echo esc_url(eronment_set($teams_meta, 'meta_link')); ?>"><?php the_title(); ?></a></h3>
							<div class="designation"><?php echo wp_kses_post(eronment_set($teams_meta, 'meta_designation')); ?></div>
						</div>
					</div>
				</div>
				
				<?php endwhile;?>

			</div>
		</div>

	</div>
</section>
<!--End Default Section-->

<?php endif; wp_reset_postdata(); ?>

