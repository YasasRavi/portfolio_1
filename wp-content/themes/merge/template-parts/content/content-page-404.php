<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<div class="vlt-animated-circles">
	<div class="vlt-circle vlt-circle--large vlt-circle--top-right"></div>
	<div class="vlt-circle vlt-circle--small vlt-circle--bottom-left"></div>
</div>

<article <?php post_class( 'vlt-page vlt-page--404' ); ?>>

	<div class="container">

		<div class="row align-items-center">

			<div class="col-lg-6 offset-lg-3">

				<div class="vlt-page-error-content text-center">

					<span class="vlt-badge vlt-animate-element" data-animation-name="merge"><?php echo merge_get_icon( 'star-fill' ) . esc_html__( 'Error 404', 'merge' ); ?></span>

					<h1 class="vlt-animate-element" data-animation-name="merge" data-animation-delay="100"><?php echo esc_html( merge_get_theme_mod( 'error_title' ) ); ?></h1>

					<p class="vlt-animate-element" data-animation-name="merge" data-animation-delay="200"><?php echo wp_kses( merge_get_theme_mod( 'error_subtitle' ), 'merge_error_subtitle' ); ?></p>

					<div class="vlt-animate-element" data-animation-name="merge" data-animation-delay="300">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-btn vlt-btn--primary vlt-btn--effect vlt-btn--rounded"><span class="vlt-btn__text"><?php esc_html_e( 'Go back home', 'merge' ); ?></span></a>

					</div>

				</div>

			</div>

		</div>

	</div>

</article>
<!-- /.vlt-page -->