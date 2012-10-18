<?php
/*
 * WordPress Sample function and action
 * for loading scripts in themes
 */
 
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 

add_action('wp_enqueue_scripts', 'ahumphreys_load_javascript_files');

// Register some javascript files, because we love javascript files. Enqueue a couple as well 

function ahumphreys_load_javascript_files() {

	wp_register_script('carousel_gallery', get_template_directory_uri() . '/js/carousel.js', array('jquery'), '5.5.0', true);

	if (get_field('carousel_gallery') != '') {
		wp_enqueue_script('carousel_gallery');
	}
}
?>