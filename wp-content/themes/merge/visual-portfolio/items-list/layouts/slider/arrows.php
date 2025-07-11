<?php
/**
 * Slider layout arrows.
 *
 * @var $options
 *
 * @package @@plugin_name
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="vp-portfolio__items-arrow vp-portfolio__items-arrow-prev" tabindex="0" role="button" aria-label="<?php echo esc_attr__( 'Previous slide', 'merge' ); ?>">
	<?php visual_portfolio()->include_template( 'icons/arrow-left' ); ?>
</div>

<div class="vp-portfolio__items-arrow vp-portfolio__items-arrow-next" tabindex="0" role="button" aria-label="<?php echo esc_attr__( 'Next slide', 'merge' ); ?>">
	<?php visual_portfolio()->include_template( 'icons/arrow-right' ); ?>
</div>