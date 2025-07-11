<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

class vlthemes_widget_about extends WP_Widget {

	public function __construct() {
		$widget_details = array(
			'classname' => 'vlt_widget_about',
			'description' => esc_html__( 'Shows about information.', 'vlthemes' )
		);
		parent::__construct( 'vlthemes_widget_about', esc_html__( 'VLThemes: About', 'vlthemes' ), $widget_details );
	}

	public function widget( $args, $instance ) {

		if ( !isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		$title = !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args[ 'before_widget' ];

		$widget_id = $args[ 'widget_id' ];

		if ( $title ) {
			echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}

		?>

		<div class="vlt-widget-about">

			<?php

				$about_logo = get_field( 'about_logo', 'widget_' . $widget_id );
				$about_logo_height = get_field( 'about_logo_height', 'widget_' . $widget_id );
				$about_title = get_field( 'about_title', 'widget_' . $widget_id );
				$about_description = get_field( 'about_description', 'widget_' . $widget_id );

				if ( $about_logo ) {
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="vlt-widget-about__image">';
					echo wp_get_attachment_image( $about_logo, 'full', false, array( 'loading' => 'lazy', 'style' => 'height:' . get_field( 'about_logo_height', 'widget_' . $widget_id ) . 'px; width: auto;' ) );
					echo '</a>';
				}

				if ( $about_title ) {
					echo '<h4 class="vlt-widget-about__title has-color-accent">' . $about_title . '</h4>';
				}

				if ( $about_description ) {
					echo '<div class="vlt-widget-about__description">' . $about_description . '</div>';
				}

			?>

		</div>

		<?php echo $args[ 'after_widget' ];

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