<?php
/**
 * Plugin Name: PDEV
 * Description: Hello world!
 * Version:     1.0.0
 * Author:      PDEV
 */
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'pdev/hello-world',
        plugins_url( 'pdev.build.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' )
    );
} );