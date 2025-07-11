<?php

/**
 * @author: VLThemes
 * @version: 1.0.1
 */

?>

<form class="vlt-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search', 'merge' ); ?>" value="<?php echo get_search_query(); ?>">

	<button><?php echo merge_get_icon( 'search' ); ?></button>

</form>
<!-- /.vlt-search-form -->