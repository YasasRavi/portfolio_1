<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'title' ); ?>

		</header>
		<!-- /.vlt-post-header -->

		<footer class="vlt-post-footer">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'meta' ); ?>

		</footer>
		<!-- /.vlt-post-footer -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->