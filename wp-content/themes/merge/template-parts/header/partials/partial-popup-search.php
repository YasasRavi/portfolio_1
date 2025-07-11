<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$acf_navbar = merge_get_theme_mod( 'page_custom_navigation', true );

$search_class = 'vlt-search-popup';
$search_form_class = 'vlt-search-form';

?>

<div class="<?php echo merge_sanitize_class( $search_class ); ?>">

	<div class="vlt-animated-circles">
		<div class="vlt-circle vlt-circle--small vlt-circle--top-right-absolute"></div>
		<div class="vlt-circle vlt-circle--large vlt-circle--bottom-left-absolute"></div>
	</div>

	<div class="vlt-search-popup__content">

		<div class="container">

			<div class="row">

				<div class="col-lg-8 offset-lg-2">

					<form class="<?php echo merge_sanitize_class( $search_form_class ); ?>" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

						<label class="vlt-display-2"><?php esc_html_e( 'Type here to search', 'merge' ); ?>
						<input type="text" class="style-2" name="s" autocomplete="off"></label>
						<button><?php echo merge_get_icon( 'search' ); ?></button>

					</form>
					<!-- /.vlt-search-form -->

				</div>

			</div>

		</div>

	</div>

</div>
<!-- /.vlt-search-popup -->