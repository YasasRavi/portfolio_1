<?php /* Template Name: King Composer Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	 get_template_part( 'post_bread' ); ?> 


<?php while( have_posts() ): the_post(); ?>
<?php the_content(); ?>	
<?php endwhile;  ?>
<?php if(eronment_set($meta, 'navigation')):?>
<?php get_template_part( 'post_navigation' ); ?>
<?php endif; ?>	
<?php get_footer() ; ?>