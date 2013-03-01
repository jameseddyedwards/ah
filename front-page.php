<?php
/**
 * The main template file.
 *
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

$category_best = get_cat_ID('Best bits');
$category_blog = get_cat_ID('Blog');
$category_best_bits_url = get_category_link($category_best) . "#category-children";
$category_latest_url = get_category_link($category_blog) . "#category-children";

$bestArgs = array(
	'numberposts'	=> 3,
	'cat'			=> $category_best
);
$recentArgs = array(
	'numberposts'		=> 3,
	'cat'				=> $category_blog
);
$bestBits = get_posts($bestArgs);
$recentPosts = get_posts($recentArgs);

$bannerImages = get_field('gallery');

?>

<?php if ($testSite) { ?>
	<h1>Index.php</h1>
<?php } ?>


<?php if ($bannerImages) { ?>

	<div class="carousel-wrapper clearfix">
		<div id="carousel" class="carousel clearfix">
			<?php foreach($bannerImages as $image) { ?>
				<img src="<?php echo $image['sizes']['feature-wide']; ?>" alt="<?php echo $image['alt']; ?>" width="1600" />
			<?php } ?>
		</div>
		<a id="next" class="next" href="#"></a>
		<a id="previous" class="previous" href="#"></a>
	</div>

<?php } ?>


<div class="container content white">
	<?php if (have_posts()) { ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="span4">
					<?php echo ah_get_custom_thumb(); ?>
				</div>
				<div class="span8">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'alastairhumphreys' ) ); ?>
				</div>
			</div>
			<hr />
		<?php endwhile; ?>
	<?php } ?>

	<div class="row">
		<div class="span12 head-bar">
			<ul id="post-view" class="tabs clearfix">
				<li id="recent" class="active" data-url="<?php echo $category_latest_url; ?>">Latest posts</li>
				<li id="best" data-url="<?php echo $category_best_bits_url; ?>">Best bits</li>
			</ul>
			<a id="view-all" class="view-all" href="<?php echo $category_latest_url; ?>">view all</a>
		</div>
	</div>

	<!-- Best Bits -->
	<div class="row tab-row best">
		<?php foreach($bestBits as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<?php echo ah_get_custom_thumb(); ?>
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>

	<!-- Recent Posts -->
	<div class="row tab-row recent active">
		<?php foreach($recentPosts as $post) : setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<?php echo ah_get_custom_thumb(); ?>
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>