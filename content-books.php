<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

$numberOfBooks = 3;
$counter = 1;
$bookPageArgs = array(
	'post_type'       => 'page',
	'post_parent'     => $post->ID,
	'numberposts'     => $numberOfBooks,
	'orderby'		=> 'menu_order'
);
$bookPages = get_posts($bookPageArgs);

echo $testSite;
?>

<?php if ($testSite) { ?>
	<h1>content-books.php</h1>
<?php } ?>

<div class="books background"<?php echo ah_get_feature_image($pageID = $post->ID, $size = 'Feature Wide', $type = 'background'); ?>>

	<?php if (have_posts()) : the_post(); ?>
		<div class="container white content">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span9">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="span2">&nbsp;</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="container white content book-menu">

		<?php foreach($bookPages as $bookPage) : setup_postdata($bookPage); ?>

			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span3">
					<a href="<?php echo esc_url(home_url('/')) . '?page_id=' . $bookPage->ID; ?>"><img src="<?php echo ah_get_custom_thumb($bookPage->ID); ?>" alt="<?php echo $bookPage->post_title; ?>" /></a>
				</div>
				<div class="span6 book-menu">
					<div class="info">
						<h2><a class="title" href="<?php echo esc_url(home_url('/')) . '?page_id=' . $bookPage->ID; ?>"><?php echo $bookPage->post_title; ?></a></h2>
						<span class="summary"><?php the_field('book_meta', $bookPage->ID) ?></span>
						<?php
							if (get_field('book_summary', $bookPage->ID) != '') {
								the_field('book_summary', $bookPage->ID);
							} else {
								the_excerpt();
							}
						?>
						<a class="box-button" href="<?php echo esc_url(home_url('/')) . '?page_id=' . $bookPage->ID; ?>">More Information &amp; buying options</a>
					</div>
				</div>
				<div class="span2">&nbsp;</div>
			</div>

			<?php if ($counter != $numberOfBooks) { ?>
				<!-- Seperator Line -->
				<div class="row">
					<div class="span1">&nbsp;</div>
					<div class="span9">
						<hr />
					</div>
					<div class="span1">&nbsp;</div>
				</div>

			<?php } ?>
			
			<?php $counter = $counter + 1; ?>

		<?php endforeach; ?>

		</div>
	</div>

	<?php if (get_field('further_reading') != '') { ?>
		<!-- Further Reading -->
		<div class="container white content further-reading">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span9">
					<h3>Further Reading</h3>
					<?php the_field('further_reading'); ?>
				</div>
				<div class="span2">&nbsp;</div>
			</div>
		</div>
	<?php } ?>
</div>
