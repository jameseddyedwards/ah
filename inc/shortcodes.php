<?php

function button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/'
	), $atts));

	return '<a class="box-button" href="' . $url . '">' . do_shortcode($content) . '</a>';
}
/*
function gallery_image_1_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="large post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_2_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="small post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_3_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="medium right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_4_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="medium post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_5_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="small right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_6_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="large fl-right right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_7_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="small fl-right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_8_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="medium fl-right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_9_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="medium fl-right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
function gallery_image_10_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/',
		'title' => ''		
	), $atts));

	return '<a class="small fl-right post-thumb" href="' . $url . '">' . do_shortcode($content) . '<span class="title">' . $title . '</span></a>';
}
add_shortcode('gallery_1', 'gallery_image_1_shortcode');
add_shortcode('gallery_2', 'gallery_image_2_shortcode');
add_shortcode('gallery_3', 'gallery_image_3_shortcode');
add_shortcode('gallery_4', 'gallery_image_4_shortcode');
add_shortcode('gallery_5', 'gallery_image_5_shortcode');
add_shortcode('gallery_6', 'gallery_image_6_shortcode');
add_shortcode('gallery_7', 'gallery_image_7_shortcode');
add_shortcode('gallery_8', 'gallery_image_8_shortcode');
add_shortcode('gallery_9', 'gallery_image_9_shortcode');
add_shortcode('gallery_10', 'gallery_image_10_shortcode');
*/
add_shortcode('button', 'button_shortcode');

?>
