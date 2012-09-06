<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php 
		$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'your_thumb_handle' );
	?>
	<div class="gallery">
		<img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title(); ?>" />
	</div>

	<div class="container white content">

		<?php get_template_part('content', 'single'); ?>

		<div class="row">
			<div class="span2">&nbsp;</div>
			<div class="span10">
				<hr />
				<?php comments_template('', true); ?>
			</div>
		</div>

	</div>



<?php endwhile; ?>

<?php get_footer(); ?>