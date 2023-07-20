<?php
/**
 * Plugin Name: Favorites Widget
 * Plugin URI:  http://example.com/
 * Description: Allows the user to enter their favorite movie and song.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */

namespace PDEV\Favorites;

add_action( 'widgets_init', function() {

	require_once plugin_dir_path( __FILE__ ) . 'Widget.php';

	register_widget( __NAMESPACE__ . '\Widget' );
} );
