<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Page Template
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
$adventures = get_object_vars(get_page_by_title('Adventures'));
$adventuresId = $adventures[ID];
$more = get_object_vars(get_page_by_title('More'));
$moreId = $more[ID];

switch ($currentPageId) {
	case $booksId:
		$layout = "books";
		break;
	case $adventuresId:
		$layout = "adventures";
		break;
	case $speakingId:
		$layout = "speaking";
		break;
	case $moreId:
		$layout = "more";
		break;
	default:
		$layout = "page";
		break;
}

get_template_part('content', $layout);

echo $currentPageId . '<br />';
echo $adventuresId . '<br />';
echo $layout . '<br />';
//$books_id = get_object_vars($page_books);
//print_r($books_id[ID]);
?>

<!--
<div class="split-layout background"<?php echo $postImage ?>>

	<div class="container white content">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span10">
				<?php while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<div class="span1">&nbsp;</div>
		</div>
	</div>

	<!-- Testimonials 
	<?php if (get_field('testimonials') != '') { ?>
		<div class="container white content">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span10">
					<h2>Testimonials</h2>
					<?php the_field('testimonials'); ?>
				</div>
				<div class="span1">&nbsp;</div>
			</div>
		</div>
	<?php } ?>
</div>
-->


<?php get_footer(); ?>