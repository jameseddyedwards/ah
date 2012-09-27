<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();

$current_category = get_query_var('cat');
$category_books = get_cat_ID('Books');
$category_blog = get_cat_ID('Blog');
$category_speaking = get_cat_ID('Speaking');
$category_adventures = get_cat_ID('Adventures');
$category_more = get_cat_ID('More');

switch ($current_category) {
	case $category_books:
		$layout = "category-books";
		break;
	case $category_blog:
		$layout = "category-blog";
		break;
	case $category_speaking:
		$layout = "category";
		break;
	case $category_adventures:
		$layout = "category-adventures";
		break;
	case $category_more:
		$layout = "category";
		break;
	default:
		$layout = "category";
		break;

}
//echo $layout;
get_template_part('content', $layout);

?>

<?php get_footer(); ?>
