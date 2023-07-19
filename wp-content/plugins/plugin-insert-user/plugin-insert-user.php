<?php
/**
 * Plugin Name: Insert User
 * Plugin URI:  http://example.com/
 * Description: A plugin that inserts a "John Doe" user.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */
 
add_action( 'init', 'pdev_insert_user' );
 
function pdev_insert_user() {
 
       // Bail if the user already exists.
       if ( username_exists( 'johndoe' ) ) {
             return;
       }
 
       // Create new user.
       $user = wp_insert_user( [
             'user_login'   => 'johndoe',
             'user_email'   => 'john@example.com',
             'user_pass'    => '123456789',
             'user_url'     => 'https://wordpress.org',
             'display_name' => 'John Doe',
             'role'         => 'editor',
             'description'  => 'Loves to publish books on WordPress!'
       ] );
 
       // If the user wasn't created, display error message.
       if ( is_wp_error( $user ) ) {
             echo $user->get_error_message();
       }
}