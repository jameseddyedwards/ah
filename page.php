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
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();

?>

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

	<!-- Testimonials -->
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


<?php get_footer(); ?>