<?php
/**
 * Template Name: Basic Template
 * Description: A Template used to display a basic content page. E.g. Speaking
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

$featureImageSize = get_field('feature_image_size');

?>

<?php if ($testSite) { ?>
	<h1>page-basic.php</h1>
<?php } ?>

<?php echo $featureImageSize == 'feature-normal' || $featureImageSize == '' ? ah_get_feature_image($pageID = $post->ID) : ''; ?>

<!-- Basic Content -->
<div class="container white content<?php echo $featureImageSize == 'feature-normal' ? ' top' : ''; ?>"<?php echo $featureImageSize == 'feature-wide' ? ah_get_feature_image($pageID = $post->ID, $size = $featureImageSize, $type = 'background') : ''; ?>>
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

<?php get_footer(); ?>