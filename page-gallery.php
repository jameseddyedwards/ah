<?php
/**
 * Template Name: Gallery Template
 * Description: A Page Template that shows a large feature image with a small gallery area below
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

?>

<?php while (have_posts()) : the_post(); ?>
	<?php
		$args = array(
			'depth'			=> 1,
			'child_of'		=> $post->ID,
			'title_li'		=> '',
		);
		$galleryImageCount = 15;
	?>

	<!-- Feature Image -->
	<?php echo ah_get_feature_image($pageID = $post->ID, $size = 'feature-wide'); ?>

	<!-- Gallery Images -->
	<div class="gallery-thumbs clearfix">
		<?php for ($i = 1; $i <= $galleryImageCount; $i++) { ?>
			<?php
				$galleryLink = 'gallery_link_' . $i;
				$galleryImageField = 'gallery_image_' . $i;
				$galleryTitle = 'gallery_title_' . $i;

				/* Generate Gallery Classes */
				switch ($i) {
					case 1:
					case 11:
						$class = "large";
						break;
					case 2:
					case 12:
						$class = "small";
						break;
					case 3:
					case 13:
						$class = "medium right";
						break;
					case 4:
					case 14:
						$class = "medium";
						break;
					case 5:
					case 15:
						$class = "small right";
						break;
					case 6:
						$class = "large fl-right right";
						break;
					case 7:
						$class = "medium fl-right";
						break;
					case 8:
						$class = "small fl-right";
						break;
					case 9:
						$class = "small fl-right";
						break;
					case 10:
						$class = "medium fl-right";
						break;
				}

				/* Find Image Size */
				switch ($i) {
					// Large
					case 1;
					case 6;
					case 11;
						$imageSize = 'gallery-large';
						break;
					// Medium
					case 3;
					case 4;
					case 7;
					case 10;
					case 13;
					case 14;
						$imageSize = 'gallery-medium';
						break;
					// Small
					case 2;
					case 5;
					case 8;
					case 9;
					case 12;
					case 15;
						$imageSize = 'gallery-small';
						break;
				}
				$galleryImageURL = get_field($galleryImageField);
				//print_r($galleryImageURL);
				$galleryImageURL = $galleryImageURL[sizes][$imageSize];
			?>
			<?php if ($galleryImageURL != '') { ?>
				<a class="<?php echo $class ?> post-thumb" href="<?php the_field($galleryLink); ?>">
					<img src="<?php echo $galleryImageURL; ?>" alt="<?php the_field($galleryTitle); ?>" />
					<span class="title"><?php the_field($galleryTitle); ?></span>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
	
	<!-- Category Posts -->
	<div class="container white">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span10 content">
				<?php the_content(); ?>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span10">
				<h2><?php the_title(); ?></h2>
				<ul class="link-list three-column clearfix">
					<?php wp_list_pages($args); ?>
				</ul>

				<!-- AddThis Social Buttons -->
				<?php get_template_part('content', 'add-this'); ?>
				
			</div>
		</div>
	</div>
<?php endwhile; ?>

<?php get_footer(); ?>