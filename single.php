<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

if (get_field('post_layout') == '') {
	$layout = post;
} else {
	$layout = get_field('post_layout');
}

?>

<!-- Post -->
<?php get_template_part('content', $layout); ?>

<?php get_footer(); ?>