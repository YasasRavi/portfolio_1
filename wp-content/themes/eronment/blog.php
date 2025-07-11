<?php 
$options = _WSH()->option();
eronment_bunch_global_variable();
 ?>
<div class="news-block-three">
	<div class="inner-box">
		
		<?php if(has_post_thumbnail()):?>
		<div class="image">
			<a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail();?></a>
		</div>
		<?php endif; ?>
		
		
		<div class="lower-content">
			<div class="upper-box clearfix">
				
				<?php if(!eronment_set($options, 'date')):?>
				<div class="posted-date pull-left"><?php echo get_the_date()?></div>
				<?php endif; ?>
				
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
				<h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
				
				<div class="text"><?php the_excerpt();?></div>
				
				<?php if (eronment_set($options, 'btn_title')) : ?>
				<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-two read-more"><?php echo wp_kses_post(eronment_set($options, 'btn_title'));?></a>
				<?php else : ?>
				<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-two read-more"><?php esc_html_e(' Read More ', 'eronment');?></a>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>