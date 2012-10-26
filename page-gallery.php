<?php
/**
 * Template Name: Gallery Page
 * Description: A Page Template that shows a large feature image with a small gallery area below
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

$featureImage = get_field('feature_image');
$galleryImages = get_field('gallery_images');
$args = array(
	'depth'			=> 1,
	'child_of'		=> $post->ID,
	'title_li'		=> '',
	'link_after'	=> ' &#187;',
	/*
	'show_date'    => '',
	'date_format'  => get_option('date_format'),
	'exclude'      => '',
	'include'      => '',
	'echo'         => 1,
	'authors'      => '',
	'sort_column'  => 'menu_order, post_title',
	'link_before'  => '',
	'walker'       => '',
	'post_type'    => 'page',
    'post_status'  => 'publish' 
    */
);
$galleryImageCount = 10;
?>

<?php while (have_posts()) : the_post(); ?>

	<!-- Feature Image -->
	<?php if ($featureImage != '') { ?>
		<div class="gallery">
			<img src="<?php echo $featureImage; ?>" alt="<?php echo single_cat_title(); ?>" />
		</div>
	<?php } ?>

	<!-- Gallery Images -->
	<div class="category-thumbs clearfix">
		<?php for ($i = 1; $i <= $galleryImageCount; $i++) { ?>
			<?php
				switch ($i) {
					case 1:
						$class = "large";
						break;
					case 2:
						$class = "small";
						break;
					case 3:
						$class = "medium right";
						break;
					case 4:
						$class = "medium";
						break;
					case 5:
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
						$class = "medium fl-right";
						break;
					case 10:
						$class = "small fl-right";
						break;
				}
				$galleryLink = 'gallery_link_' . $i;
				$galleryImage = 'gallery_image_' . $i;
				$galleryTitle = 'gallery_title_' . $i;
			?>
			<?php if (get_field($galleryImage) != '') { ?>
				<a class="<?php echo $class ?> post-thumb" href="<?php the_field($galleryLink); ?>">
					<?php the_field($galleryImage); ?>
					<span class="title"><?php the_field($galleryTitle); ?></span>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
	
	<!-- Category Posts -->
	<div class="container white content">
		<div class="row">
			<div class="span12">
				<?php the_content(); ?>
			</div>
		</div>
		
		<hr />

		<div class="row">
			<div class="span12">
				<h1><?php the_title(); ?></h1>
				<ul class="category-posts clearfix">
					<?php wp_list_pages( $args ); ?>
				</ul>

				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_google_plusone" g:plusone:annotation="bubble" g:plusone:size="medium"></a>
					<a class="addthis_counter addthis_pill_style"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5055c67455ab2ff5"></script>
				<!-- AddThis Button END -->
			</div>
		</div>
	</div>
<?php endwhile; ?>

<?php get_footer(); ?>