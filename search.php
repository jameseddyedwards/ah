<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>


<?php if (have_posts()) { ?>

	<header class="page-header">
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'alastairhumphreys' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header>

	<!-- Pagination -->
	<? if (function_exists('wp_paginate')) {
		wp_paginate();
	} else if ($wp_query->max_num_pages > 1) {
		alastairhumphreys_content_nav( 'nav-above' );
	} ?>

	<?php while (have_posts()) : the_post(); ?>
		<div class="container white content">
			<div class="row">
				<div class="span2">
					<?php if ('post' == get_post_type()) : ?>
						<div class="post-date">
							<?php alastairhumphreys_posted_on(); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="span10">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header>
							<h1><?php the_title(); ?></h1>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'alastairhumphreys' ) );

								/* translators: used between list items, there is a space after the comma */
								$tag_list = get_the_tag_list('', __(', ','alastairhumphreys'));
								if ('' != $tag_list) {
									/* $utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'alastairhumphreys' ); */
									$utility_text = __('<span class="meta">Posted in %1$s and tagged %2$s. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
								} elseif ('' != $categories_list) {
									$utility_text = __('<span class="meta">Posted in %1$s. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
								} else {
									$utility_text = __('<span class="meta">Posted by <a href="%6$s">%5$s</a>. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
								}

								printf(
									$utility_text,
									$categories_list,
									$tag_list,
									esc_url(get_permalink()),
									the_title_attribute('echo=0'),
									get_the_author(),
									esc_url(get_author_posts_url(get_the_author_meta('ID')))
								);
							?>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="continue-reading">
							<span>continue reading</span>
						</a>
					</article>
				</div>
			</div>
		</div>
	<?php endwhile;

	if (function_exists('wp_paginate')) {
		wp_paginate();
	} else if ($wp_query->max_num_pages > 1) {
		alastairhumphreys_content_nav('nav-below');
	}

} else { ?>

	<div class="container white content">
		<div class="row">
			<div class="span12">
				<h1><?php echo single_cat_title(); ?><?php _e(' has no posts', 'alastairhumphreys'); ?></h1>
				<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys'); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>

<?php } ?>

<?php get_footer(); ?>