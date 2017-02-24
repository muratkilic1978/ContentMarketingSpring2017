<?php

function wordPress_resource() {
    
    
    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/scripts/jquery.min.js');
    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/bootstrap/js/bootstrap.min.js');
    
    # This is pointing to our own style.css file inside the theme-folder
    wp_enqueue_style('style', get_stylesheet_uri() );
    
}

add_action('wp_enqueue_scripts', 'wordPress_resource');

?>