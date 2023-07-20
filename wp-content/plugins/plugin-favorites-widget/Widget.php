<?php
namespace PDEV\Favorites;

use WP_Widget;

class Widget extends WP_Widget {

	// Sets up the widget.
	public function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'                   => 'pdev-favorites',
			'description'                 => 'Displays your favorite movie and song.',
			'customize_selective_refresh' => true
		);

		// Create the widget.
		parent::__construct(
			'pdev-favorites',
			'Favorites: Movie and Song',
			$widget_options
		);
	}

	// Displays the widget.
	public function widget( $sidebar, $instance ) {

		// Open the sidebar widget wrapper.
		echo $sidebar['before_widget'];

		// Output the widget title if set.
		if ( ! empty( $instance['title'] ) ) {

			// Open the sidebar widget title wrapper.
			echo $sidebar['before_title'];

			// Apply filters and output widget title.
			echo apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

			// Close the sidebar widget title wrapper.
			echo $sidebar['after_title'];
		}

		// Output favorite movie and song in a list.
		echo '<ul>';

		printf(
			'<li>Favorite Movie: %s</li>',
			! empty( $instance['movie'] ) ? esc_html( $instance['movie'] ) : 'None'
		);

		printf(
			'<li>Favorite Song: %s</li>',
			! empty( $instance['song'] ) ? esc_html( $instance['song'] ) : 'None'
		);

		echo '</ul>';

		// Close the sidebar widget wrapper.
		echo $sidebar['after_widget'];
	}

	// Outputs widget options form.
	public function form( $instance ) {

		$instance = wp_parse_args(
			(array) $instance,
			[
				'title' => 'Favorites',
				'movie' => '',
				'song'  => ''
			]
		); ?>

		<p>
			<label>
				Title:
				<input
					type="text"
					class="widefat"
					name="<?php echo $this->get_field_name( 'title' ); ?>"
					value="<?php echo esc_attr( $instance['title'] ); ?>"
				/>
			</label>
		</p>

		<p>
			<label>
				Movie:
				<input
					type="text"
					class="widefat"
					name="<?php echo $this->get_field_name( 'movie' ); ?>"
					value="<?php echo esc_attr( $instance['movie'] ); ?>"
				/>
			</label>
		</p>

		<p>
			<label>
				Song:
				<input
					type="text"
					class="widefat"
					name="<?php echo $this->get_field_name( 'song' ); ?>"
					value="<?php echo esc_attr( $instance['song'] ); ?>"
				/>
			</label>
		</p>
	<?php }

	// Callback on widgets update to save options.
	public function update( $new_instance, $old_instance ) {

		// Create empty array to store sanitized data.
		$instance = [];

		// Sanitize data from widget form.
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['movie'] = sanitize_text_field( $new_instance['movie'] );
		$instance['song']  = sanitize_text_field( $new_instance['song']  );

		// Return sanitized data.
		return $instance;
	}
}
