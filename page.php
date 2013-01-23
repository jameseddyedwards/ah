<?php
/**
 * The template for determining what layout to use for hierarchical pages, defaulting to a standard post layout.
 *
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

$currentPageId = get_query_var('page_id');
$books = get_page_by_title('Books') != null ? get_object_vars(get_page_by_title('Books')) : null;
$booksId = $books != null ? $books[ID] : null;
$speaking = get_page_by_title('Speaking') != null ? get_object_vars(get_page_by_title('Speaking')) : null;
$speakingId = $speaking != null ? $speaking[ID] : null;
$videos = get_page_by_title('Videos') != null ? get_object_vars(get_page_by_title('Videos')) : null;
$videosId = $videos != null ? $videos[ID] : null;

switch ($currentPageId) {
	case $booksId:
		$layout = "books";
		break;
	case $speakingId:
		$layout = "speaking";
		break;
	case $videosId:
		$layout = "videos";
		break;
	default:
		$layout = "";
		break;
}
echo $layout;
?>

<?php if ($testSite) { ?>
	<h1>page.php</h1>
<?php } ?>

<?php get_template_part('content', $layout); ?>

<?php get_footer(); ?>