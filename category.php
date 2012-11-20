<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

$current_category = get_query_var('cat');
$blog = get_cat_ID('Blog');

switch ($current_category) {
	case $blog:
		$layout = "blog";
		break;
	default:
		$layout = "category";
		break;
}

get_template_part('content', $layout);

?>

<?php get_footer(); ?>
