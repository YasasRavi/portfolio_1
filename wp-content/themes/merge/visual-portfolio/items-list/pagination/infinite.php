<?php
/**
 * Default pagination template.
 *
 * @var $args
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="<?php echo esc_attr( $args['class'] ); ?> vp-pagination__style-merge" data-vp-pagination-type="<?php echo esc_attr( $args['type'] ); ?>">
	<div class="vp-pagination__item">
		<a class="vp-pagination__load-more vlt-btn vlt-btn--effect vlt-btn--primary vlt-btn--rounded vlt-btn--has-icon" href="<?php echo esc_url( $args['next_page_url'] ); ?>">
			<span class="vp-pagination__load-more-load"><?php echo esc_html( $args['text_load'] ); ?></span>
			<span class="vp-pagination__load-more-loading"><?php echo esc_html( $args['text_loading'] ); ?></span>
			<span class="vp-pagination__load-more-no-more"><?php echo esc_html( $args['text_end_list'] ); ?></span>
		</a>
	</div>
</div>