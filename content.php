<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>

<?php if ($testSite) { ?>
	<h1>content.php</h1>
<?php } ?>

<?php while (have_posts()) : the_post(); ?>
	<?php
		$postImage = '';
		if (get_field('feature_image') != '') {
			$postImage = ' style="background:url(' . get_field('feature_image') . ') no-repeat center top; padding-top:700px;"';
		}
	?>
	<div class="background"<?php echo $postImage ?>>
		<div class="container white content">
			<div class="row">
				<div class="span2">
					<?php if (get_field('post_layout') == 'post' || get_field('post_layout') == '') : ?>
						<div class="post-date">
							<?php alastairhumphreys_posted_on(); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="span9">
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
							<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __( 'Pages:', 'alastairhumphreys' ) . '</span>', 'after' => '</div>')); ?>
						</div>

						<footer class="entry-meta">
							<?php //edit_post_link( __('Edit', 'alastairhumphreys'), '<span class="edit-link">', '</span>'); ?>

							<?php if (get_the_author_meta('description') && is_multi_author()) { // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
								<div id="author-info">
									<div id="author-avatar">
										<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('alastairhumphreys_author_bio_avatar_size', 68)); ?>
									</div>
									<div id="author-description">
										<h2><?php printf( esc_attr__( 'About %s', 'alastairhumphreys' ), get_the_author() ); ?></h2>
										<?php the_author_meta( 'description' ); ?>
										<div id="author-link">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
												<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'alastairhumphreys' ), get_the_author() ); ?>
											</a>
										</div>
									</div>
								</div>
							<?php } ?>
						</footer>
					</article>

					<!-- AddThis Button BEGIN 
					<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet"></a>
						<a class="addthis_button_google_plusone" g:plusone:annotation="bubble" g:plusone:size="medium"></a>
						<a class="addthis_counter addthis_pill_style"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5055c67455ab2ff5"></script>
					<!-- AddThis Button END -->


					<hr />
					<?php $tags = wp_get_post_tags($post->ID); ?>
					<?php if ($tags) { ?>
						<!-- You May Also Like -->
						<h3>If you liked this post you might enjoy these too:</h3>
						<ol class="ymal">
							<?php
								$first_tag = $tags[0]->term_id;
								$args = array(
									'tag__in' => array($first_tag),
									'post__not_in' => array($post->ID),
									'showposts'=>5,
									'caller_get_posts'=>1
								);
								$my_query = new WP_Query($args);
							?>
							<?php if ($my_query->have_posts()) { ?>
								<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							<?php } ?>
						</ol>
					<?php } ?>

					<div class="next-previous clearfix">
						<div class="previous">
							<?php previous_post('<span>&laquo; <em>Previous</em></span>%', '', 'yes'); ?>
						</div>
						<div class="next">
							<?php next_post('%<span><em>Next</em> &raquo;</span>', '', 'yes'); ?>
						</div>
					</div>
					
					<hr />
				</div>
				<div class="span1">&nbsp;</div>
			</div>
		</div>
	</div>

	<div class="background">
		<div class="container white content">
			<!-- Comments -->
			<?php comments_template('', true); ?>

			<!-- Comments Form -->
			<?php get_template_part('content', 'comments-form'); ?>
		</div>
	</div>

<?php endwhile; ?>

<!-- Recent Posts -->
<?php get_template_part('content', 'recent-posts'); ?>
