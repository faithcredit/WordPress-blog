<?php
/*
Plugin Name: Settings API example
Plugin URI: https://example.com/
Description: A complete and practical example of the WordPress Settings API
Author: WROX
Author URI: http://wrox.com
*/

// Add a menu for our option page
add_action( 'admin_menu', 'pdev_plugin_add_settings_menu' );

function pdev_plugin_add_settings_menu() {

    add_options_page( 'PDEV Plugin Settings', 'PDEV Settings', 'manage_options',
        'pdev_plugin', 'pdev_plugin_option_page' );

}
        
// Create the option page
function pdev_plugin_option_page() {
    ?>
    <div class="wrap">
        <h2>My plugin</h2>
        <form action="options.php" method="post">
            <?php 
            settings_fields( 'pdev_plugin_options' );
            do_settings_sections( 'pdev_plugin' );
            submit_button( 'Save Changes', 'primary' );  
            ?>
        </form>
    </div>
    <?php
}
        
// Register and define the settings
add_action('admin_init', 'pdev_plugin_admin_init');
 
function pdev_plugin_admin_init(){
 
       //define the setting args
       $args = array(
           'type' => 'string', 
           'sanitize_callback' => 'pdev_plugin_validate_options',
           'default' => NULL
       );
 
 
    //register our settings
    register_setting( 'pdev_plugin_options', 'pdev_plugin_options', $args );
    
    //add a settings section
    add_settings_section( 
        'pdev_plugin_main', 
        'PDEV Plugin Settings',
        'pdev_plugin_section_text', 
        'pdev_plugin' 
    );
    
    //create our settings field for name
    add_settings_field( 
        'pdev_plugin_name', 
        'Your Name',
        'pdev_plugin_setting_name', 
        'pdev_plugin', 
        'pdev_plugin_main' 
    );
 
    
    //create our settings field for favorite holiday
    add_settings_field( 
        'pdev_plugin_fav_holiday', 
        'Favorite Holiday',
        'pdev_plugin_setting_fav_holiday', 
        'pdev_plugin', 
        'pdev_plugin_main' 
    );
 
    //create our settings field for beast mode
    add_settings_field( 
        'pdev_plugin_beast_mode',
        'Enable Beast Mode?',
        'pdev_plugin_setting_beast_mode',
        'pdev_plugin',
        'pdev_plugin_main'
    );
 
}


// Display and select the favorite holiday select field
function pdev_plugin_setting_fav_holiday() {
 
 
    // Get option 'fav_holiday' value from the database
    // Set to 'Halloween' as a default if the option does not exist
    $options = get_option( 'pdev_plugin_options', [ 'fav_holiday' => 'Halloween' ] );
    $fav_holiday = $options['fav_holiday'];
 
    // Define the select option values for favorite holiday
    $items = array( 'Halloween', 'Christmas', 'New Years' );
 
    echo "<select id='fav_holiday' name='pdev_plugin_options[fav_holiday]'>";
 
    foreach( $items as $item ) {
 
        // Loop through the option values
        // If saved option matches the option value, select it
        echo "<option value='" .$item. "' "
            .selected( $fav_holiday, $item, false ).">" . esc_html( $item ) . 
            "</option>";
 
    }
 
 
    echo "</select>";
 
}

// Display and set the Beast Mode radio button field
function pdev_plugin_setting_beast_mode() {
 
    // Get option 'beast_mode' value from the database
    // Set to 'disabled' as a default if the option does not exist
    $options = get_option( 'pdev_plugin_options', [ 'beast_mode' => 'disabled' ] );
    $beast_mode = $options['beast_mode'];
 
    // Define the radio button options
    $items = array( 'enabled', 'disabled' );
 
    foreach( $items as $item ) {
 
        // Loop the two radio button options and select if set in the option value
        echo "<label><input ".checked( $beast_mode, $item, false )." 
            value= '" . esc_attr( $item ) . "' name='pdev_plugin_options[beast_mode]' 
            type='radio'/>" . esc_html( $item ) . "</label><br/>";
 
    }
 
}
// Draw the section header
function pdev_plugin_section_text() {

    echo '<p>Enter your settings here.</p>';

}
        
// Display and fill the Name form field
function pdev_plugin_setting_name() {

    // get option 'text_string' value from the database
    $options = get_option( 'pdev_plugin_options' );
    $name = $options['name'];

    // echo the field
    echo "<input id='name' name='pdev_plugin_options[name]'
        type='text' value='" . esc_attr( $name ) . "' />";

}

// Validate user input (we want text and spaces only)
// Validate user input for all three options
function pdev_plugin_validate_options( $input ) {
 
    // Only allow letters and spaces for the name
    $valid['name'] = preg_replace(
        '/[^a-zA-Z\s]/',
        '',
        $input['name'] );
        
    if( $valid['name'] !== $input['name'] ) {
 
        add_settings_error(
            'pdev_plugin_text_string',
            'pdev_plugin_texterror',
            'Incorrect value entered! Please only input letters and spaces.',
            'error'
        );
 
    }
        
    // Sanitize the data we are receiving 
    $valid['fav_holiday'] = sanitize_text_field( $input['fav_holiday'] );
    $valid['beast_mode'] = sanitize_text_field( $input['beast_mode'] );
    return $valid;
}

?>
