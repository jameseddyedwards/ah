<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
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

	<div class="container white content">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span9">
				<?php if (have_posts()) : ?>
					<ul class="book-list">
						<?php while (have_posts()) : the_post(); ?>
							<li class="clearfix">
								<?php the_post_thumbnail(); ?>
								<div class="info">
									<h2><a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									<span class="summary"><?php the_field('book_meta') ?></span>
									<?php the_content(); ?>
									<a class="box-button" href="<?php the_permalink() ?>">More Information & buying options</a>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php else : ?>
					<h1><?php echo single_cat_title(); ?><?php _e(' has no books', 'alastairhumphreys'); ?></h1>
					<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys'); ?></p>
					<?php get_search_form(); ?>
				<?php endif; ?>
			</div>
			<div class="span2">&nbsp;</div>
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
