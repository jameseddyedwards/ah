<?php

function button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/'
	), $atts));

	return '<a class="box-button" href="' . $url . '">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'button_shortcode');

function video_shortcode($atts, $content = null) {

	return '<div class="video-container">' . do_shortcode($content) . '</div>';
}
add_shortcode('video', 'video_shortcode');

?>
