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

<?php if (get_field('carousel_gallery') != '') { ?>
	<div id="myCarousel" class="carousel slide gallery">
		<div class="carousel-inner">
			<?php the_field('carousel_gallery'); ?>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	</div>
<?php } ?>

<div class="container white">

	<div class="row">
		<div class="span12 head-bar">
			<ul id="post-view" class="tabs clearfix">
				<li id="best" class="active">Best bits</li>
				<li id="recent">Recent posts</li>
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
	<div class="row tab-row best active">
		<?php foreach($bestbits as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?>" />
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
	<div class="row tab-row recent">
		<?php foreach($recentPosts as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?>" />
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>