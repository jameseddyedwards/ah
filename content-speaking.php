<?php
/**
 * The template for displaying simple page content e.g. Speaking
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>

<?php if ($testSite) { ?>
	<h1>content-speaking.php</h1>
<?php } ?>

<div class="split-layout background">

	<div class="container white content">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span10">
				<?php while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>

					<?php if (get_field('information_resources') != '') { ?>
						<!-- Information & Resources -->
						<h2>Information and Resources</h2>
						<?php the_field('information_resources'); ?>
					<?php } ?>
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
