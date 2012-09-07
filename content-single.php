<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

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
						$utility_text = __('<span class="meta">This entry was posted in %1$s and tagged %2$s. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
					} elseif ('' != $categories_list) {
						$utility_text = __('<span class="meta">This entry was posted in %1$s. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
					} else {
						$utility_text = __('<span class="meta">This entry was posted by <a href="%6$s">%5$s</a>. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
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
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'alastairhumphreys' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div>

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'alastairhumphreys' ), '<span class="edit-link">', '</span>' ); ?>

				<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
					<div id="author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'alastairhumphreys_author_bio_avatar_size', 68 ) ); ?>
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
				<?php endif; ?>
			</footer>
		</article>
	</div>
</div>
