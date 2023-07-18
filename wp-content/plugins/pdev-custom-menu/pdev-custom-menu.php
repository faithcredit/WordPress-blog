<?php
/*
Plugin Name: PDEV Custom Menu Example
Plugin URI: https://example.com/
Description: A complete and practical example of the WordPress Settings API
Version: 1.0
Author: WROX
Author URI: http://wrox.com
*/

add_action( 'admin_menu', 'pdev_create_menu' );
             
function pdev_create_menu() {
             
    //create custom top-level menu
    add_menu_page( 'PDEV Settings Page', 'PDEV Settings',
        'manage_options', 'pdev-options', 'pdev_settings_page',
        'dashicons-smiley', 99 );

    //create submenu items
    add_submenu_page( 'pdev-options', 'About The PDEV Plugin', 'About', 'manage_options',
        'pdev-about', 'pdev_about_page' );
    add_submenu_page( 'pdev-options', 'Help With The PDEV Plugin', 'Help', 'manage_options',
        'pdev-help', 'pdev_help_page' );
    add_submenu_page( 'pdev-options', 'Uninstall The PDEV Plugin', 'Uninstall', 'manage_options',
        'pdev-uninstall', 'pdev_uninstall_page' );
             
}

//placerholder function for the settings page
function pdev_settings_page() {

}

//placerholder function for the about page
function pdev_about_page() {

}

//placerholder function for the help page
function pdev_help_page() {

}

//placerholder function for the uninstall page
function pdev_uninstall_page() {

}
?>