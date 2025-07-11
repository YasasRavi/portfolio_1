<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

class vlthemes_widget_socials extends WP_Widget {

	public function __construct() {
		$widget_details = array(
			'classname' => 'vlt-widget-socials',
			'description' => esc_html__( 'Shows social links.', 'vlthemes' )
		);
		parent::__construct( 'vlthemes_widget_socials', esc_html__( 'VLThemes: Social Links', 'vlthemes' ), $widget_details );
	}

	public function widget( $args, $instance ) {

		if ( !isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args[ 'before_widget' ];

		$widget_id = $args[ 'widget_id' ];

		$social_style = get_field( 'social_style', 'widget_' . $widget_id );

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$class = 'vlt-social-icon';
		$class .= ' vlt-social-icon--' . $social_style;

		switch ( $social_style ) {
			case 'style-1':

			if ( have_rows( 'social_list', 'widget_' . $widget_id ) ) {
				while ( have_rows( 'social_list', 'widget_' . $widget_id ) ) : the_row();
					echo '<a class="' . esc_attr( $class ) . '" target="_blank" href="' . get_sub_field( 'social_url', 'widget_' . $widget_id ) . '">' . get_sub_field( 'social_text', 'widget_' . $widget_id ) . '</a>';
				endwhile;
			}

			break;

			case 'style-2':
			case 'style-3':

			if ( have_rows( 'social_list', 'widget_' . $widget_id ) ) {
				while ( have_rows( 'social_list', 'widget_' . $widget_id ) ) : the_row();
					$class .= ' ' . str_replace( 'socicon-', '', get_sub_field( 'social_icon', 'widget_' . $widget_id ) );
					echo '<a class="' . esc_attr( $class ) . '" target="_blank" href="' . get_sub_field( 'social_url', 'widget_' . $widget_id ) . '"><i class="' . get_sub_field( 'social_icon', 'widget_' . $widget_id ) . '"></i></a>';
				endwhile;
			}

			break;

		}

		echo $args[ 'after_widget' ];

	}

	public function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';

		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'vlthemes' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
		return $instance;
	}
}

