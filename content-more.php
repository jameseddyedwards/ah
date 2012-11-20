<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>

<div class="gallery">
	<?php echo do_shortcode('[ylwm_vimeo height="820" width="100%"]' . category_description() . '[/ylwm_vimeo]'); ?>
</div>

<div class="container white content">
	<div class="row">
		<div class="span12">
			<?php if (have_posts()) : ?>
				<h1>Browse Videos</h1>
				<div class="row category-filter-thumbs">
					<?php while (have_posts()) : the_post(); ?>
						<div class="span3">
							<a class="post-thumb" href="<?php the_permalink(); ?>">
								<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
								<span class="title"><?php the_title(); ?></span>
							</a>
						</div>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<h1><?php _e('There are no videos currently', 'alastairhumphreys'); ?></h1>
				<p><?php _e('Apologies, but no videos have been found. Perhaps searching will help find a video.', 'alastairhumphreys'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

