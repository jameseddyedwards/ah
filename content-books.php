<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

$current_category = 'category_' . get_query_var('cat');
$postImage = '';
if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() != '') {
	$postImage = ' style="background:url(' . z_taxonomy_image_url() . ') no-repeat center top; padding-top:700px;"';
}

?>

<div class="split-layout background"<?php echo $postImage ?>>

	<?php if (have_posts()) : ?>
		<div class="container white content">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span9">
					<h1><?php echo single_cat_title(); ?></h1>
					<?php echo category_description(); ?>
				</div>
				<div class="span2">&nbsp;</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="container white content book-menu">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="row">
					<div class="span1">&nbsp;</div>
					<div class="span3">
						<a href="<?php the_permalink() ?>"><img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" /></a>
					</div>
					<div class="span6 book-menu">
						<div class="info">
							<h2><a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<span class="summary"><?php the_field('book_meta') ?></span>
							<?php
								if (get_field('book_snippet') != '') {
									the_field('book_snippet');
								} else {
									the_excerpt();
								}
							?>
							<a class="box-button" href="<?php the_permalink() ?>">More Information & buying options</a>
						</div>
					</div>
					<div class="span2">&nbsp;</div>
				</div>
				<div class="row">
					<div class="span1">&nbsp;</div>
					<div class="span9">
						<hr />
					</div>
					<div class="span1">&nbsp;</div>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
				<div class="row">
					<div class="span1">&nbsp;</div>
					<div class="span9">
						<h1><?php echo single_cat_title(); ?><?php _e(' has no books', 'alastairhumphreys'); ?></h1>
						<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys'); ?></p>
						<?php get_search_form(); ?>
					</div>
					<div class="span2">&nbsp;</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Further Reading -->
	<div class="container white content further-reading">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span9">
				<h3>Further Reading</h3>
				<?php the_field('additional_info', $current_category); ?>
			</div>
			<div class="span2">&nbsp;</div>
		</div>
	</div>
</div>
