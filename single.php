<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();

?>

<?php while (have_posts()) : the_post(); ?>

	<div class="background" style="background:url('<?php the_field('post_background'); ?>') no-repeat center top; padding-top:700px;">

		<div class="container white content">

			<!-- Post -->
			<?php get_template_part('content', 'single'); ?>

			<!-- Comments -->
			<?php comments_template('', true); ?>

			<!-- Comments Form -->
			<?php get_template_part('content', 'comments-form'); ?>

		</div>
	</div>
<?php endwhile; ?>

<?php get_template_part('content', 'recent-posts'); ?>

<?php get_footer(); ?>