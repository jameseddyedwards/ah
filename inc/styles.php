<?php
    /**
     * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
     */
    add_action('wp_enqueue_scripts', 'ahumphreys_add_my_stylesheet');

    /**
     * Enqueue plugin style-file
     */
    function ahumphreys_add_my_stylesheet() {
        // Respects SSL, Style.css is relative to the current file
        wp_register_style('carousel', get_template_directory_uri() . '/css/carousel.css', __FILE__);
        
        if (get_field('carousel_gallery') != '') {
            wp_enqueue_style('carousel');
        }
    }
?>