<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<article <?php post_class( 'vlt-page vlt-page--empty' ); ?>>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

		<p><?php esc_html_e( 'Ready to publish your first post?', 'merge' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="vlt-btn vlt-btn--effect vlt-btn--primary vlt-btn--rounded"><span class="vlt-btn__text"><?php esc_html_e( 'Get started here', 'merge' ); ?></span></a>

	<?php elseif ( is_search() ): ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'merge' ); ?></p>

		<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

			<input type="text" name="s" placeholder="<?php esc_attr_e( 'Type here to search', 'merge' ); ?>">

			<button><i class="ri-search-2-line"></i></button>

		</form>
		<!-- /.vlt-search-form -->

	<?php else: ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'merge' ); ?></p>

	<?php endif; ?>

</article>
<!-- /.vlt-page -->