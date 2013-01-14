<?php

function button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/'
	), $atts));

	return '<a class="box-button" href="' . $url . '">' . do_shortcode($content) . '</a>';
}

function video_shortcode($atts, $content = null) {

	return '<div class="video-container">' . do_shortcode($content) . '</div>';
}

function format_shortcode($atts, $content = null) {

	return '<div class="format clearfix">' . do_shortcode($content) . '</div>';
}

function format_image_shortcode($atts, $content = null) {

	return '<div class="format-image">' . do_shortcode($content) . '</div>';
}

function format_info_shortcode($atts, $content = null) {

	return '<div class="format-info">' . do_shortcode($content) . '</div>';
}

add_shortcode('button', 'button_shortcode');
add_shortcode('format', 'format_shortcode');
add_shortcode('format-image', 'format_image_shortcode');
add_shortcode('format-info', 'format_info_shortcode');
add_shortcode('video', 'video_shortcode');

?>
