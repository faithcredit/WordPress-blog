<?php
/**
 * Plugin Name: Book Collection
 * Plugin URI:  http://example.com/
 * Description: A plugin for managing a book collection.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */

// Load custom post type functions.
require_once plugin_dir_path( __FILE__ ) . 'post-types.php';
require_once plugin_dir_path( __FILE__ ) . 'post-meta.php';
require_once plugin_dir_path( __FILE__ ) . 'meta-boxes.php';
require_once plugin_dir_path( __FILE__ ) . 'taxonomies.php';
