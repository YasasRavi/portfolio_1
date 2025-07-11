<?php 
$options = _WSH()->option();
$meta = _WSH()->get_meta('_bunch_header_settings');
eronment_bunch_global_variable();
 ?>
<div class="inner-box">
	<?php if(has_post_thumbnail()):?>
	<div class="image">
		<?php the_post_thumbnail();?>
	</div>
	<?php endif;?>
	
	
	<div class="lower-content">
		<div class="upper-box clearfix">
			
			<?php if(!eronment_set($options, 'date')):?>
			<div class="posted-date pull-left"><?php echo get_the_date()?></div>
			<?php endif ; ?>
			
			<ul class="post-meta pull-right">
				<?php if(!eronment_set($options, 'author')):?>
				<li><?php if (eronment_set($options, 'by_text')) : ?>
				<?php echo wp_kses_post(eronment_set($options, 'by_text')); ?>
				<?php else : ?>
				<?php esc_html_e('By: ', 'eronment');?>
				<?php endif ; ?>
				<?php the_author();?></li>
				<?php endif ; ?>
				
				<?php if(eronment_set($options, 'tag')):?>
				<li><?php the_tags(); ?></li>
				<?php endif ; ?>
				<?php if(!eronment_set($options, 'comments')):?>
				<li><?php comments_number(); ?></li>
				<?php endif ; ?>
			</ul>
		</div>
		<div class="lower-box">
			
			<?php if(eronment_set($meta, 'sposttitle')):?>
			<h3><?php the_title();?></h3>
			<?php endif ; ?>
			
			<div class="text">
			<?php the_content(); ?>
				<div class="clearfix"></div>
	<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'eronment'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>			
			 </div>
		</div>
	</div>
</div>
<?php get_template_part( 'post_navigation' ); ?>

	  <?php if(!eronment_set($options, 'commentbox')):?>	
	<?php comments_template(); ?> 
<?php endif;?>