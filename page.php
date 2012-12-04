<?php
/**
 * The template for displaying all pages.
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
$books = get_object_vars(get_page_by_title('Books'));
$booksId = $books[ID];
$speaking = get_object_vars(get_page_by_title('Speaking'));
$speakingId = $speaking[ID];
$more = get_object_vars(get_page_by_title('More'));
$moreId = $more[ID];

switch ($currentPageId) {
	case $booksId:
		$layout = "books";
		break;
	case $speakingId:
		$layout = "speaking";
		break;
	case $moreId:
		$layout = "more";
		break;
	default:
		$layout = "";
		break;
}
?>

<?php if ($testSite) { ?>
	<h1>page.php</h1>
<?php } ?>

<?php
get_template_part('content', $layout);

?>

<?php get_footer(); ?>