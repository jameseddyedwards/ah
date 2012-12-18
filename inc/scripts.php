<?php
/*
 * WordPress Sample function and action
 * for loading scripts in themes
 */
 
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 

add_action('wp_enqueue_scripts', 'ahumphreys_load_javascript_files');

// Register some javascript files, because we love javascript files. Enqueue a couple as well 

function ahumphreys_load_javascript_files() {

	wp_register_script('global_js', get_template_directory_uri() . '/js/global.js', array('jquery'), '5.5.0', true);


	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	if (is_front_page()) {
		wp_register_script('ah_carousel', get_template_directory_uri() . '/js/jquery.carouFredSel.js', array('jquery'), '5.5.0', true);
		wp_enqueue_script('ah_carousel');
	}
	
	wp_enqueue_script('global_js');

}

?>