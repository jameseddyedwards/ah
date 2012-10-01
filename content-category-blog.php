<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php if (have_posts()) : ?>
	<?php
	global $post;
	$args = array('numberposts' => 1, 'category' => get_query_var('cat'));
	$myposts = get_posts($args);
	?>
	<?php foreach($myposts as $post) : setup_postdata($post); ?>
		<div class="gallery">
			<img src="<?php the_field('post_background') ?>" alt="<?php echo single_cat_title(); ?>" />
		</div>
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
	<?php endforeach; ?>
<?php endif; ?>

<div class="container white content">
	<div class="row">
		<div class="span12">
			<?php if (have_posts()) : ?>
				<h1>Browse blog posts</h1>
				<div class="row category-filter">
					<div class="span3">
						<h3>Browse Blog Posts by Category</h3>
					</div>
					<div class="span9">
						<?php
							if ('' != $categories_list) {
								$categories_list = get_the_category_list(__('','alastairhumphreys'));
								printf($categories_list);
							}
							
						?>
					</div>
				</div>
				<div class="row category-filter-thumbs">
					<?php while (have_posts()) : the_post(); ?>
						<div class="span3">
							<a class="post-thumb" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
								<span class="title"><?php the_title(); ?></span>
							</a>
						</div>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<h1><?php echo single_cat_title(); ?><?php _e(' has no posts', 'alastairhumphreys'); ?></h1>
				<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

