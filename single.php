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
	<?php 
		$postImage = '';
		if (get_field('post_background') != '') {
			$postImage = ' style="background:url(' . get_field('post_background') . ') no-repeat center top; padding-top:700px;"';
		}
	?>
	<div class="background"<?php echo $postImage ?>>

		<div class="container white content">

			<!-- Post -->
			<?php get_template_part('content', get_field('post_type')); ?>

			<!-- Comments -->
			<?php comments_template('', true); ?>

			<!-- Comments Form -->
			<?php get_template_part('content', 'comments-form'); ?>

		</div>
	</div>
<?php endwhile; ?>

<?php get_template_part('content', 'recent-posts'); ?>

<?php get_footer(); ?>