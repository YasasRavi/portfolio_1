<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="d-none d-<?php echo merge_nav_breakpoint(); ?>-block">

	<nav class="vlt-offcanvas-menu" data-submenu-effect="style-2">

		<div class="vlt-animated-circles">
			<div class="vlt-circle vlt-circle--large vlt-circle--bottom-left-absolute"></div>
		</div>

		<?php if ( merge_get_theme_mod( 'marqueue_text' ) ) : ?>

			<div class="vlt-offcanvas-menu__marqueue notranslate" data-marquee="vertical">
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
				<div data-marquee-text class="vlt-display-1"><?php echo merge_get_theme_mod( 'marqueue_text' ) . merge_get_icon( 'star-fill'); ?></div>
			</div>
			<!-- /.vlt-offcanvas-menu__marqueue -->

		<?php endif; ?>

		<div class="vlt-nav-table">

			<div class="vlt-nav-row">

				<?php if ( merge_get_theme_mod( 'offcanvas_menu_subscribe' ) ) : ?>

					<div class="vlt-offcanvas-menu__subscribe">

						<?php echo do_shortcode( merge_get_theme_mod( 'offcanvas_menu_subscribe' ) ); ?>

					</div>
					<!-- /.vlt-offcanvas-menu__subscribe -->

				<?php else: ?>

					<span></span>

				<?php endif; ?>

			</div>

			<div class="vlt-nav-row vlt-nav-row--full vlt-nav-row--center">

				<nav class="vlt-offcanvas-menu__navigation">

					<?php

						$acf_onepage_navigation = merge_get_theme_mod( 'onepage_navigation', true );

						if ( $acf_onepage_navigation ) {

							wp_nav_menu( array(
								'theme_location' => 'onepage-menu',
								'container' => false,
								'depth' => 1,
								'menu_class' => 'sf-menu sf-menu-onepage',
								'link_before' => '<span class="menu-item-text">',
								'link_after' => '</span><span class="menu-item-icon"></span>',
								'fallback_cb' => 'merge_fallback_menu',
								'walker' => new Merge_Custom_Walker_Nav_Menu()
							) );

						} else {

							wp_nav_menu( array(
								'theme_location' => 'primary-menu',
								'container' => false,
								'depth' => 3,
								'menu_class' => 'sf-menu',
								'link_before' => '<span class="menu-item-text">',
								'link_after' => '</span><span class="menu-item-icon"></span>',
								'fallback_cb' => 'merge_fallback_menu',
							) );

						}

					?>

				</nav>

			</div>

			<div class="vlt-nav-row">

				<?php if ( merge_get_theme_mod( 'offcanvas_menu_locales' ) == 'show' ) : ?>

					<div class="vlt-offcanvas-menu__locales">

						<span class="vlt-display-2"><?php esc_html_e( 'Choose language:', 'merge' ); ?></span>

						<nav>

							<?php
								if ( class_exists( 'GTranslate' ) ) {
									echo do_shortcode( '[gtranslate]' );
								}
							?>

						</nav>

					</div>
					<!-- /.vlt-offcanvas-menu__locales -->

				<?php else: ?>

					<span></span>

				<?php endif; ?>

			</div>

		</div>

	</nav>

</div>
<!-- /.d-none d-<?php echo merge_nav_breakpoint(); ?>-block -->