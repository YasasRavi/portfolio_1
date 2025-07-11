<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_class = 'vlt-post vlt-post--style-1';

$link_data = array(
	'href' => $args['url'],
	'target' => $args['url_target'],
	'rel' => $args['url_rel'],
	'link_cursor' => 'eye'
);

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( $args['image'] ) : ?>

		<div class="vlt-post-media">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'category' ); ?>

			<div class="vp-portfolio__item-img-wrap">

				<div class="vp-portfolio__item-img">

					<?php visual_portfolio()->include_template( 'global/link-start', $link_data ); ?>

					<?php

						// Show Image.
						visual_portfolio()->include_template(
							'items-list/item-parts/image',
							array( 'image' => $args['image'] )
						);

					?>

					<?php visual_portfolio()->include_template( 'global/link-end', $link_data ); ?>

				</div>

			</div>

		</div>

	<?php else: ?>

		<?php get_template_part( 'template-parts/post/partials/partial-post', 'category' ); ?>

	<?php endif; ?>