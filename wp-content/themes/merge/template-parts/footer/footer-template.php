<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

$footer_class = 'vlt-footer vlt-footer--template';
$acf_footer = merge_get_theme_mod( 'page_custom_footer', true );

if ( merge_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

$footer_template = merge_get_theme_mod( 'footer_template', $acf_footer );

?>

<footer class="<?php echo merge_sanitize_class( $footer_class ); ?>">

	<?php echo merge_render_elementor_template( $footer_template ); ?>

</footer>
<!-- /.vlt-footer -->