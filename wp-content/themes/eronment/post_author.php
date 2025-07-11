<?php 
$options = _WSH()->option();
eronment_bunch_global_variable();
 ?>
<?php if(get_the_author_meta('description')){ ?>
<div class="author-box">
	<div class="author-inner">
		<div class="content">
			<div class="image">
				<?php echo get_avatar(get_the_author_meta( 'ID' ), 85 ); ?>
				<div class="author-name"><?php the_author(); ?></div>
			</div>
			<div class="text"><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></div>
		</div>
	</div>
</div>
<?php } ?>