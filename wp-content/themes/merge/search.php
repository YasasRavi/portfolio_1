<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

get_header();

$pagination = merge_get_theme_mod( 'search_type_pagination' );

$column_sidebar_class = 'col-lg-4';
$column_content_class = is_active_sidebar( 'blog_sidebar' ) ? 'col-lg-8' : 'col-lg-8 offset-lg-2';

if ( merge_get_theme_mod( 'sticky_sidebar' ) == 'enable' ) {
	$column_sidebar_class .= ' sticky-parent';
}

$sidebar_class = 'vlt-sidebar vlt-sidebar--right';

?>

<main class="vlt-main">

	<?php get_template_part( 'template-parts/page-title/page-title', 'search' ); ?>

	<div class="vlt-page-content vlt-page-content--padding">

		<div class="container">

			<div class="row">

				<div class="<?php echo merge_sanitize_class( $column_content_class ); ?>">

					<?php

						if ( have_posts() ) :

							get_template_part( 'template-parts/loop/loop-blog', 'default' );
							echo merge_get_page_pagination( null, $pagination );

						else:

							get_template_part( 'template-parts/content/content-page', 'empty' );

						endif;

						wp_reset_postdata();

					?>

				</div>

				<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>

					<div class="<?php echo merge_sanitize_class( $column_sidebar_class ); ?>">

						<?php if ( merge_get_theme_mod( 'sticky_sidebar' ) == 'enable' ) : ?>

						<div class="sticky-column">

						<?php endif; ?>

							<div class="<?php echo merge_sanitize_class( $sidebar_class ); ?>">

								<?php get_sidebar(); ?>

							</div>

						<?php if ( merge_get_theme_mod( 'sticky_sidebar' ) == 'enable' ) : ?>

						</div>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>