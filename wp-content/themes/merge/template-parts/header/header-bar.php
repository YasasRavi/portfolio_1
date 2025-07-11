<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_navbar = merge_get_theme_mod( 'page_custom_navigation', true );

$bar_class = 'vlt-bar vlt-bar--fixed';

if ( merge_get_theme_mod( 'navigation_transparent', $acf_navbar ) == 'enable' ) {
	$bar_class .= apply_filters( 'vlthemes/navigation_transparent', ' vlt-bar--transparent' );
}

if ( is_page_template( 'template-fullpage-slider.php' ) && merge_get_theme_mod( 'navigation_transparent', $acf_navbar ) !== 'enable' ) {
	$bar_class .= ' vlt-bar--transparent';
}

if ( is_404() ) {
	$bar_class .= ' vlt-bar--transparent';
}

?>

<div class="d-none d-<?php echo merge_nav_breakpoint(); ?>-block">

	<div class="vlt-bar-lines">
		<span class="vlt-bar-line vlt-bar-line--right"></span>
		<span class="vlt-bar-line vlt-bar-line--bottom"></span>
		<span class="vlt-bar-line vlt-bar-line--top"></span>
		<span class="vlt-bar-line vlt-bar-line--left"></span>
	</div>
	<!-- /.vlt-bar-lines -->

	<div class="<?php echo merge_sanitize_class( $bar_class . ' vlt-bar--left' ); ?>">

		<div class="vlt-bar-table">

			<div class="vlt-bar-row">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-bar-logo">

					<?php if ( merge_get_theme_mod( 'header_logo' ) ) : ?>

						<?php echo wp_get_attachment_image( merge_get_theme_mod( 'header_logo' ), 'full', false, array( 'loading' => 'lazy', 'class' => 'black' ) ); ?>

					<?php else: ?>

						<h2><?php echo substr( get_bloginfo( 'name' ), 0, 1 ); ?></h2>

					<?php endif; ?>

				</a>
				<!-- .vlt-bar-logo -->

			</div>

			<div class="vlt-bar-row vlt-bar-row--full vlt-bar-row--center">

				<?php if( merge_get_theme_mod( 'header_social_list' ) ) : ?>

					<div class="vlt-bar-socials">

						<?php

							foreach ( merge_get_theme_mod( 'header_social_list' ) as $socialItem ) {
								if ( $socialItem[ 'social_icon' ] ) {
									echo '<a href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank" class="vlt-social-icon vlt-social-icon--style-1 notranslate"><span>' . merge_get_social_icons()[ $socialItem[ 'social_icon' ] ] . '</span></a>';
								}
							}

						?>

					</div>
					<!-- /.vlt-bar-socials -->

				<?php endif; ?>

			</div>

			<div class="vlt-bar-row vlt-bar-row--bottom">

				<a href="#" class="vlt-bar-button js-offcanvas-menu-toggle">
					<div class="overflow-hidden">
						<div class="icon">
							<?php echo merge_get_icon( 'arrow-right' ); ?>
							<?php echo merge_get_icon( 'arrow-right' ); ?>
						</div>
					</div>
				</a>

			</div>

		</div>

	</div>

	<div class="<?php echo merge_sanitize_class( $bar_class . ' vlt-bar--top' ); ?>">

		<div class="vlt-bar-table">

			<div class="vlt-bar-row vlt-bar-row--full vlt-bar-row--center">

				<div class="container">

					<?php if ( merge_get_theme_mod( 'header_contacts' ) ) : ?>

						<ul class="vlt-bar-contacts list-unstyled">

							<?php

								foreach ( merge_get_theme_mod( 'header_contacts' ) as $contact ) :
									echo '<li>';

									echo merge_get_icon( 'star-outline' );

									if ( $contact[ 'contact_url' ] ) {
										echo '<a href="' . esc_url( $contact[ 'contact_url' ] ) . '">';
									}

									echo '<span>' . esc_html( $contact[ 'contact_text' ] ) . '</span>';

									if ( $contact[ 'contact_url' ] ) {
										echo '</a>';
									}

									echo '</li>';

								endforeach;

							?>

						</ul>
						<!-- /.vlt-bar-contacts -->

					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

	<div class="<?php echo merge_sanitize_class( $bar_class . ' vlt-bar--right' ); ?>">

		<div class="vlt-bar-table">

			<div class="vlt-bar-row">

				<?php if ( merge_get_theme_mod( 'background_audio' ) ) : ?>

					<a href="#" class="vlt-bar-button js-background-audio-toggle">

						<div class="vlt-sound-wave">
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
						</div>

					</a>

				<?php endif; ?>

			</div>

			<div class="vlt-bar-row vlt-bar-row--full vlt-bar-row--center">

				<?php if ( merge_get_field( 'slider_progress_bar' ) ) : ?>

					<div class="js-main-slider-bar-area"></div>

				<?php endif; ?>

			</div>

			<div class="vlt-bar-row vlt-bar-row--bottom">

				<?php if ( is_active_sidebar( 'offcanvas_sidebar' ) ) : ?>

					<a href="#" class="vlt-bar-button js-offcanvas-sidebar-toggle">
						<?php echo merge_get_icon( 'plus' ); ?>
					</a>

				<?php endif; ?>

			</div>

		</div>

	</div>
	<!-- /.vlt-bar -->

	<div class="<?php echo merge_sanitize_class( $bar_class . ' vlt-bar--bottom' ); ?>">

		<div class="vlt-bar-table">

			<div class="vlt-bar-row vlt-bar-row--full vlt-bar-row--center">

				<div class="container">

					<div class="row">

						<?php if ( merge_get_theme_mod( 'header_copyright' ) ) : ?>

							<div class="col-6 col-lg-2">

								<div class="vlt-bar-info">

									<span class="vlt-display-2"><?php esc_html_e( 'Version', 'merge' ); ?></span>

									<p class="small"><?php echo sprintf( merge_get_theme_mod( 'header_copyright' ), date( 'Y' ) ); ?></p>

								</div>
								<!-- /.vlt-bar-info -->

							</div>

						<?php endif; ?>

						<?php if ( merge_get_theme_mod( 'local_time_format' ) ) : ?>

							<div class="col-6 col-lg-2">

								<div class="vlt-bar-info">

									<span class="vlt-display-2"><?php esc_html_e( 'Local Time', 'merge' ); ?></span>

									<p class="small js-local-time"></p>

								</div>
								<!-- /.vlt-bar-info -->

							</div>

						<?php endif; ?>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>
<!-- /.d-none d-<?php echo merge_nav_breakpoint(); ?>-block -->