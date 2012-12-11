<?php

function button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '/'
	), $atts));

	return '<a class="box-button" href="' . $url . '">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'button_shortcode');

?>
