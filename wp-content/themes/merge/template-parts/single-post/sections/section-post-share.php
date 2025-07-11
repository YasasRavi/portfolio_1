<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-post-share">

	<h6 class="vlt-post-share__title vlt-display-1"><?php esc_html_e( 'Share this', 'merge' ); ?></h6>

	<div class="vlt-post-share__links">
		<?php echo vlthemes_get_post_share_buttons( get_the_ID() ); ?>
	</div>

	<div class="vlt-post-share__permalink">
		<input type="text" id="shortlink" name="shortlink" value="<?php the_permalink(); ?>" readonly>
		<span class="copy-shortlink" data-tippy-content="<?php esc_attr_e( 'Copy', 'merge' ); ?>" data-clipboard-label="<?php esc_attr_e( 'Copied', 'merge' ); ?>" data-clipboard-target="#shortlink"><?php echo merge_get_icon( 'copy' ); ?></span>
	</div>

</div>