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

$category_best_bits_url = get_site_url() . "/?cat=" . get_cat_ID('Best bits') . "#category-children";
$category_latest_url = get_site_url() . "/?cat=" . get_cat_ID('Blog') . "#category-children";

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

$bannerCount = 10;

?>

<?php if ($testSite) { ?>
	<h1>Index.php</h1>
<?php } ?>


<div class="carousel-wrapper clearfix">
	<div id="carousel" class="carousel clearfix">
		<?php for ($i = 1; $i <= $bannerCount; $i++) { ?>
			<?php $i = sprintf('%02s', $i); ?>
			<img src="<?php bloginfo('template_url'); ?>/images/gallery/home/<?php echo $i; ?>.jpg" alt="Gallery Image <?php echo $i; ?>" width="1600" height="800" />
		<?php } ?>
	</div>
	<a id="next" class="next" href="#"></a>
	<a id="previous" class="previous" href="#"></a>
</div>


<div class="container content white">
	<?php if (have_posts()) { ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="span4">
					<?php the_post_thumbnail(); ?>
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
					<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
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
					<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>