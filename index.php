<?php
/**
 * The main template file.
 *
 * Template Name: Home Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 */

get_header();

?>

<div class="gallery">
	<a href="http://127.0.0.1:4001/wordpress/wp-content/uploads/2012/07/01.png"><img src="http://127.0.0.1:4001/wordpress/wp-content/uploads/2012/07/01.png" alt="" title="01" width="1600" height="788" class="alignnone size-full wp-image-8371" /></a>
</div>

<?php the_field('carousel_gallery'); ?>

<?php if (get_field('carousel_gallery') != '') { ?>
	<?php the_field('carousel_gallery'); ?>
<?php } ?>

<div class="container white">

	<div class="row">
		<div class="span12 head-bar">
			<ul id="post-view" class="tabs clearfix">
				<li id="recent" class="active">Latest posts</li>
				<li id="best">Best bits</li>
			</ul>
			<a class="view-all" href="<?php get_author_posts_url('','admin'); ?>">view all</a>
		</div>
	</div>

	<?php
		$category_best = get_cat_ID('Best bits');
		$category_blog = get_cat_ID('Blog');
		$category_adventures = get_cat_ID('Adventures');
		$category_books = get_cat_ID('Books');

		$bestArgs = array(
			'numberposts'	=> 3,
			'cat'			=> $category_best
		);
	?>
	<?php $bestbits = get_posts($bestArgs); ?>
	<div class="row tab-row best">
		<?php foreach($bestbits as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>

	<?php $recentArgs = array(
		'numberposts'		=> 3,
		'cat'				=> $category_blog . ',' . $category_adventures
	); ?>
	
	<?php $recentPosts = get_posts($recentArgs); ?>
	<div class="row tab-row recent active">
		<?php foreach($recentPosts as $post) : setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>