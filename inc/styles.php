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
		wp_register_style('reset', get_template_directory_uri() . '/css/reset.css', __FILE__);
		wp_register_style('fonts', get_template_directory_uri() . '/css/fonts.css', __FILE__);
		wp_register_style('utilities', get_template_directory_uri() . '/css/utilities.css', __FILE__);
		wp_register_style('buttons', get_template_directory_uri() . '/css/buttons.css', __FILE__);
		wp_register_style('lists', get_template_directory_uri() . '/css/lists.css', __FILE__);
		wp_register_style('structure', get_template_directory_uri() . '/css/structure.css', __FILE__);
		wp_register_style('global', get_template_directory_uri() . '/css/global.css', __FILE__);
		
		wp_enqueue_style('reset');
		wp_enqueue_style('fonts');
		wp_enqueue_style('utilities');
		wp_enqueue_style('buttons');
		wp_enqueue_style('lists');
		wp_enqueue_style('structure');
		wp_enqueue_style('global');


		// Specifics

		wp_register_style('home', get_template_directory_uri() . '/css/home.css', __FILE__);
		wp_register_style('category', get_template_directory_uri() . '/css/category.css', __FILE__);
		wp_register_style('post', get_template_directory_uri() . '/css/post.css', __FILE__);
		wp_register_style('recommended', get_template_directory_uri() . '/css/post.css', __FILE__);
		wp_register_style('page', get_template_directory_uri() . '/css/post.css', __FILE__);

		wp_enqueue_style('home');
		wp_enqueue_style('category');
		wp_enqueue_style('post');
		wp_enqueue_style('recommended');
		wp_enqueue_style('page');

	}
?>