<?php  
   global $post ;
   $count = 0;
   $paged = get_query_var('paged');
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order, 'paged'=>$paged);
   if( $cat ) $query_args['category_name'] = $cat;
   $query = new WP_Query($query_args) ; 
   ?>
<?php if($query->have_posts()):  ?>   

<!--News Section-->
<section class="<?php echo esc_attr(wp_kses_post($class));?> news-section">
	<div class="auto-container">
		<!--Sec Title Two-->
		<div class="sec-title-two">
			<h2><?php echo wp_kses_post($title);?></h2>
			<h3><?php echo wp_kses_post($subtitle);?></h3>
		</div>

		<div class="row clearfix">

			<?php while($query->have_posts()): $query->the_post();
                    global $post ; 
                    $post_meta = _WSH()->get_meta();?>

			<!--News Block-->
			<div class="news-block col-md-<?php echo esc_attr(wp_kses_post($column));?> col-sm-6 col-xs-12">
				<div class="inner-box">
					<div class="image">
						<a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail();?></a>
					</div>
					<div class="lower-box">
					
						<?php if(!$blog_postmeta == true): ?>
						
						<div class="post-info"><?php echo get_the_date()?></div>
						
						<?php endif ; ?>
						
						<h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
						
						<!--Read More Button-->				
						<?php if(!$blog_readmore == true): ?>
						<?php if (wp_kses_post($read_titel)) : ?>	
						<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="read-more"><?php echo wp_kses_post($read_titel);?></a>
						<?php else : ?>
						<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="read-more"><?php esc_html_e(' Read More ', 'eronment');?></a>
						<?php endif ; ?>
						<?php endif ; ?>
						<!--Read More Button-->	 
						
						
						
					</div>
				</div>
			</div>

			<?php endwhile;?>

		</div>

	</div>
</section>
<!--End News Section-->

<?php endif; wp_reset_postdata(); ?>

