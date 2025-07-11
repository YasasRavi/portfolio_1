<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

if ( ! is_active_sidebar( 'offcanvas_sidebar' ) ) {
	return;
}

$offcanvas_sidebar_class = 'vlt-offcanvas-sidebar';

?>

<div class="<?php echo merge_sanitize_class( $offcanvas_sidebar_class ); ?>">

	<div class="vlt-animated-circles">
		<div class="vlt-circle vlt-circle--large vlt-circle--bottom-right-absolute"></div>
	</div>

	<a href="#" class="vlt-offcanvas-sidebar-icon-close js-offcanvas-sidebar-close">
		<?php echo merge_get_icon( 'close' ); ?>
	</a>
	<!-- /.vlt-offcanvas-sidebar-icon-close -->

	<?php if ( merge_get_theme_mod( 'marqueue_text' ) ) : ?>

		<div class="vlt-offcanvas-sidebar__marqueue notranslate" data-marquee="vertical">
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
		</div>
		<!-- /.vlt-offcanvas-sidebar__marqueue -->

	<?php endif; ?>

	<div class="vlt-offcanvas-sidebar__inner">

		<div class="vlt-sidebar">

			<?php dynamic_sidebar( 'offcanvas_sidebar' ); ?>

		</div>

	</div>
	<!-- /.vlt-offcanvas-sidebar__inner -->

</div>
<!-- /.vlt-offcanvas-sidebar -->