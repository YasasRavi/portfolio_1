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

<div class="<?php echo esc_attr( $args['class'] ); ?> vp-pagination__style-merge" data-vp-pagination-type="<?php echo esc_attr( $args['type'] ); ?>"
<?php if ( isset( $args['scroll_top_offset'] ) ) : ?>
	data-vp-pagination-scroll-top="<?php echo esc_attr( $args['scroll_top_offset'] ); ?>"
<?php endif; ?>
>
	<?php
	// phpcs:ignore
	foreach ( $args['items'] as $item ) {
		?>
		<div class="<?php echo esc_attr( $item['class'] ); ?>">
			<?php if ( $item['url'] ) : ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>">
					<?php
					if ( $item['is_prev_arrow'] ) {
						echo '<div class="overflow-hidden"><div class="icon">';
						visual_portfolio()->include_template( 'icons/arrow-left' );
						visual_portfolio()->include_template( 'icons/arrow-left' );
						echo '</div></div>';
					} elseif ( $item['is_next_arrow'] ) {
						echo '<div class="overflow-hidden"><div class="icon">';
						visual_portfolio()->include_template( 'icons/arrow-right' );
						visual_portfolio()->include_template( 'icons/arrow-right' );
						echo '</div></div>';
					} else {
						echo esc_html( $item['label'] );
					}
					?>
				</a>
			<?php else : ?>
				<span><?php echo esc_html( $item['label'] ); ?></span>
			<?php endif; ?>
		</div>
		<?php
	}
	?>
</div>