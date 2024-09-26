<?php

//-----------------------------------------------

/**
 * Setting CSS & JS Admin
 */

/**
 * Enqueue a script in the WordPress admin on edit.php.
 * @param int $hook Hook suffix for the current admin page.
 */

function wpdocs_admin_script() {
    wp_enqueue_style( 'stylesheet', PLUGIN_URL . 'admin/css/style.css', array(), '2.6.8');

    // Register the script
    wp_register_script('my-script', PLUGIN_URL . 'admin/js/script.js', array(), '1.6.2', false);
    // Enqueue the script
    wp_enqueue_script('my-script');
}
add_action( 'admin_enqueue_scripts', 'wpdocs_admin_script' );


//-----------------------------------------------