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

get_header(); ?>

<ul class="gallery">
	<li><img src="<?php bloginfo('template_url'); ?>/images/gallery/home/01.png" alt="" height="" width="" /></li>
</ul>

<div class="container white">
	<?php if (have_posts()) : ?>

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

	<?php else : ?>
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'alastairhumphreys' ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	<?php endif; ?>

	<div class="row">
		<div class="span12 head-bar">
			<ul id="post-view" class="tabs clearfix">
				<li id="best" class="active">Best bits</li>
				<li id="recent">Recent posts</li>
			</ul>
			<a class="view-all" href="<?php get_author_posts_url('','admin'); ?>">view all</a>
		</div>
	</div>
	
	<?php $bestArgs = array(
		'numberposts'     => 3,
		'category'        => 23,
	); ?>
	<?php $bestbits = get_posts($bestArgs); ?>
	<div class="row tab-row best active">
		<?php foreach($bestbits as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>

	<?php $recentArgs = array(
		'numberposts'     => 3,
	); ?>
	<?php $recentPosts = get_posts($recentArgs); ?>
	<div class="row tab-row recent">
		<?php foreach($recentPosts as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>