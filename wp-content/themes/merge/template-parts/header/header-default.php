<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_navbar = merge_get_theme_mod( 'page_custom_navigation', true );

$header_class = 'vlt-header vlt-header--default';

if ( merge_get_theme_mod( 'navigation_opaque', $acf_navbar ) == 'enable' ) {
	$header_class .= apply_filters( 'vlthemes/navigation_opaque', ' vlt-header--opaque' );
}

$navbar_class = 'vlt-navbar vlt-navbar--main';

if ( merge_get_theme_mod( 'navigation_transparent', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'vlthemes/navigation_transparent', ' vlt-navbar--transparent' );
}

if ( merge_get_theme_mod( 'navigation_transparent_always', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'vlthemes/navigation_transparent_always', ' vlt-navbar--transparent-always' );
}

if ( merge_get_theme_mod( 'navigation_sticky', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'vlthemes/navigation_sticky', ' vlt-navbar--sticky' );

	if ( merge_get_theme_mod( 'navigation_hide_on_scroll', $acf_navbar ) == 'enable' ) {

		$navbar_class .= apply_filters( 'vlthemes/navigation_hide_on_scroll', ' vlt-navbar--hide-on-scroll' );

	}

}

?>

<div class="d-none d-<?php echo merge_nav_breakpoint(); ?>-block">

	<header class="<?php echo merge_sanitize_class( $header_class ); ?>">

		<div class="<?php echo merge_sanitize_class( $navbar_class ); ?>">

			<div class="vlt-navbar-inner">

				<div class="vlt-navbar-background"></div>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo">

					<?php if ( merge_get_theme_mod( 'header_logo' ) ) : ?>

						<?php echo wp_get_attachment_image( merge_get_theme_mod( 'header_logo' ), 'full', false, array( 'loading' => 'lazy', 'class' => 'black' ) ); ?>

					<?php else: ?>

						<h2><?php echo substr( get_bloginfo( 'name' ), 0, 1 ); ?></h2>

					<?php endif; ?>

				</a>
				<!-- /.vlt-navbar-logo -->

				<div class="vlt-navbar-buttons">

					<?php if ( merge_get_theme_mod( 'header_search_icon' ) == 'show' ) : ?>

						<a href="#" class="vlt-navbar-buttonn js-search-form-open">
							<?php echo merge_get_icon( 'search' ); ?>
						</a>

					<?php endif; ?>

					<?php if ( merge_get_theme_mod( 'site_fullscreen_icon' ) == 'show' ) : ?>

						<a href="#" class="vlt-navbar-button js-site-fullscreen-toggle has-switch-button">
							<?php echo merge_get_icon( 'maximize' ); ?>
							<?php echo merge_get_icon( 'minimize' ); ?>
						</a>

					<?php endif; ?>

					<?php if ( merge_get_theme_mod( 'background_audio' ) ) : ?>

						<a href="#" class="vlt-navbar-button js-background-audio-toggle">
							<div class="vlt-sound-wave">
								<span class="bar"></span>
								<span class="bar"></span>
								<span class="bar"></span>
								<span class="bar"></span>
								<span class="bar"></span>
							</div>
						</a>

					<?php endif; ?>

					<a href="#" class="vlt-navbar-button js-offcanvas-menu-toggle">
						<div class="overflow-hidden">
							<div class="icon">
								<?php echo merge_get_icon( 'arrow-right' ); ?>
								<?php echo merge_get_icon( 'arrow-right' ); ?>
							</div>
						</div>
					</a>

				</div>
				<!-- /.vlt-navbar-buttons -->

			</div>
			<!-- /.vlt-navbar-inner -->

		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header -->

</div>
<!-- /.d-none d-<?php echo merge_nav_breakpoint(); ?>-block -->