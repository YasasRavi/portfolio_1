<?php

	do_action( 'merge/after_site' );

	// Elementor `footer` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		get_template_part( 'template-parts/footer/footer' );
	}

?>

<?php wp_footer(); ?>

</body>
</html>