<?php
/**
 * Template Name: Basic Template
 * Description: A Template used to display a basic content page. E.g. Speaking
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>

<?php if ($testSite) { ?>
	<h1>page-basic.php</h1>
<?php } ?>


<div class="split-layout background">

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
</div>

