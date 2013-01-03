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
$microAdventures = get_cat_ID('MicroAdventures') != '' ? get_cat_ID('MicroAdventures') : get_cat_ID('Micro Adventures');

switch ($current_category) {
	case $microAdventures:
		$layout = "category-gallery";
		break;
	default:
		$layout = "category";
		break;
}

get_template_part('content', $layout);

?>

<?php get_footer(); ?>
